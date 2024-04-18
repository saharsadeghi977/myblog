<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'price', 'image', 'description'];
  

   
    
    public function item()

        {
            return $this->belongsTo(order_item::class , 'order_id','id');

        }
}
