<?php

class Bookcase {
  public $shelves; // Количество полок в шкафу
  public $capacity; // Вместимость шкафа (максимальное количество книг)
  public $material; // Материал шкафа 
  private $books = []; // Список книг в шкафу

  // 3. Методы класса
public function __construct($shelves, $material, $capacity) {
    $this->shelves = $shelves;
    $this->material = $material;
    $this->capacity = $capacity;
}

  public function addBook($book) { //Добавляет книги
    if (count($this->books) < $this->capacity) {
        $this->books[] = $book;
        echo "Книга добавлена: $book\n";
    } else {
        echo "Шкаф заполнен, невозможно добавить книгу.\n";
    }
}

  public function listBooks() { //Возвращает список книг
    return $this->books;
}

  public function removeBook($book) { //Удаляет книгу если она не найдена
    $index = array_search($book, $this->books);
    if ($index !== false) {
        unset($this->books[$index]);
        echo "Книга удалена: $book\n";
    } else {
        echo "Книга не найдена в шкафу.\n";
    }
}
}

// Наследники отличаются материалом
class WoodenBookcase extends Bookcase {
  public $strength;

  public function __construct($shelves, $capacity, $strength) {
      parent::__construct($shelves, "дерево", $capacity);
      $this->strength = $strength;
  }
}

class MetalBookcase extends Bookcase {
  public $isRustproof;

  public function __construct($shelves, $capacity, $isRustproof) {
      parent::__construct($shelves, "металл", $capacity);
      $this->isRustproof = $isRustproof;
  }
}