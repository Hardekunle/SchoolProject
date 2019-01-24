<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('marital')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('date')->nullable();
            $table->string('religion')->nullable();
            $table->text('address');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('degree');
            $table->string('university');
            $table->string('course');
            $table->string('grade');
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
        Schema::dropIfExists('teachers');
    }
}
