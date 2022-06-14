<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUserToRewards extends Migration
{
    public function up()
    {
        if(!Schema::hasColumn('rewards', 'user_id')) {
            Schema::table('rewards', function (Blueprint $table) {
                $table->integer('user_id');
            });
        }
    }

    public function down()
    {
        if(Schema::hasColumn('rewards', 'user_id')) {
            Schema::table('rewards', function (Blueprint $table) {
                $table->dropColumn('user_id');
            });
        }
    }
}
