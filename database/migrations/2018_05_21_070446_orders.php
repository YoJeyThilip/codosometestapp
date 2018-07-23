<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('invoice_no');
            $table->string('due_date');
            $table->string('nic_name')->nullable();
            $table->string('customer');
            $table->string('order_status');
            $table->string('order_status_color');
            $table->string('payment_status');
            $table->integer('student_id');
            $table->string('student_name');
            $table->string('order_total');
            $table->string('created_at');
            $table->string('total_quantity');
            $table->string('campus')->nullable();
            $table->string('commision')->default( 0 );
            $table->string('payed')->default( 'No' );
        }); 
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
}
