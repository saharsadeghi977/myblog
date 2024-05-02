<?php

namespace Database\Seeders;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Book::factory(20)->create();
        Book::create([
            'user_id'=>'1',
            'title'=>'کتاب1',
            'publication_year'=>'2009',
            'price'=>'12.8',
            'number_of_pages'=>'200'


        ]);
        Book::create([
            'user_id'=>'2',
            'title'=>'کتاب2',
            'publication_year'=>'2003',
            'price'=>'18.8',
            'number_of_pages'=>'205'

        ]);
        Book::create([
            'user_id'=>'3',
            'title'=>'کتاب3',
            'publication_year'=>'2006',
            'price'=>'20.8',
            'number_of_pages'=>'300'


        ]);

        Book::create([
            'user_id'=>'2',
            'title'=>'کتاب4',
            'publication_year'=>'2002',
            'price'=>'209.8',
            'number_of_pages'=>'3900'


        ]);
    }
}
