<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('date');
            $table->string('descrtiption');
            $table->foreignId('doctor_id')->references('id')->on('register_specialists')->onDelete('cascade')->nullable();
            $table->foreignId('patient_id')->references('id')->on('register_specialists')->onDelete('cascade')->nullable();
            $table->foreignId('hospital_id')->references('id')->on('register_specialists')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('requests');
    }
};