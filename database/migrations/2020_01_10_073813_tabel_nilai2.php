<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelNilai2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_rombel');
            $table->string('kd_mapel');
            $table->integer('nis');
            $table->float('uh_5p')->unsigned()->nullable();
            $table->float('uh_5k')->unsigned()->nullable();
            $table->float('uh_6p')->unsigned()->nullable();
            $table->float('uh_6k')->unsigned()->nullable();
            $table->float('uts_2p')->unsigned()->nullable();
            $table->float('uts_2k')->unsigned()->nullable();
            $table->float('uh_7p')->unsigned()->nullable();
            $table->float('uh_7k')->unsigned()->nullable();
            $table->float('uh_8p')->unsigned()->nullable();
            $table->float('uh_8k')->unsigned()->nullable();
            $table->float('ukk_p')->unsigned()->nullable();
            $table->float('ukk_k')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semester2s');
    }
}
