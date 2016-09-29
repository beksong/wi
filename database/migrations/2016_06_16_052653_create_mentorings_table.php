<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentorings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mentor_id')->unsigned();
            $table->integer('alumni_id')->unsigned();
            $table->integer('angkatan_id')->unsigned();
            $table->string('status_mentor_diklat');
            $table->string('status_mentor_skrg');
            $table->timestamps();

            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade');
            $table->foreign('alumni_id')->references('id')->on('alumnis')->onDelete('cascade');
            $table->foreign('angkatan_id')->references('id')->on('angkatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mentorings');
    }
}
