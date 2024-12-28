<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecializationSymptomTable extends Migration
{
    public function up()
    {
        Schema::create('specialization_symptom', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('specialization_id') // Foreign key to specializations table
                  ->constrained('specializations') // References the 'id' on 'specializations'
                  ->onDelete('cascade'); // Cascades on delete
            $table->foreignId('symptom_id') // Foreign key to symptoms table
                  ->constrained('symptoms') // References the 'id' on 'symptoms'
                  ->onDelete('cascade'); // Cascades on delete
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('specialization_symptom');
    }
}