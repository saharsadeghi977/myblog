<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'نویسنده ک',
            'email'=>'shadii@gmail.com',
            'country'=>'gma',
            'password'=>'$2a$12$Y646ZRHHFTO6iw0aPgSRlO1ZREzOHbGGuwAZZtY52DY3uZDifuhC6',


        ]);
        User::create([
            'name'=>'نویسنده دو',
            'email'=>'sahar@gmail.com',
            'country'=>'usa',
            'password'=>'$2a$12$Y646ZRHHFTO6iw0aPgSRlO1ZREzOHbGGuwAZZtY52DY3uZDifuhC6',


        ]);
        User::create([
            'name'=>'نویسنده سه',
            'email'=>'arman@gmail.com',
            'country'=>'germany',
            'password'=>'$2a$12$Y646ZRHHFTO6iw0aPgSRlO1ZREzOHbGGuwAZZtY52DY3uZDifuhC6',


        ]);
        
    }
}
