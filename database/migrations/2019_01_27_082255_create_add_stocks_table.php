<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('add_qty')->nullable();
            $table->integer('withdraw')->nullable();
            $table->integer('total');
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('add_stocks');
    }
}
