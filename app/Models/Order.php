<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        "creation_date",
        "status",
        "type"
    ];
    // public function user(){
    //     return $this->hasOne(User::class);
    // }
    // public function Items(){
    //     return $this->belongsToMany(Item::class)->withPivot("count","price");
    // }
    
    public function referral_code(){
             return $this->hasOne(Order::class);
         }
         public function Transactions(){
            return $this->hasmany(Transaction::class);
        }
        public function user()

        {
            return $this->belongsTo(User::class , 'user_id','id');

        }
        public function packages(){

             return $this
             ->hasManyThrough(package::class , Order_item::class ,'order_id','id','id','package_id');
              
        }
    }

