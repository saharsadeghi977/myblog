<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=[
        "creation_date",
        "amount",
        "payment_geteway",
        "statuse",
        "type"
        
    ];
    // public function Order(){
    //     return $this->hasOne(Order::class);
    // }
    // public function referral_codes(){
    //     return $this-hasOne(Order::class);
    // }{
    public function order(){
        return $this->belongsTo(Order::class , 'order_id', 'id');
    }
    
     
}

