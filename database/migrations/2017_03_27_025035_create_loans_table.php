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
            $table->string('id')->index();

            $table->string('loan_no')->unique();
            $table->string('merk');
            $table->string('type');
            $table->string('vehicle_color');
            $table->string('vehicle_cc');
            $table->string('bpkb');
            $table->string('chassis_number');
            $table->string('machine_number');
            $table->date('stnk_due_date');
            $table->date('vehicle_date');
            $table->string('tenor');
            $table->double('price_request');
            $table->enum('user_approval', ['YES', 'NO']);
            
            $table->integer('approval')->unsigned();
            $table->foreign('approval')->references('id')->on('users');

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

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
        Schema::drop('loans');
    }
}
