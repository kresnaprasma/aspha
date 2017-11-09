<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleCollateralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_collaterals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('merk_id');
            $table->string('type_id');

            $table->string('vehicle_date');
            $table->string('vehicle_price');
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
        Schema::drop('vehicle_collaterals');
    }
}
