<?php

namespace App\Models;


class Books
{
    private $db;
    private $table = 'books';
    private $fields = ['id', 'name', 'description', 'photo', 'user_id', 'sub_category_id', 'author_id'];
}