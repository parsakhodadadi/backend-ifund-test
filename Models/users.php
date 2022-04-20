<?php

namespace App\Models;

class users
{
    use \databaseHelper;

    private $model;

    public function __construct() {
        $this->model = self::queryBuilder();
    }

//    static function getUsers()
//    {
//        $users = self::pdoSelect('users', 1, 5);
//        return $users;
//
//    }

    public function checkUser($request)
    {
        $db = $this->model->from('users');
        $db->where('username', $request['name']);
        $db->where('password', $request['password']);
        return $db->first();
    }

    public function insert($data = []) {
        try {
            $this->pdoInsert('users', $data);
            return 200;
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }

    public function update($data=[],$where=1) {
        try {
            $this->pdoUpdate('users', $data, $where);
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }

    public function delete($where) {
        try {
            $this->pdoDelete('users', $where);
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }
}
