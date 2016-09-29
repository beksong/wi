<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetilNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detil_nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nilai_id')->unsigned();
            $table->integer('item_nilai_id')->unsigned();
            $table->integer('nilai')->unsigned();
            $table->timestamps();

            $table->foreign('nilai_id')->references('id')->on('nilais')->onDelete('cascade');
            $table->foreign('item_nilai_id')->references('id')->on('item_nilais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detil_nilais');
    }
}
