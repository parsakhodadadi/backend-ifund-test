<?php

namespace App\DesignPatterns\Proxy\Book\Interfaces;

use App\DesignPatterns\Proxy\Book\Classes\Book;

interface BookListInterface
{
    public function getBooksCount(): int;
    public function addBook(Book $book): object;
    public function getBook(int $bookNum): object;
    public function getBookId(): int;
    public function getBooks(): array;

}