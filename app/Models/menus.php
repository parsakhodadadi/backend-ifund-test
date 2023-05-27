<?php

namespace App\Models;

class Menus
{
    use \databaseHelper;

    public static function getMenus()
    {
        $users = self::pdoSelect('menus', 1, 5);
        return $users;
    }

    public static function insert($data = [])
    {
        try {
            self::pdoInsert('menus', $data);
            return 200;
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }

    public function update($data = [], $where = 1)
    {
        try {
            $this->pdoUpdate('menus', $data, $where);
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }

    public function delete($where)
    {
        try {
            $this->pdoDelete('menus', $where);
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }
}
