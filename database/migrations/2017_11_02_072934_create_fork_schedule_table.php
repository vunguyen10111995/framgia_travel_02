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
            $table->unsignedInteger('fork_id');
            $table->unsignedInteger('service_id');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->smallInteger('date');
            $table->string('title');
            $table->integer('price');
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
