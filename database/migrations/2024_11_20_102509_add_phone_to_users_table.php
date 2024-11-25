<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('gicxdc')->nullable(); 
        });
    }
    
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('gicxdc'); 
        });
    }
}
