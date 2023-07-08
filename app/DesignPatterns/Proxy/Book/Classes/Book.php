<?php

namespace App\DesignPatterns\Proxy\Book\Classes;

class Book
{
    private string $author;
    private string $title;
    public function __construct($title, $author)
    {
        $this->author = $author;
        $this->title  = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorAndTitle()
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}
