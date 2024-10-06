<?php

namespace AaronRouter\Router;

error_reporting(E_ALL);
//ini_set('display_errors', 1);

class AaronRouter
{
    private $url;
    private array $requests;
    private $namespace;
    private array $restrictions = [];

    /**
     * Set a Default Lookup Namespace for Callable methods.
     *
     * @param string $namespace A given namespace
     */
    public function setNamespace(string $namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * Get the given Namespace before.
     *
     * @return string The given Namespace if exists
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * Shorthand for a route accessed.
     *
     * @param string $route A route pattern such as /about/system
     * @param string $controller The class of Router
     * @param string $method The handling method to be executed
     * @param bool $argStatus Checks the existence of arguments in the method to be executed
     * @return void
     */
    public function set(string $route, string $controller, string $method, bool $argStatus = false)
    {
        $dataRoute = [
            'route' => $route,
            'controller' => $this->namespace . "\\" . $controller,
            'function' => $method,
            'argStatus' => $argStatus,
        ];
        $this->requests[] = $dataRoute;
    }

    /**
     * Get all the requests.
     *
     * @return array the requests
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Store a before middleware route and a handling function to be executed when accessed using one of the specified methods.
     *
     * @param string $route A route pattern such as /about/system
     * @param string $controller The class of Restriction
     * @param string $method The handling method to be executed
     * @param bool $argStatus Checks the existence of arguments in the method to be executed
     * @return void
     */
    public function setRestriction(string $route, string $controller, string $method, bool $argStatus = false)
    {
        $this->restrictions[] = [
            'route' => $route,
            'controller' => $this->namespace . "\\" . $controller,
            'method' => $method,
            'argStatus' => $argStatus,
        ];
    }

    /**
     * Get all the restrictions.
     *
     * @return array the restrictions
     */
    public function getRestrictions(): array
    {
        return $this->restrictions;
    }

    /**
     * Returns the url of website in a way that it matches the route pattern.
     *
     * @return string
     */
    private function returnURLRoute(): string
    {
        $urlArray = explode('/', $_SERVER['REQUEST_URI']);
        unset($urlArray[0], $urlArray[1]);
        $urlArray = array_values($urlArray);
        $urlRoute = '/' . implode('/', $urlArray);
        return $urlRoute;
    }

    /**
     * Returns the route with putting args in it.
     *
     * @param string $route
     * @return string
     */
    private function returnRouteWithArgs(string $route): string
    {
        $urlRoute = $this->returnURLRoute();
        $urlRouteArray = explode('/', $urlRoute);
        unset($urlRouteArray[0]);
        $urlRouteArray = array_values($urlRouteArray);
        $routeArray = explode('/', $route);
        unset($routeArray[0]);
        $routeArray = array_values($routeArray);
        if (count($routeArray) == count($urlRouteArray)) {
            foreach ($routeArray as $index => $value) {
                if ($value == 'd') {
                    $routeArray[$index] = $urlRouteArray[$index];
                }
            }
            $routeArray = array_values($routeArray);
            $route = '/' . implode('/', $routeArray);
        }
        return $route;
    }

    /**
     * Return the args of the url in the form of an array.
     *
     * @param string $route
     * @return array
     */
    private function returnArgs(string $route): array
    {
        $args = [];
        $urlArray = explode('/', $_SERVER['REQUEST_URI']);
        unset($urlArray[0], $urlArray[1]);
        $urlArray = array_values($urlArray);
        $routeArray = explode('/', $route);
        unset($routeArray[0]);
        $routeArray = array_values($routeArray);
        foreach ($urlArray as $index => $value) {
            if ($routeArray[$index] == 'd') {
                $args[] = $value;
            }
        }
        return $args;
    }

    /**
     * Compare the url with the routes we set.
     *
     * @param string $route
     * @return bool
     */
    private function compareRouteWithURL(string $route): bool
    {
        $routeArray = explode('/', $route);
        if (end($routeArray) == '.*') {
            $route = trim($route, '.*');
            if (strpos($this->returnURLRoute(), $this->returnRouteWithArgs($route)) !== false) {
                return true;
            }
        } else {
            if (($this->returnRouteWithArgs($route) == $this->returnURLRoute()) || $this->returnRouteWithArgs(route: $route) . '/' == $this->returnURLRoute()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Execute the router:Loop all defined restriction middleware's and routes, and execute the handling function if a match was found.
     *
     */
    public function run()
    {
        $routeArray = explode('/', $_SERVER['REQUEST_URI']);
        unset($routeArray[0], $routeArray[1]);
        $route = '/' . implode('/', $routeArray);
        if (strpos($_SERVER['REQUEST_URI'], '/backend-ifund') !== false) {
            $routerArgs = [];
            $restrictionArgs = [];
            $foundRoute = 0;

            foreach ($this->getRestrictions() as $restriction) {
                if ($restriction['argStatus'] == true) {
                    if ($this->compareRouteWithURL($restriction['route'])) {
                        $restrictionClass = new $restriction['controller'];
                        $restrictionMethod = $restriction['function'];
                        $restrictionArgs = $this->returnArgs($route);
                        call_user_func_array([$restrictionClass, $restrictionMethod], $restrictionArgs);
                    }
                } else {
                    if ($this->compareRouteWithURL($restriction['route'])) {
                        $restrictionClass = new $restriction['controller'];
                        $restrictionMethod = $restriction['method'];
                        call_user_func_array([$restrictionClass, $restrictionMethod], $restrictionArgs);
                    }
                }
            }

            foreach ($this->getRequests() as $key => $routeInfo) {
                if ($routeInfo['argStatus'] == true) {
                    if ($this->compareRouteWithURL($routeInfo['route'])) {
                        $foundRoute = 1;
                        $routerClass = new $routeInfo['controller'];
                        $routerMethod = $routeInfo['function'];
                        $routerArgs = $this->returnArgs($routeInfo['route']);
                        break;
                    }
                } else {
                    if ($this->compareRouteWithURL($routeInfo['route'])) {
                        $foundRoute = 1;
                        $routerClass = new $routeInfo['controller'];
                        $routerMethod = $routeInfo['function'];
                        break;
                    }
                }
            }

            if ($foundRoute == 1) {
                call_user_func_array([$routerClass, $routerMethod], $routerArgs);
            } else {
                echo '404 not found';
                return false;
            }
        }
    }
}
