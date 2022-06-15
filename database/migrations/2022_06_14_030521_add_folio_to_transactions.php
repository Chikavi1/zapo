<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFolioToTransactions extends Migration
{
    
    public function up()
    {
        if(!Schema::hasColumn('transactions', 'folio')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->string('folio');
            });
        }
    }

    public function down()
    {
        if(Schema::hasColumn('transactions', 'folio')) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->dropColumn('folio');
            });
        }
    }
}
