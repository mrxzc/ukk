<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id');
            $table->integer('masakan_id');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->string('keterangan');
            $table->string('status_detail_order');
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
        Schema::dropIfExists('detailorders');
    }
}
