<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculatorFabricTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculator_fabric', function (Blueprint $table) {
            $table->increments('id');
            $table->string('front');
            $table->string('back');
            $table->float('light_fabric_non_online_25');
            $table->float('light_fabric_non_online_50');
            $table->float('light_fabric_non_online_100');
            $table->float('light_fabric_non_online_150');
            $table->float('dark_fabric_non_online_25');
            $table->float('dark_fabric_non_online_50');
            $table->float('dark_fabric_non_online_100');
            $table->float('dark_fabric_non_online_150');
            $table->float('light_fabric_online_25');
            $table->float('light_fabric_online_50');
            $table->float('light_fabric_online_100');
            $table->float('light_fabric_online_150');
		    $table->float('dark_fabric_online_25');
            $table->float('dark_fabric_online_50');
            $table->float('dark_fabric_online_100');
            $table->float('dark_fabric_online_150');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculator_fabric');
    }
}
