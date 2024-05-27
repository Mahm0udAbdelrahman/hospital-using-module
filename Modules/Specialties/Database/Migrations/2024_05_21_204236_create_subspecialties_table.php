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
        Schema::create('subspecialties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialty_id')->constrained('specialties','id')->cascadeOnDelete();
            $table->string('subspecialty_name');
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
        Schema::dropIfExists('subppecialties');
    }
};
