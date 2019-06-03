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
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('category_id')->unsigned();
            $table->string('code');
            $table->float('price');
            $table->integer('availability');
            $table->string('brand');
            $table->string('image')->nullable();
            $table->mediumText('description');
            $table->tinyInteger('is_new');
            $table->tinyInteger('is_recommended');
            $table->tinyInteger('status');
            $table->timestamps();
        });
        
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('product_categories');
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
