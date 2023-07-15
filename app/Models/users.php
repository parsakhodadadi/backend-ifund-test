<?php

namespace App\Models;

use Exception;
use Core\System\Helpers\QueryBuilder;
use App\Exception\QueryBuilderException;

class Users
{
    use QueryBuilder;

    private $db;
    private $table = 'users';
    private $fillableStatus = true;
    private $fillable = ['id', 'email', 'first_name', 'last_name', 'password'];

    public function __construct()
    {
        $this->db = $this->queryBuilder();
        if (!($this->fillableStatus)) {
            $this->fillable = ['*'];
        }
    }

    public function get($conditions = [])
    {
        try {
            $db = $this->db->from($this->table)->select($this->fillable);
            if (!empty($conditions)) {
                foreach ($conditions as $element => $value) {
                    $db = $db->where($element, $value);
                }
            }
            return $db->all();
        } catch (Exception $exception) {
            echo $exception->getMessage();
            exit();
        }
    }

    public function check($request)
    {
        $db = $this->db->from($this->table)->where('username', $request['name'])->where('password', $request['password']);
        return $db->first();
    }

    public function insert($data = [])
    {
        $exception = new QueryBuilderException();
        try {
            $exception->handle($data, $this->db->from($this->table));
        } catch (Exception $e) {
            return $e->getCode();
        }
    }

    public function update($field, $value, $newValue)
    {
        try {
            $this->db->from($this->table)->where($field, $value)->update([$field => $newValue]);
        } catch (Exception $e) {
            return $e->getCode();
        }
    }

    public function delete($field, $value)
    {
        try {
            $this->db->from($this->table)->where($field, $value)->delete();
        } catch (Exception $e) {
            return $e->getCode();
        }
    }

    public function boot()
    {
        echo 'boot';
    }
}
