<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('students')) {
                Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('nis');
                $table->string('nisn');
                $table->string('name');
                $table->string('gender');
                $table->string('religion');
                $table->string('phone');
                $table->bigInteger('school_year');
                $table->foreignId('master_class_id');
                $table->timestamps();
            });
        }
        
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
