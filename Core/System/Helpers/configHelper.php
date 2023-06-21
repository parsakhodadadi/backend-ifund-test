<?php

/**
 * written by: Parsa Khodadadi
 *
 * Description:
 * email: parsakhodadadi2003@gmail.com
 * who:
 * updated at:
 *
 */
class configHelper
{
    static function checkFileExist($path = null)
    {
        global $configs;
        if (file_exists($path)) {
            include $path;
        } else {
            exit($path . 'does not exist');
        }
    }

    /**
     * @param bool $debug;
     */
    public function debug($debug = true)
    {
        if ($debug != true) {
            $debug = 0;
        } else {
            $debug = E_ALL;
        }
        ini_set('error_reporting', $debug);
    }

    public function setURL($route = null, $status = false)
    {
        global $configs;
        $this->checkFileExist('Configs/config.php');
        if (!$status) {
            echo $configs['base-url'] . $route;
        } else {
            return $configs['base-url'] . $route;
        }
    }

    static function getConfig($indexName = null, $configName = 'config')
    {
        global $configs;
        self::checkFileExist("Configs/$configName.php");
        if ($indexName == 'all') {
            return $configs;
        } else {
            return $configs[$indexName];
        }
    }

//    function editConfigFile($key=null,$value=null)
// {
//        global $configs;
//        self::checkFileExist("Configs/config.php");
//        $configs[$key]=$value;
//    }
}
