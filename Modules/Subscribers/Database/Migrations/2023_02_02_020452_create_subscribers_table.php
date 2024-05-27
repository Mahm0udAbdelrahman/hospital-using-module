<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('the_organization');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('image')->nullable();
            $table->string('phone');
            $table->string('facebook');
            $table->string('instagram');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}