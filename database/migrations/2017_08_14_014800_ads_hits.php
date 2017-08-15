<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdsHits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('ads_hits', function($table) {
            $table->increments('id');
            $table->integer('ad_id')->unsigned();
            $table->datetime('created_at');
        });

        \Schema::table('ads_hits', function($table) {
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('ads_hits', function($table) {
            $table->dropForeign('ad_id');
        });
        \Schema::drop('ads_hits');
    }
}
