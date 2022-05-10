<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('max')->nullable();
            $table->integer('min')->nullable();
            $table->float('perbedaan')->nullable();
            $table->date('tanggal')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('berats');
    }
}
