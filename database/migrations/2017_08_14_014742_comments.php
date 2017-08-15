<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('comments', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('classified_id')->unsigned();
            $table->text('comment');
            $table->timestamps();
        });

        \Schema::table('comments', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('classified_id')->references('id')->on('classifieds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('comments', function($table) {
            $table->dropForeign('user_id');
            $table->dropForeign('classified_id');
        });

        \Schema::drop('comments');
    }
}
