<?php

namespace App\Model;

use Exception;
use Core\System\Helpers\databaseHelper;

class Authors
{
    private $db;
    private $table = 'authors';

    public function __construct()
    {
        $this->db = new databaseHelper();
    }

    public function get($conditions = [])
    {
        try {
            $db = $this->db::pdoSelect($this->table);
            if (!empty($conditions)) {
                $db = $this->db::pdoSelect($this->table, $conditions);
            }
            return $db;
        } catch (Exception $exception) {
            echo $exception->getMessage();
            exit();
        }
    }

    public function insert(array $data = [])
    {
        try {
            $this->db::pdoInsert($this->table, $data);
        } catch (Exception $e) {
            return $e->getCode();
        }
    }

    public function update($condition = [], array $data = [])
    {
        try {
            $this->db->pdoUpdate($this->table, $data, $condition);
        } catch (Exception $e) {
            return $e->getCode();
        }
    }

    public function delete($condition = [], array $data = [])
    {
        try {
            $this->db->pdoDelete($this->table, $data);
        } catch (Exception $e) {
            return $e->getCode();
        }
    }
}