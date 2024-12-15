<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumberAndAddressesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add a phone number column
            $table->string('number')->nullable();  // Or change to 'integer' if it's a numeric value

            // Add an address column (can be a string or JSON depending on the use case)
            $table->text('addresses')->nullable();  // Or use 'json' if it's structured data
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the columns in case of rollback
            $table->dropColumn('number');
            $table->dropColumn('addresses');
        });
    }
}
