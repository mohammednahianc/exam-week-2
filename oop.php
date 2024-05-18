<?php
interface Borrowable {
    public function borrowBook();
    public function returnBook();
}

abstract class AbstractBook implements Borrowable {
    protected $title;
    protected $availableCopies;

    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
        } else {
            echo "No available copies of '{$this->title}' to borrow.\n";
        }
    }

    public function returnBook() {
        $this->availableCopies++;
    }
}

class Book extends AbstractBook {}

class Member {
    private $name;
    private $borrowedBooks = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function borrowBook($book) {
        $book->borrowBook();
        $this->borrowedBooks[] = $book;
    }

    public function returnBook($book) {
        $book->returnBook();
        if (($key = array_search($book, $this->borrowedBooks)) !== false) {
            unset($this->borrowedBooks[$key]);
        }
    }
}

$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

$member1->borrowBook($book1);
$member2->borrowBook($book2);

echo "Available Copies of '{$book1->getTitle()}': {$book1->getAvailableCopies()}\n";
echo "Available Copies of '{$book2->getTitle()}': {$book2->getAvailableCopies()}\n";
?>

