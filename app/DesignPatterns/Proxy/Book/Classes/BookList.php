<?php

namespace App\DesignPatterns\Proxy\Book\Classes;

use App\DesignPatterns\Proxy\Book\Interfaces\BookListInterface;

class BookList implements BookListInterface
{
    private array $books;

    public function getBooksCount(): int
    {
        return count($this->getBooks());
    }

    public function getBookId(): int
    {
        if (!empty($this->books))
        {
            return array_key_last($this->books);
        }
        return -1;
    }

    public function addBook(Book $book): object
    {
        $this->books[] = $book;
        return $this;
    }

    public function getBook(int $bookId): object
    {
        if (isset($this->books[$bookId])) {
            return $this->books[$bookId];
        }
        return (object)[];
    }

    public function getBooks(): array
    {
        return $this->books;
    }
}
