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
        /**
         * This migration creates a table with name 'students' into the database.
         */
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');       // like GeneratedType.IDENTITY
            $table->string('first_name');   // Field
            $table->string('last_name');    // Field
            $table->timestamps();           // created_at and updated_at timestamps (Laravel featues)
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
