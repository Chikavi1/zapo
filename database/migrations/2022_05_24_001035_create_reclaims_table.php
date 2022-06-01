<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('reclaims', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->integer('id_rewards');
            $table->string('token');
            $table->integer('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reclaims');
    }
};
