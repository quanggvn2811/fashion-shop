<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditFsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_fs_products', function (Blueprint $table) {
            $table->text('tags')->nullable()->change();
            $table->text('content')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->text('images')->nullable()->change();
            $table->integer('views')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_fs_products', function (Blueprint $table) {
            //
        });
    }
}
