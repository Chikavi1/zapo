<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSupplierToUsers extends Migration
{
  
    public function up()
    {
        if(!Schema::hasColumn('users', 'id_supplier')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('id_supplier')->nullable();
            });
        }
    }

    public function down()
    {
        if(Schema::hasColumn('users', 'id_supplier')) {
         Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('id_supplier');
            });
        }
    }
}
