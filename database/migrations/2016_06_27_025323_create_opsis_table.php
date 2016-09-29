<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opsis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quesioner_id')->unsigned();
            $table->string('pilihan');
            $table->timestamps();

            $table->foreign('quesioner_id')->references('id')->on('quesioners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('opsis');
    }
}
