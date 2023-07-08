<?php

namespace App\Models;

use Core\System\Helpers\databaseHelper;

class Users
{
    use databaseHelper;

    private $db;
    private $table = 'users';
    private $fillableStatus = true;
    private $fillable = ['id', 'email', 'first_name', 'last_name', 'country', 'password'];

    public function __construct()
    {
        if (!($this->fillableStatus)) {
            $this->fillable = ['*'];
        }
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
        }
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
