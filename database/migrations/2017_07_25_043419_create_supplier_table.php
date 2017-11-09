<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('supplier_no')->unique();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('npwp')->nullable();
            $table->string('pic_name')->nullable();
            $table->string('pic_phone')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_no')->nullable();

            $table->integer('bank_id')->unsigned();
            $table->foreign('bank_id')->references('id')->on('banks');
            
            $table->string('bank_branch')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
