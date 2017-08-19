<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassifiedInterest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('classified_interests', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('categories');
            $table->timestamps();
        });

        \Schema::table('classified_interests', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::drop('classified_interests');
    }
}
