<?php

namespace App\Models;

use Core\System\Helpers\databaseHelper;
use Exception;
use Core\System\Helpers\QueryBuilder;
use App\Exception\QueryBuilderException;

class Posts
{
    use QueryBuilder;

    private $db;
    private $table = 'posts';
    private $fillableStatus = true;
    private $fillable = ['id', 'title', 'description', 'photo', 'status', 'user_id', 'date', 'time', 'edited'];

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

    public function update(int $where, array $data = [])
    {
        $db = new databaseHelper();
        if ($db->pdoUpdate($this->table, $data, 'id = ' . $where)) {
            return true;
        }
        return false;
    }

    public function delete(int $where)
    {
        try {
            $this->db->from($this->table)->where('id', $where)->delete();
        } catch (Exception $e) {
            return $e->getCode();
        }
    }
}