<?php
namespace App\Services;
use App\Repositories\BookRepository;
class BookService{
    protected $bookRepository;
    public function __construct(BookRepository $bookRepository){
        $this->bookRepository=$bookRepository;
    }
    public function searchBooks($name,$title){
        
     return $this->bookRepository->search($name ,$title);
    }
}