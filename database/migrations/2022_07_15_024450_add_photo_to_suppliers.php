<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoToSuppliers extends Migration
{
   
    public function up()
    {
        if(!Schema::hasColumn('suppliers', 'photo')) {
            Schema::table('suppliers', function (Blueprint $table) {
                $table->string('photo')->default('default.png')->nullable();
            });
        }
    }

    public function down()
    {
        if(Schema::hasColumn('suppliers', 'photo')) {
            Schema::table('suppliers', function (Blueprint $table) {
                   $table->dropColumn('photo');
               });
           }
    }
}
