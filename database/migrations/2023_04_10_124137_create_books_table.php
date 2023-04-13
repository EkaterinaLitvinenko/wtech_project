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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn', 13)->nullable();
            $table->string('title');
            $table->string('description', 2048);
            $table->decimal('price', 15)->nullable();
            $table->integer('page_count')->nullable();
            $table->bigInteger('genre_id')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('modified_at')->nullable();
            $table->enum('language',['slovensky', 'anglicky']);
            $table->enum('type',['brozovana', 'pevna', 'ekniha', 'audiokniha']);
        });
       // DB::statement("ALTER TABLE books ADD language ENUM ('slovensky', 'anglicky')  DEFAULT NULL");
       // DB::statement("ALTER TABLE books ADD type ENUM('brozovana', 'pevna', 'ekniha', 'audiokniha' )  DEFAULT NULL");
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
