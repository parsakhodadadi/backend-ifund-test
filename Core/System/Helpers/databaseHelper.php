<?php
use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;

trait databaseHelper {

    static public function queryBuilder() {
        // Somewhere in our application we have created PDO instance
        global $configs;
        $configHelper=new configHelper();
        $configHelper::checkFileExist('Configs/config.php');
        $databaseDetails=call_user_func_array(['configHelper','getConfig'],['all',$configs['default-database']]);

        $pdo=new PDO("mysql:host={$databaseDetails['server']};dbname={$databaseDetails['database']}", $databaseDetails['user'], $databaseDetails['password']);

        // Build Connection object with PdoBridge ad Adapter
        $conn=new Connection(new PdoBridge($pdo));

        // Pass this connection to Factory
        return new QueryBuilderFactory($conn);
    }

    /**
     * @return PDO
     *
     */
    static private function pdoOpen() {
        global $configs;
        $configHelper = new configHelper();
        $configHelper::checkFileExist('Configs/config.php');
        // $defaultDatabase=new configHelper();
        // $databaseDetails=$defaultDatabase::getConfig('all','database');
        $databaseDetails = call_user_func_array(['configHelper','getConfig'],['all',$configs['default-database']]);
        try {
            $conn=new PDO("mysql:host={$databaseDetails['server']};dbname={$databaseDetails['database']}", $databaseDetails['user'], $databaseDetails['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }
    }

    static public function pdoSelect($tableName, $where = 1, $fetchMode = 2) {
        $conn = self::pdoOpen();
        $query = $conn->prepare('SELECT * FROM '.$tableName.' where '.$where);
        $query->execute();
        return $query->fetchAll($fetchMode);
    }

    static public function pdoInsert($tableName,$data=[]) {
        $fields=null;
        $values=null;

        foreach ($data as $field=>$value) {
            $fields.=$field . ',';
            $values.="'$value',";
        }

        $fields=substr($fields,0,-1);
        $values=substr($values,0,-1);

        $conn=self::pdoOpen();
        $query=$conn->prepare("INSERT INTO $tableName ($fields) VALUES ($values)");
        $query->execute();
        return true;
    }

    public function pdoUpdate($tableName,$data=[],$where=1) {
        $fields=null;
        $values=null;

        foreach ($data as $field=>$value) {
            $fields.=$field."='$value',";
        }

        $fields=substr($fields,0,-1);
        $conn=self::pdoOpen();
        $query=$conn->prepare('UPDATE '.$tableName.' SET '.$fields.' WHERE '.$where);
        $query->execute();
        return true;

    }

    public function pdoDelete($tableName,$where) {
        $conn=self::pdoOpen();
        $query=$conn->prepare('DELETE FROM '.$tableName.' WHERE '.$where);
        $query->execute();
        return true;
    }
}