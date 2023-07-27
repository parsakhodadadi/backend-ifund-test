<?php

namespace App\Models;

use Core\System\Helpers\QueryBuilder;

class Books
{
    use QueryBuilder;

    private $db;
    private $table = 'books';
    private $fields = ['id', 'name', 'description', 'photo', 'user_id', 'sub_category_id', 'author_id'];
}