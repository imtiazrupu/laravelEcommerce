<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->integer('product_category_id')->unsigned();
            $table->string('name');
            $table->float('price');
            $table->string('sku')->unique()->nullable();
            $table->text('description')->nullable();
            $table->string('default_img');
            $table->tinyInteger('available')->default(1);
            $table->string('item_no')->unique();
            $table->string('versions')->nullable();
            $table->tinyInteger('featured');
            $table->string('color');
            $table->string('pdf')->nullable();
            $table->string('collection')->nullable();
            $table->string('brand')->nullable();
            $table->string('product_code')->nullable();
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
        Schema::dropIfExists('products');
    }
}
