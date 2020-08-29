<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('harga');
            $table->text('alamat');
            $table->integer('provinsi_id')->unsigned();
            $table->foreign('provinsi_id')->references('id')->on('provinsi')->onDelete('CASCADE');
            $table->integer('kota_id')->unsigned();
            $table->foreign('kota_id')->references('id')->on('kota')->onDelete('CASCADE');
            $table->string('gambar');
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
        Schema::dropIfExists('manage');
    }
}
