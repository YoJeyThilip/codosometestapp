<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommonItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('common_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('product');
            $table->float('cost');
            $table->float('non_online_store');
            $table->float('online_store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('common_items');
    }
}
