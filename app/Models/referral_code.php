<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referral_code extends Model
{
    use HasFactory;
    
                protected $fillable=[
                    "code",
                    "amount",
                    "statuse",
                    
                ];
     public function users()
    {
        return $this->hasmany(User::class);
    }
     

}
