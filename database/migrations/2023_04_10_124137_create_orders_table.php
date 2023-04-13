<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->string('street');
            $table->string('postal_code', 5);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('modified_at')->nullable();
            $table->enum('payment',['dobierka', 'karta', 'prevod', 'googlepay']);
            $table->enum('delivery',['postou', 'kurierom', 'osobne']);
        });
        //DB::statement("ALTER TABLE orders ADD payment ENUM('dobierka', 'karta', 'prevod', 'googlepay' )  DEFAULT NULL");
        //DB::statement("ALTER TABLE orders ADD delivery ENUM('postou', 'kurierom', 'osobne')  DEFAULT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
