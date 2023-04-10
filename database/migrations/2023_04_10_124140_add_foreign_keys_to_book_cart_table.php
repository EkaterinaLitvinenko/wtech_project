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
        Schema::table('book_cart', function (Blueprint $table) {
            $table->foreign(['book_id'], 'book_cart_book_id_fkey')->references(['id'])->on('books');
            $table->foreign(['cart_id'], 'book_cart_cart_id_fkey')->references(['id'])->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_cart', function (Blueprint $table) {
            $table->dropForeign('book_cart_book_id_fkey');
            $table->dropForeign('book_cart_cart_id_fkey');
        });
    }
};
