<?php

namespace App\DesignPatterns\Proxy\Book;

use App\DesignPatterns\Proxy\Book\Classes\Book;
use App\DesignPatterns\Proxy\Book\Classes\BookList;
use App\DesignPatterns\Proxy\Book\Interfaces\BookListInterface;

class ProxyBookList extends BookList implements BookListInterface
{
    private int $bookId = 0;
    private ?array $books = null;
    private ?object $book = null;
    private ?int $booksCount = null;

    public function getBooksCount(): int
    {
        if ($this->booksCount === null) {
            $this->booksCount = parent::getBooksCount();
        }
        return $this->booksCount;
    }

    public function addBook(Book $bookIn): object
    {
        parent::addBook($bookIn);
        return $this;
    }

    public function getBook(int $bookId): object
    {
        if ($this->book === null) {
            $this->book = parent::getBook($bookId);
        }
        return $this->book;
    }

    public function getBookId(): int
    {
        return parent::getBookId();
    }

    public function getBooks(): array
    {
        if ($this->books === null) {
            $this->books = parent::getBooks();
        }
        return $this->books;
    }
}
