<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('master_classes')) {
             Schema::create('master_classes', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('wali_name');
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
        Schema::dropIfExists('master_classes');
    }
}
