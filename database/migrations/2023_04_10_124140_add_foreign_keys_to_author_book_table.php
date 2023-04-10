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
        Schema::table('author_book', function (Blueprint $table) {
            $table->foreign(['author_id'], 'autor_books_autor_id_fkey')->references(['id'])->on('authors');
            $table->foreign(['book_id'], 'autor_books_book_id_fkey')->references(['id'])->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('author_book', function (Blueprint $table) {
            $table->dropForeign('autor_books_autor_id_fkey');
            $table->dropForeign('autor_books_book_id_fkey');
        });
    }
};
