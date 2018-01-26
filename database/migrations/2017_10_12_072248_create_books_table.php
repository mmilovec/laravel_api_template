<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Create 'books' table
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('bookTitle');
            $table->string('ISBN');
            $table->string('publisher');
            $table->integer('numberOfPages');
            $table->integer('authorID')->unsigned();
            $table->integer('shelveID')->unsigned();
            $table->foreign('authorID')->references('id')->on('authors');
            $table->foreign('shelveID')->references('id')->on('shelves');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Drop 'books' table
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
