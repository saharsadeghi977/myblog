<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {

            $table->id();
            $table->unsignedInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->string('title');
            $table->integer('publication_year')->nullable();
            $table->decimal('price',8,2)->nullable();
            $table->integer('number_of_pages')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
