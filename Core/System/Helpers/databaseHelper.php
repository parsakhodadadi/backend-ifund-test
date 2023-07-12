<?php

namespace Core\System\Helpers;

use PDO;
use Core\System\Helpers\ConfigHelper;
use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;

class databaseHelper
{
    public static function queryBuilder()
    {
        // Somewhere in our application we have created PDO instance
        global $configs;
        $configHelper = new ConfigHelper();
        $configHelper::checkFileExist('Configs/config.php');
        $databaseDetails = call_user_func_array(
            ['Core\System\Helpers\ConfigHelper','getConfig'],
            ['all',$configs['default-database']]
        );

        $pdo = new PDO(
            "mysql:host={$databaseDetails['server']};dbname={$databaseDetails['database']}",
            $databaseDetails['user'],
            $databaseDetails['password']
        );

        // Build Connection object with PdoBridge ad Adapter
        $conn = new Connection(new PdoBridge($pdo));

        // Pass this connection to Factory
        return new QueryBuilderFactory($conn);
    }

    /**
     * @return PDO
     *
     */
    private static function pdoOpen()
    {
        global $configs;
        $configHelper = new configHelper();
        $configHelper::checkFileExist('Configs/config.php');
        // $defaultDatabase=new configHelper();
        // $databaseDetails=$defaultDatabase::getConfig('all','database');
        $databaseDetails = call_user_func_array(['Core\System\Helpers\ConfigHelper','getConfig'], ['all',$configs['default-database']]);
        try {
            $conn = new PDO("mysql:host={$databaseDetails['server']};dbname={$databaseDetails['database']}", $databaseDetails['user'], $databaseDetails['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function pdoSelect($tableName, $where = 1, $fetchMode = 2)
    {
        $conn = self::pdoOpen();
        $query = $conn->prepare('SELECT * FROM ' . $tableName . ' where ' . $where);
        $query->execute();
        return $query->fetchAll($fetchMode);
    }

    public static function pdoInsert($tableName, $data = [])
    {
        $fields = null;
        $values = null;

        if (is_array($data) && !empty($data)) {
            foreach ($data as $field => $value) {
                $fields .= $field . ',';
                $values .= "'$value',";
                echo $field;
                echo ' : ';
                echo $value;
                echo '<br>';
                echo '---------';
                echo '<br>';
            }

            $fields = substr($fields, 0, -1);
            $values = substr($values, 0, -1);

            print_r($fields);
            echo '<br>';
            print_r($values);

            $conn = self::pdoOpen();

            $query = $conn->prepare("INSERT INTO $tableName ($fields) VALUES ($values)");
            $query->execute();
            return true;
        } else {
            die('data : syntax error');
        }
    }

    public function pdoUpdate($tableName, $data = [], $where = 1)
    {
        $fields = null;

        foreach ($data as $field => $value) {
            $fields .= $field . "='$value',";
        }

        $fields = substr($fields, 0, -1);
        $conn = self::pdoOpen();
        $query = $conn->prepare('UPDATE ' . $tableName . ' SET ' . $fields . ' WHERE ' . $where);
        $query->execute();
        return true;
    }

    public function pdoDelete($tableName, $where)
    {
        $conn = self::pdoOpen();
        $query = $conn->prepare('DELETE FROM ' . $tableName . ' WHERE ' . $where);
        $query->execute();
        return true;
    }
}
