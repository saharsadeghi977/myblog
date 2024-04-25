<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'publication_year',
        'price',
        'number_of_page'
    ];
 public function  user()
 {
    return $this->belongsTo(User::class);
 }
}
