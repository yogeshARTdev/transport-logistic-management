<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('received_goods', function (Blueprint $table) {
            $table->id();
            $table->string('good_id');
            $table->string('supplier_id');
            $table->string('client_id');
            $table->string('quantity');
            $table->string('size');
            $table->string('weight');
            $table->string('amount');
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
        Schema::dropIfExists('received_goods');
    }
}
