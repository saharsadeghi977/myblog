<?php
namespace App\Repositories;
use App\Models\Book;
class BookRepository{
    public function search($name,$title)
{
$query=Book::query()->with('user');

if($name)
{
   $query->whereHas('user',function($q)use($name){
    $q->where('name','like','%'.$name.'%');
   });
}
if($title){
    $query->where('title','like','%'.$title.'%');
}

return $query->get();
}


}
