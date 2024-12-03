<?php

abstract class Book {
    protected $title;
    protected $author;
    protected $readCount = 0;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    abstract public function borrow();

    public function incrementReadCount() {
        $this->readCount++;
    }

    public function getReadCount() {
        return $this->readCount;
    }
}

class DigitalBook extends Book {
    private $downloadLink;

    public function __construct($title, $author, $downloadLink) {
        parent::__construct($title, $author);
        $this->downloadLink = $downloadLink;
    }

    public function borrow() {
        $this->incrementReadCount();
        return "Ссылка для скачивания: $this->downloadLink";
    }
}

class PhysicalBook extends Book {
    private $libraryAddress;

    public function __construct($title, $author, $libraryAddress) {
        parent::__construct($title, $author);
        $this->libraryAddress = $libraryAddress;
    }

    public function borrow() {
        $this->incrementReadCount();
        return "Книгу можно получить по адресу: $this->libraryAddress";
    }
}
