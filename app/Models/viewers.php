<?php

namespace App\Models;

use Core\System\Helpers\databaseHelper;

class Viewers
{
    private $db;
    private $table = 'viewers';

    public function __construct()
    {
        $this->db = new databaseHelper();
    }

    public function get($conditions = [], $fetchMode = 5)
    {
        try {
            $db = $this->db::pdoSelect($this->table, [], $fetchMode);
            if (!empty($conditions)) {
                $db = $this->db::pdoSelect($this->table, $conditions, $fetchMode);
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

    public function update($where = [], array $data = [])
    {
        try {
            $this->db->pdoUpdate($this->table, $data, $where);
        } catch (Exception $e) {
            return $e->getCode();
        }
    }

    public function delete($where = [])
    {
        try {
            $this->db->pdoDelete($this->table, $where);
        } catch (Exception $e) {
            return $e->getCode();
        }
    }
}