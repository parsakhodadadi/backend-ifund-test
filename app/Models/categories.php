<?php

namespace App\Models;

use Exception;
use Core\System\Helpers\databaseHelper;

class Categories
{
    private $db;
    private $table = 'categories';

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

    public function update(int $id, array $data = [])
    {
        if ($this->db->pdoUpdate($this->table, $data, 'id = ' . $id)) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        try {
            $this->db->pdoDelete($this->table, "id = $id");
        } catch (Exception $e) {
            return $e->getCode();
        }
    }
}
