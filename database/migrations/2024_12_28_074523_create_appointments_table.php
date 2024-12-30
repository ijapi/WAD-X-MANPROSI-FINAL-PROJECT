<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('specialization_id')->nullable();
            $table->date('appointment_date');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctor')->onDelete('cascade');
            $table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}

