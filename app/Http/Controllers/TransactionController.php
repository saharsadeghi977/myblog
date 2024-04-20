<?php
namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use APP\Models\Package;
use Morilog\Jalali\Jalalian; 
use App\Models\referral_code;
use App\Http\Resources\TransactionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function index() {

        $refcode = Auth::user()->referral_code();
        $refcode1=$refcode->first->code->code;
        $leaderTransactions=Transaction::query()->get();
        return response()->json( TransactionResource::collection($leaderTransactions));
        
    }

   public function searchByTimeInterval(Request $request){
     $request->validate([
        'start_date'=>'required|date',
        'end_date'=>'required|date|after_or_equal:start_date',
     ]);
     $startDate=Jalalian::fromFormat('Y-m-d H:i:s',$request)->input('start_date')->toCarbon();
     $endDate=Jalalian::fornFormat('Y-m-d H:i:s',$request)->input('end_date')->toCarbon();

       $refcode = Auth::user()->referral_code();
        $refcode1=$refcode->first->code->code;
        $leaderTransactions=Transaction::query()->whereBetween('creation_date',[$startDate,$endDate])->get();
        if($leaderTransactions){
        return response()->json( TransactionResource::collection($leaderTransactions));
        }
        else{
            return response()->json(['message'=>'Not found'],404);
        }

   }
   public function searchByphone(Request $request)

{
    $phoneNumber=$request->input('mobile');
    $refcode = Auth::user()->referral_code();
    $refcode1=$refcode->first->code->code;
    $leaderTransactions=Transaction::query()->where($phoneNumber,'mobile')->where('mobile','like','%'.$phoneNumber.'%')->get();
    if($leaderTransactions){
        return response()->json( TransactionResource::collection($leaderTransactions));
        }
        else{
            return response()->json(['message'=>'Not found'],404);
        }
}






  
    public function  amountTotal(){
    $refcode = Auth::user()->referral_code();
    $totalPaidAmount=0;
   $orders=Order::query()->where('type' ,'package')->where('referral_code',$refcode->first->code->code)->with(['Transactions'])->get();
  
    foreach($orders as $order)
    {
        foreach($order->Transactions as $transaction)
        {
            if($transaction->status ==='paid'){
                $totalPaidAmount +=$transaction->amount;
            }

        }
    }
    return response()->json($totalPaidAmount);

 


    }
}





