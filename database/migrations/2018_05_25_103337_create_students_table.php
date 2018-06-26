<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('student_name');
            $table->string('campus')->nullable();
            $table->string('connected')->default( 'not yet' );
            $table->string('avatar_background_color')->nullable();
            $table->string('avatar_initials')->nullable();
            $table->string('avatar_url_small')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
