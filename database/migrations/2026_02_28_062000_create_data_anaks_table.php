<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAnaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_anaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orangtua_id')
                ->nullable()
                ->constrained('data_orangtuas')
                ->nullOnDelete();
            $table->string('nama_anak');
            $table->date('tanggal_lahir');
            $table->string('nik')->unique();
            $table->enum('jenis_kelamin', ['L', 'P']);

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
        Schema::dropIfExists('data_anaks');
    }
}
