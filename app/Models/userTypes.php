<?php

namespace App\Models;

class UserTypes
{
    use \databaseHelper;

    public static function getUsers()
    {
        $users = self::pdoSelect('userTypes', 1, 5);
        return $users;
    }

    public function insert($data = [])
    {
        try {
            $this->pdoInsert('userTypes', $data);
            return 200;
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }

    public function update($data = [], $where = 1)
    {
        try {
            $this->pdoUpdate('userTypes', $data, $where);
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }

    public function delete($where)
    {
        try {
            $this->pdoDelete('userTypes', $where);
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }
}
