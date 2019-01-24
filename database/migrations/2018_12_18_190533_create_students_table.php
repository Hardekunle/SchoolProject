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
            $table->string('registration');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('studemail')->unique()->nullabe();
            $table->string('gender')->nullable();
            $table->string('studdate')->nullable();
            $table->string('studphone')->nullable();
            $table->string('fathername');
            $table->string('mothername')->nullable();
            $table->string('occupation')->nullable();
            $table->string('parentphone');
            $table->string('parentphone2')->nullable();
            $table->string('parentaddress')->nullable();
            $table->string('zip');
            $table->string('class');
            $table->string('section');
            $table->string('club')->nullable();
            $table->string('religion')->nullable();
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
        Schema::dropIfExists('students');
    }
}
