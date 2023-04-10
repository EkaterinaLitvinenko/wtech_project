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
        Schema::table('book_order', function (Blueprint $table) {
            $table->foreign(['book_id'], 'order_items_book_id_fkey')->references(['id'])->on('books');
            $table->foreign(['order_id'], 'order_items_order_detail_id_fkey')->references(['id'])->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_order', function (Blueprint $table) {
            $table->dropForeign('order_items_book_id_fkey');
            $table->dropForeign('order_items_order_detail_id_fkey');
        });
    }
};
