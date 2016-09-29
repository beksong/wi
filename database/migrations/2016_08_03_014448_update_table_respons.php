<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableRespons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('respons')) {
            # code...
            $this->down();
        }

        Schema::create('respons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mentoring_id')->unsigned();
            $table->integer('quesioner_id')->unsigned();
            $table->integer('opsi_id')->unsigned();
            $table->string('answer');
            $table->string('answerof')->default('mentor');
            $table->timestamps();

            $table->foreign('mentoring_id')->references('id')->on('mentorings')->onDelete('cascade');
            $table->foreign('quesioner_id')->references('id')->on('quesioners')->onDelete('cascade');
            $table->foreign('opsi_id')->references('id')->on('opsis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('respons');
    }
}
