<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controlle;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\referral_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index(){

       
        

        
    }


    public function countorderLead(){
        $refcode=Auth::user()->referral_code();
        $refcode1=$refcode->first->code->code;
        $orders=Order::query()->where('status','approved')->where('referral_code',$refcode1)
        ->distinct('user_id')->count();

        return response()->json( $orders);
    
     
    }
   
    

        
        

}