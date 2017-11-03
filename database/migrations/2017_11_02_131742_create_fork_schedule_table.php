<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForkScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fork_schedule', function (Blueprint $table) {
            $table->integer('fork_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->integer('date')->unsigned();
            $table->string('title');
            $table->integer('price')->unsigned();
            $table->string('description');
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
        Schema::dropIfExists('fork_schedule');
    }
}
