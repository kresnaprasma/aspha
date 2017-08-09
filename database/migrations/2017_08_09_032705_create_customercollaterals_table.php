<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomercollateralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customercollaterals', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('customercollateral_no')->unique();
            $table->string('stnk')->unique();
            $table->string('bpkb')->unique();
            $table->string('machine_number')->unique();
            $table->string('chassis_number')->unique();
            $table->string('vehicle_color')->nullable();
            $table->string('vehicle_cc')->nullable();
            $table->string('collateral_name')->nullable();
            $table->date('vehicle_date')->nullable();
            $table->date('stnk_due_date')->nullable();

            $table->string('customer_no');
            $table->foreign('customer_no')->references('customer_no')->on('customers');
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
        Schema::dropIfExists('customercollaterals');
    }
}
