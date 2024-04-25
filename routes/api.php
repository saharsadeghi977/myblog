<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\back\UserController as uc;
 use App\Http\Controllers\index\BookController as BC;
 use App\Http\Controllers\Auth\Usercontroller as Auc;

 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/books', [BC::class,'index']);
Route::get('/users/{user}', [uc::class,'show'])->middleware('auth:sanctum');
Route::put('/users/{userid}/books/{bookid}', [uc::class,'update'])->middleware('auth:sanctum');
Route::delete('users/{userid}/books/{bookid}', [uc::class,'destroy'])->middleware('auth:sanctum');

Route::post('/login', [Auc::class, 'login']);
