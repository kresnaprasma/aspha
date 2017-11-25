<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('sales_no')->unique();

            $table->string('customer_no');
            $table->foreign('customer_no')->references('customer_no')->on('customers');

            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches');
            
            $table->string('mokas_number');
            $table->foreign('mokas_number')->references('mokas_no')->on('mokas');

            $table->boolean('ktp');
            $table->boolean('kk');
            $table->string('bank_id');
            $table->string('rek_number');
            $table->string('others_cost');


            $table->enum('payment_method', ['cash', 'credit']);
            $table->string('down_payment');
            $table->string('tenor')->nullable();
            $table->string('payment')->nullable();

            $table->string('leasing_no')->nullable();
            $table->foreign('leasing_no')->references('leasing_no')->on('leasings');
            $table->string('cashier');
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
        Schema::dropIfExists('sales');
    }
}
