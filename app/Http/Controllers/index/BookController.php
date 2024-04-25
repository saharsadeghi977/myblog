<?php

namespace App\Http\Controllers\index;

// use App\Models\User;
use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Http\Controllers\Controller;
use App\Services\BookService;
use Illuminate\Http\Request;
class BookController extends Controller
{
    protected $bookService;
    public function __construct(BookService $bookService)

    {
     $this->bookService=$bookService;
    }
    public function index(Request $request)
   {
    $name=$request->input('name');
    $title=$request->input('title');
    $books=$this->bookService->searchBooks($name,$title);
    return response()->json( BookResource::collection($books));

   }
    
    // public function index(Request $request) {

        
    //    $query=Book::query()->with('user');
    //    if($request->has('name')){
    //     $query->whereHas('user',function($q) use($request){
    //         $q->where('name','like','%'.$request->input('name').'%');
    //     });  
    // }
    //  if($request->has('title')){
    //     $query->where('title','like','%'.$request->input('title').'%');
    //  }
    //  $books=$query->get();
    
    //  if($books){
    //     return response()->json( BookResource::collection($books));
    //     }
    //     else{
    //         return response()->json(['message'=>'Not found'],404);
    //     }
    // }

}
