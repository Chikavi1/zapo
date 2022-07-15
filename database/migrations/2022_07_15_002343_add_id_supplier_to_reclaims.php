<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSupplierToReclaims extends Migration
{
   
    public function up()
    {
        if(!Schema::hasColumn('reclaims', 'id_supplier')) {
            Schema::table('reclaims', function (Blueprint $table) {
                $table->integer('id_supplier')->nullable();
            });
        }
    }

   
    public function down()
    {
        if(Schema::hasColumn('reclaims', 'id_supplier')) {
            Schema::table('reclaims', function (Blueprint $table) {
                   $table->dropColumn('id_supplier');
               });
           }
    }
}
