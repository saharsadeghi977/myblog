<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\referral_code;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


    public function index()
    {
        $refcode = Auth::user()->referral_code();
        $refcode1=$refcode->first->code->code;
        $users=user::query()->where('identifier_code',$refcode1)->latest()->paginate(30);
        return response()->json($users);
    }

    

    public function countLead(){
        $refcode=Auth::user()->referral_code();
        $refcode1=$refcode->first->code->code;
        $users=user::query()->where('identifier_code',$refcode1)->count();
        return response()->json($users);
      
    }

    public function orderLead(){

        $refcode=Auth::user()->referral_code();
        $refcode1=$refcode->first->code->code;
        $userswithOrders=user::query()->where('identifier_code',$refcode1)->whereHas('orders',function($query){
            $query->where('status','approved');
        })->get();
            
             
        return response()->json( UserResource::collection ($userswithOrders));

}
public function searchUserByPhone(Request $request){

    $phoneNumber=$request->input('phone_number');
    $refcode=Auth::user()->referral_code();
    $refcode1=$refcode->first->code->code;
    $userswithOrders=user::query()->where('identifier_code',$refcode1)->where('mobile','like','%'. $phoneNumber.'%')->whereHas('orders',function($q)  {
        $q->where('statuse','approved');
    })->get(); 
    return response()->json($userswithOrders);
    
    
}
}