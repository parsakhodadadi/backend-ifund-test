<?php

namespace Core\System\Helpers;

/**
 * written by: Parsa Khodadadi
 *
 * Description:
 * email: parsakhodadadi2003@gmail.com
 * who:
 * updated at:
 *
 */
class ConfigHelper
{
    public static function checkFileExist($path = null)
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

    public function editConfig($indexName = null, $value = null, $configName = 'config')
    {
        global $configs;
        self::checkFileExist("Configs/$configName.php");
        $configs[$indexName] = $value;
        return $configs[$indexName];
//        $configsString = file_get_contents("Configs/config.php");
    }

    public static function getConfig($indexName = null, $configName = 'config')
    {
        global $configs;
        self::checkFileExist("Configs/$configName.php");
        if ($indexName == 'all') {
            return $configs;
        } else {
            return $configs[$indexName];
        }
    }
}
