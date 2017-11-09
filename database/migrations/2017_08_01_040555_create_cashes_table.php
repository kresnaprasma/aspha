<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashesTable extends Migration
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
            $table->double('credit_ceiling_request')->nullable();
            $table->string('tenor_request')->nullable();
            $table->double('plafond_maximum');

            $table->string('customer_no')->nullable();
            $table->foreign('customer_no')->references('customer_no')->on('customers');

            $table->string('leasing_no')->nullable();
            $table->foreign('leasing_no')->references('leasing_no')->on('leasings');

            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->integer('credittype_id')->unsigned();
            $table->foreign('credittype_id')->references('id')->on('branches');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->boolean('approval');
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
