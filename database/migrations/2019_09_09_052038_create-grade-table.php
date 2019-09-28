<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('grade', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->string('test');  
             $table->string('homework');
             $table->string('expression');
             $table->string('pronunciation');
             $table->string('writing');
             $table->string('finalgrade');
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
        //
    }
}
