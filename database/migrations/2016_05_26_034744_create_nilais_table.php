<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('angkatan_id')->unsigned();
            $table->integer('matadiklat_id')->unsigned();
            $table->integer('widyaiswara_id')->unsigned();
            $table->date('tgl');
            $table->integer('jp');
            $table->timestamps();

            $table->foreign('angkatan_id')->references('id')->on('angkatans')->onDelete('cascade');
            $table->foreign('matadiklat_id')->references('id')->on('matadiklats')->onDelete('cascade');
            $table->foreign('widyaiswara_id')->references('id')->on('widyaiswaras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nilais');
    }
}
