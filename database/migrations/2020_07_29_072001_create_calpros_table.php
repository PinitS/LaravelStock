<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalprosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calpros', function (Blueprint $table) {
            $table->id();
            $table->text('modelcal_id');
            $table->text('product_id');
            $table->integer('calquantity');
            $table->integer('sumquantity');
            $table->integer('simcal');
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
        Schema::dropIfExists('calpros');
    }
}
