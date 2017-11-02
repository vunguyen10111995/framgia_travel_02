<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
        });

        Schema::table('forks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plan_id')->references('id')->on('plans');
        });

        Schema::table('fork_schedule', function (Blueprint $table) {
            $table->foreign('fork_id')->references('id')->on('forks');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('rates', function (Blueprint $table) {    
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plan_id')->references('id')->on('plans');
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('category_id')->references('id')->on('categories');
        });   

        Schema::table('request_services', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('province_id')->references('id')->on('provinces');
        });

        Schema::table('plan_province', function (Blueprint $table) {
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['post_id']);
        });

        Schema::table('forks', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('plan_id');
        });

        Schema::table('fork_schedule', function (Blueprint $table) {
            $table->dropForeign(['fork_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('rates', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['plan_id']);
        });

        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['plan_id']);
            $table->dropForeign(['service_id']);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
            $table->dropForeign(['category_id']);
        });   

        Schema::table('request_services', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['province_id']);
        });

        Schema::table('plan_province', function (Blueprint $table) {
            $table->dropForeign(['province_id']);
            $table->dropForeign(['plan_id']);
        });
    }
}
