<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->string('business_name');
            $table->string('representative_name')->nullable();
            // $table->string('email')->unique();
            $table->integer('cashback')->default(0);
            // $table->string('phone')->unique();
            // $table->string('password');
            // $table->integer('estatus')->default(1);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
};
