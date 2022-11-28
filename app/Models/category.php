<?php

namespace App\Models;

//if (!defined('ACCESS')) die('No scr');

class Category
{
    use \databaseHelper;

    private $db;
    private $table = 'categories';
    private $fillableStatus = true;
    private $fillable = ['id', 'name', 'description'];

//    private $model;

    public function __construct()
    {
        if (!($this->fillableStatus)) {
            $this->fillable = ['*'];
        }
//        $this->model = self::queryBuilder();
    }

    public function insert($data = [])
    {
        $db = $this->queryBuilder();
        return $db->create($data);
    }

    public function getUsers($conditions = [])
    {
        try {
            $db = self::queryBuilder();
            $db = $db->from('users');
            $db->select($this->fillable);

            if (!empty($conditions)) {
                foreach ($conditions as $element => $value) {
                    $db->where($element, $value);
                }
            }

            return $db->all();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            exit();
//            return $exception->getCode();
        }
//        $users = self::pdoSelect('users', 1, 5);
//        return $users;

    }

    public function checkUser($request)
    {
        $db = self::queryBuilder();
        $db = $db->from('users');
        $db->where('username', $request['name']);
        $db->where('password', $request['password']);
        return $db->first();
    }

    public function create($data = [])
    {
        try {
            $this->pdoInsert('users', $data);
            return 200;
        } catch (\PDOException $e) {
            return $e->getCode();
            echo "no";
        }
    }

    public function update($data = [], $where = 1)
    {
        try {
            $this->pdoUpdate($this->table, $data, $where);
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }

    public function delete($where)
    {
        try {
            $this->pdoDelete('users', $where);
        } catch (\PDOException $e) {
            return $e->getCode();
        }
    }
}