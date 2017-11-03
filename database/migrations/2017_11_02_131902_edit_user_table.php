<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'full_name');
            $table->string('avatar')->after('password')->nullable();
            $table->string('address')->after('avatar')->nullable();
            $table->integer('gender')->after('address')->unsigned();
            $table->integer('level')->after('gender')->unsigned()->default(0);
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
            $table->renameColumn('full_name', 'name');
            $table->dropColumn('avatar');
            $table->dropColumn('address');
            $table->dropColumn('gender');
            $table->dropColumn('level');
        });    
    }
}
