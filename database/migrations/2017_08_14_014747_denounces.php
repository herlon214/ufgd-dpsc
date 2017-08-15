<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Denounces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('denounces', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('classified_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->text('message');
            $table->datetime('created_at');
        });

        \Schema::table('denounces', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('classified_id')->references('id')->on('classifieds')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('classifieds_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('denounces', function($table) {
            $table->dropForeign('user_id');
            $table->dropForeign('classified_id');
            $table->dropForeign('category_id');
        });
        \Schema::drop('denounces');
    }
}
