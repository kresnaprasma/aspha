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

            $table->string('customer_name');
            $table->foreign('customer_name')->references('name')->on('customers');
            
            $table->string('mokas_number');
            $table->boolean('ktp');
            $table->boolean('kk');
            $table->string('bank_id');
            $table->string('rek_number');
            $table->double('others_cost');


            $table->enum('payment_method', ['cash', 'credit']);
            
            $table->string('leasing_no')->nullable();
            $table->foreign('leasing_no')->references('leasing_no')->on('leasings');
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
