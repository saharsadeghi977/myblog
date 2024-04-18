<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\UserController as uc;
 use App\Http\Controllers\TransactionController as tc;
 use App\Http\Controllers\Auth\Usercontroller as Auc;
 use App\Http\Controllers\OrderController as oc;
 

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

Route::get('/users', [uc::class,'index'])->middleware('auth:sanctum');
Route::get('/transactions', [tc::class,'index'])->middleware('auth:sanctum');
Route::get('/amountTotal', [tc::class,'amountTotal'])->middleware('auth:sanctum');
Route::get('/countorderLead', [oc::class,'countorderLead'])->middleware('auth:sanctum');
Route::get('/countLead', [uc::class,'countLead'])->middleware('auth:sanctum');
Route::get('/orderLead', [uc::class,'orderLead'])->middleware('auth:sanctum');
Route::post('/transaction/searchdate', [tc::class,'searchByTimeInterval'])->middleware('auth:sanctum');
Route::get('/transaction/searchphone', [tc::class,'searchByphone'])->middleware('auth:sanctum');
Route::get('/userorderlead/searchphone', [uc::class,'searchUserByPhone'])->middleware('auth:sanctum');




Route::post('/login', [Auc::class, 'login']);
