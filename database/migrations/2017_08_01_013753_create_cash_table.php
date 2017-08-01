<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashes', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('cash_no')->unique();
            $table->string('credit_ceiling_request')->nullable();
            $table->string('tenor_request')->nullable();

            $table->string('customer_no');
            $table->foreign('customer_no')->references('customer_no')->on('customers');

            $table->string('leasing_no');
            $table->foreign('leasing_no')->references('leasing_no')->on('leasings');

            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches');
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
        Schema::dropIfExists('cashes');
    }
}
