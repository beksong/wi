<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngkatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angkatans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lembaga_id')->unsigned();
            $table->string('nama_diklat');
            $table->string('tahun')->nullable();
            $table->string('angkatan')->nullable();
            $table->timestamps();

            $table->foreign('lembaga_id')
                    ->references('id')->on('lembagas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('angkatans');
    }
}
