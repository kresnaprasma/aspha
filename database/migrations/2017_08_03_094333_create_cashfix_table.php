<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashfixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashfixes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenor_approve');
            $table->string('payment');
            $table->date('approve_date');

            $table->string('leasing_no');
            $table->foreign('leasing_no')->references('leasing_no')->on('leasings');

            $table->string('cash_no');
            $table->foreign('cash_no')->references('cash_no')->on('cashes');
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
        Schema::dropIfExists('cashfixes');
    }
}
