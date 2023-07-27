<?php

namespace App\Model;

use Exception;
use App\Exception\QueryBuilderException;
use Core\System\Helpers\databaseHelper;
use Core\System\Helpers\QueryBuilder;

class Authors
{
    use QueryBuilder;

    private $db;
    private $table = 'authors';
    private $fillableStatus = true;
    private $fillable = ['id', 'name', 'about', 'user_id' ,'photo', 'status'];

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

    public function insert(array $data = [])
    {
        $exception = new QueryBuilderException();
        try {
            $exception->handle($data, $this->db->from($this->table));
        } catch (Exception $e) {
            return $e->getCode();
        }
    }

    public function update($where, array $data = [])
    {
        $db = new databaseHelper();
        if ($db->pdoUpdate($this->table, $data, 'id = ' . $where)) {
            return true;
        }
        return false;
    }

    public function delete($where)
    {
        try {
            $this->db->from($this->table)->where('id', $where)->delete();
        } catch (Exception $e) {
            return $e->getCode();
        }
    }
}