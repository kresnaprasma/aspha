<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');

            $table->string('collateral_id');
            $table->string('merk');
            $table->string('type');
            $table->string('vehicle_year');
            $table->string('vehicle_cc');
            $table->string('bpkb');
            $table->string('chassis_number');
            $table->string('machine_number');
            $table->date('stnk_due_date');
            $table->date('vehicle_date');
            $table->string('tenor');
            $table->double('price_request');
            $table->string('approval');
            $table->integer('user_approval');
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
        Schema::drop('loans');
    }
}
