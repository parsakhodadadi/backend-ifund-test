<?php

namespace Core\System\Helpers;

use PDO;
use PDOException;
use Core\System\Helpers\ConfigHelper;

class databaseHelper
{
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

    public static function pdoSelect($tableName, $where = [], $fetchMode = 5)
    {
        $conditions = explodeWhere($where);

        $conn = self::pdoOpen();
        $query = $conn->prepare('SELECT * FROM ' . $tableName . ' where ' . $conditions);
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
            }

            $fields = substr($fields, 0, -1);
            $values = substr($values, 0, -1);

            $conn = self::pdoOpen();

            $query = $conn->prepare("INSERT INTO $tableName ($fields) VALUES ($values)");
            $query->execute();
            return true;
        } else {
            die('data : syntax error');
        }
    }

    public function pdoUpdate($tableName, $data = [], $where = [])
    {
        $fields = null;

        foreach ($data as $field => $value) {
            $fields .= $field . "='$value',";
        }

        $conditions = explodeWhere($where);

        $fields = substr($fields, 0, -1);
        $conn = self::pdoOpen();
        $query = $conn->prepare('UPDATE ' . $tableName . ' SET ' . $fields . ' WHERE ' . $conditions);
        $query->execute();
        return true;
    }

    public function pdoDelete($tableName, $where = [])
    {
        $conditions = explodeWhere($where);
        $conn = self::pdoOpen();
        $query = $conn->prepare('DELETE FROM ' . $tableName . ' WHERE ' . $conditions);
        $query->execute();
        return true;
    }
}
