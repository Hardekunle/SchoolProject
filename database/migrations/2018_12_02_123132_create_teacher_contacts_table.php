<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_personal_id');
            $table->text('address');
            $table->text('address_2')->nullable();
            $table->string('phoneNo')->unique()->nullable();
            $table->string('state');
            $table->string('zip')->nullable();
            $table->string('maritalStatus');
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
        Schema::dropIfExists('teacher_contacts');
    }
}
