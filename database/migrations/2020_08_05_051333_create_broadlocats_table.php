<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBroadlocatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadlocats', function (Blueprint $table) {
            $table->id();
            $table->text('modellocat_id');
            $table->text('serialbroad');
            $table->text('customername');
            $table->text('province_id');
            $table->text('address');
            $table->text('setupdate');
            $table->text('map');
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
        Schema::dropIfExists('broadlocats');
    }
}
