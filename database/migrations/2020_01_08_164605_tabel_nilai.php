<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester1s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kd_rombel');
            $table->string('kd_mapel');
            $table->integer('nis');
            $table->float('uh_1p')->unsigned()->nullable();
            $table->float('uh_1k')->unsigned()->nullable();
            $table->float('uh_2p')->unsigned()->nullable();
            $table->float('uh_2k')->unsigned()->nullable();
            $table->float('uts_1p')->unsigned()->nullable();
            $table->float('uts_1k')->unsigned()->nullable();
            $table->float('uh_3p')->unsigned()->nullable();
            $table->float('uh_3k')->unsigned()->nullable();
            $table->float('uh_4p')->unsigned()->nullable();
            $table->float('uh_4k')->unsigned()->nullable();
            $table->float('uas_p')->unsigned()->nullable();
            $table->float('uas_k')->unsigned()->nullable();
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
        Schema::dropIfExists('semester1s');
    }
}
