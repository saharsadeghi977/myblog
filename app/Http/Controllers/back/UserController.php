<?php

namespace App\Http\Controllers\back;
use App\Models\User;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(User $user){
        
        return response()->json( $user->books);
    }
    public function update(Request $request,$userid,$bookid){
     
        $validateData = $request->validate([
            'title' => 'required',
            'publication_year' =>'required',
            'price'=>'required',
            'number_of_pages' =>'nullable'
        ]);
     $book=Book::where('user_id',$userid)->findOrFail($bookid);
    $book->fill($validateData);
     return response()->json($book,200);
    }

    public function destroy($userid,$bookid){
     $book=Book::where('userid',$userid)->findOrFail($bookid);
     $book->delete();
     return response()->json(null,204);
    }
}
