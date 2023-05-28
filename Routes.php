<?php

namespace Bramus\Router;

class BramusRouter extends \Bramus\Router\Router
{
    /**
     * @var array The route patterns and their handling functions
     */
    private $afterRoutes = array();

    /**
     * @var array The before middleware route patterns and their handling functions
     */
    private $beforeRoutes = array();

    /**
     * @var array [object|callable] The function to be executed when no route has been matched
     */
    protected $notFoundCallback = [];

    /**
     * @var string Current base route, used for (sub)route mounting
     */
    private $baseRoute = '';

    /**
     * @var string The Request Method that needs to be handled
     */
    private $requestedMethod = '';

    /**
     * @var string The Server Base Path for Router Execution
     */
    private $serverBasePath;

    /**
     * @var string Default Controllers Namespace
     */
    private $namespace = '';

    public function __construct()
    {
        $_SERVER['REQUEST_METHOD'] = 'HEAD';
    }

    /**
     * Store a before middleware route and a handling function
       to be executed when accessed using one of the specified methods.
     *
     * @param string          $methods Allowed methods, | delimited
     * @param string          $pattern A route pattern such as /about/system
     * @param object|callable $fn      The handling function to be executed
     */
    private function invoke($fn, $params = array())
    {
        if (is_callable($fn)) {
            call_user_func_array($fn, $params);
            // If not, check the existence of special parameters
        } elseif (stripos($fn, '@') !== false) {
            // Explode segments of given route
            list($controller, $method) = explode('@', $fn);

            // Adjust controller class if namespace has been set
            if ($this->getNamespace() !== '') {
                $controller = $this->getNamespace() . '\\' . $controller;
            }

            try {
                $reflectedMethod = new \ReflectionMethod($controller, $method);
                // Make sure it's callable
                if ($reflectedMethod->isPublic() && (!$reflectedMethod->isAbstract())) {
                    if ($reflectedMethod->isStatic()) {
                        forward_static_call_array(array($controller, $method), $params);
                    } else {
                        // Make sure we have an instance, because a non-static method must not be called statically
                        if (\is_string($controller)) {
                            $controller = new $controller();
                        }
                        call_user_func_array(array($controller, $method), $params);
                    }
                }
            } catch (\ReflectionException $reflectionException) {
                // The controller class is not available or the class does not have the method $method
            }
        }
    }

    private function patternMatches($pattern, $uri, &$matches, $flags)
    {
        // Replace all curly braces matches {} into word patterns (like Laravel)
        $pattern = preg_replace('/\/{(.*?)}/', '/(.*?)', $pattern);

        // we may have a match!
        return boolval(preg_match_all('#^' . $pattern . '$#', $uri, $matches, PREG_OFFSET_CAPTURE));
    }

    private function handle($routes, $quitAfterRun = false)
    {
        // Counter to keep track of the number of routes we've handled
        $numHandled = 0;

        // The current page URL
        $uri = $this->getCurrentUri();

        // Loop all routes
        foreach ($routes as $route) {
            // get routing matches
            $is_match = $this->patternMatches($route['pattern'], $uri, $matches, PREG_OFFSET_CAPTURE);

            // is there a valid match?
            if ($is_match) {
                // Rework matches to only contain the matches, not the orig string
                $matches = array_slice($matches, 1);

                // Extract the matched URL parameters (and only the parameters)
                $params = array_map(function ($match, $index) use ($matches) {

                    /* We have a following parameter: take the substrin
                    g from the current param position until the next one's position (thank you PREG_OFFSET_CAPTURE)*/
                    if (
                        isset($matches[$index + 1])
                        && isset($matches[$index + 1][0])
                        && is_array($matches[$index + 1][0])
                    ) {
                        if ($matches[$index + 1][0][1] > -1) {
                            return trim(substr($match[0][0], 0, $matches[$index + 1][0][1] - $match[0][1]), '/');
                        }
                    } // We have no following parameters: return the whole lot

                    return isset($match[0][0]) && $match[0][1] != -1 ? trim($match[0][0], '/') : null;
                }, $matches, array_keys($matches));

                // Call the handling function with the URL parameters if the desired input is callable
                $this->invoke($route['fn'], $params);

                ++$numHandled;

                // If we need to quit, then quit
                if ($quitAfterRun) {
                    break;
                }
            }
        }

        // Return the number of routes handled
        return $numHandled;
    }

    public function getRequestMethod()
    {
        // Take the method as found in $_SERVER
        if (isset($_SERVER['REQUEST_METHOD'])) {
            $method = $_SERVER['REQUEST_METHOD'];
        }

        // If it's a HEAD request override it to being GET and prevent any output, as per HTTP Specification
        // @url http://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html#sec9.4
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'HEAD') {
            ob_start();
            $method = 'GET';
            // If it's a POST request, check for a method override header
        } elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $headers = $this->getRequestHeaders();
            if (
                isset($headers['X-HTTP-Method-Override'])
                && in_array(
                    $headers['X-HTTP-Method-Override'],
                    array('PUT', 'DELETE', 'PATCH')
                )
            ) {
                $method = $headers['X-HTTP-Method-Override'];
            }
        }

        return $method;
    }

    public function run($callback = null)
    {
        // Define which method we need to handle
        $this->requestedMethod = $this->getRequestMethod();

        // Handle all before middlewares
        if (isset($this->beforeRoutes[$this->requestedMethod])) {
            $this->handle($this->beforeRoutes[$this->requestedMethod]);
        }

        // Handle all routes
        $numHandled = 0;
        if (isset($this->afterRoutes[$this->requestedMethod])) {
            $numHandled = $this->handle($this->afterRoutes[$this->requestedMethod], true);
        }

        // If no route was handled, trigger the 404 (if any)
        if ($numHandled === 0) {
            if (isset($this->afterRoutes[$this->requestedMethod])) {
                $this->trigger404($this->afterRoutes[$this->requestedMethod]);
            }
            // If a route was handled, perform the finish callback (if any)
        } else {
            if ($callback && is_callable($callback)) {
                $callback();
            }
        }

        // If it originally was a HEAD request, clean up after ourselves by emptying the output buffer
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'HEAD') {
            ob_end_clean();
        }

        // Return true if a route was handled, false otherwise
        return $numHandled !== 0;
    }
}

$router = new BramusRouter();

//Define routes
$router->setNamespace('\App\Controllers');

//$router->get('/add-menu', function () {
//    $panel = new \App\Controllers\panelController();
//    $blade = $panel::$blade;
//    $lang = loadLang('fa', 'login');
//    echo $blade->make('Backend/main/layout/menus',['lang'=>$lang, 'view'=>$blade])->render();
//});
//
//$router->get('/add-menu-post', function () {
//    $panel = new \App\Controllers\panelController();
//    $blade = $panel::$blade;
//    $lang = loadLang('fa', 'login');
//    echo $blade->make('Backend/main/layout/menus',['lang'=>$lang, 'view'=>$blade])->render();
//});

$router->get('/', 'HomeController@form');
$router->get('/login', 'LoginController@form');
$router->post('/login', 'LoginController@form');
$router->get('/logout', 'LoginController@logout');

$router->get('/add-menu', 'panelController@addMenu');

$router->post('/add-menu', 'panelController@addMenu');

$router->get('/register', 'RegisterController@register');

$router->post('/register', 'RegisterController@register');

//$router->get('/login', 'userController@login');

$router->get('/checkLogin', 'userController@checkLoginInfo');

//$router->get('/admin', 'panelController@panel');

// API Routes
//$router->get('/api/v1/test', function () {
//    echo 'API TEST';
//});

$router->get('/admin', 'GlobalController@loadMiddlewares');
$router->get('/admin/category', 'CategoryController@create');

$router->post('/admin/category', 'CategoryController@create');

$router->before('GET|POST', '/admin', 'LoginController@checkLogin');
$router->before('GET|POST', '/admin/.*', 'LoginController@checkLogin');

$router->set404('ErrorController@error404');

//$router->set404(function () {
//    header('HTTP/1.1 404 Not Found');
//    // echo 'page not found';
//    // ... do something special here
//});

//$router->get('/test1', function () {
//    echo 'test1';
//});
//$router->before('GET', '/test/.*', function () {
//    echo 'check middleware';
//});
//$router->set404(function () {
//    // header('HTTP/1.1 404 Not Found');
//    echo 'page not found';
//    // ... do something special here
//});

//Run it!
$router->run();
