<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashfixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashfixes', function (Blueprint $table) {
            $table->string('id')->index();
            $table->primary('id');
            $table->string('cashfix_no')->unique();
            $table->string('tenor_approve')->nullable();
            $table->string('payment')->nullable();
            $table->date('approve_date')->nullable();
            $table->string('plafond_approve')->nullable();
            $table->boolean('approve')->default(false);

            $table->string('leasing_no')->nullable();
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
