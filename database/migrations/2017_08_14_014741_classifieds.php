<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Classifieds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('classifieds', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('state', 2);
            $table->string('cep', 8);
            $table->string('contact_phone', 11);
            $table->string('contact_name');
            $table->timestamps();
        });

        \Schema::table('classifieds', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        \Schema::table('classifieds', function($table) {
            $table->dropForeign('user_id');
            $table->dropForeign('category_id');
        });
        \Schema::drop('classifieds');

    }
}
