<?php

use Requtize\QueryBuilder\Connection;
use Requtize\QueryBuilder\ConnectionAdapters\PdoBridge;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilderFactory;

trait QueryBuilder
{

    public function connection()
    {
        // Somewhere in our application we have created PDO instance
        global $configs;
        $configHelper = new configHelper();
        $configHelper::checkFileExist('Configs/config.php');
        $databaseDetails=call_user_func_array(['configHelper','getConfig'],['all',$configs['default-database']]);

        $pdo = new PDO("mysql:host={$databaseDetails['server']};dbname={$databaseDetails['database']}", $databaseDetails['user'], $databaseDetails['password']);

        // Build Connection object with PdoBridge ad Adapter
        $conn=new Connection(new PdoBridge($pdo));

        // Pass this connection to Factory
        return new QueryBuilderFactory($conn);
    }
}