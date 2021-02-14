<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fs_products', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->string('name');
            $table->text('tags');
            $table->text('content');
            $table->text('description');
            $table->string('slug');
            $table->bigInteger('price');
            $table->text('images');
            $table->integer('views');
            $table->tinyInteger('display');
            $table->integer('quantity');
            $table->integer('brand_id')->unsigned();
            $table->integer('prodline_id')->unsigned();
            $table->foreign('brand_id')->references('brand_id')->on('tbl_fs_brands');
            $table->foreign('prodline_id')->references('prodline_id')->on('tbl_fs_productlines');
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
        Schema::dropIfExists('tbl_fs_products');
    }
}
