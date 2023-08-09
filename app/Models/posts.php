<?php

namespace App\Models;

use Exception;
use Core\System\Helpers\databaseHelper;

class Posts
{
    private $db;
    private $table = 'posts';

    public function __construct()
    {
        $this->db = new databaseHelper();
    }

    public function get($conditions = [])
    {
        try {
            $db = $this->db::pdoSelect($this->table);
            if (!empty($conditions)) {
                foreach ($conditions as $element => $value) {
                    $db = $this->db::pdoSelect($this->table, $conditions);
                }
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
        if ($this->db->pdoUpdate($this->table, $data, $where)) {
            return true;
        }
        return false;
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