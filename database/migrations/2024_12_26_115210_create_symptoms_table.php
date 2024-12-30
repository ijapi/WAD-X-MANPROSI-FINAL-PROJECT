<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymptomsTable extends Migration
{
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 255); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('symptoms');
    }
}