<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->increments('id')->index();

            $table->string('motor_no')->unique();
            $table->string('merk');
            $table->string('type');
            $table->string('post_name');
            $table->string('post_price');
            $table->string('fitur');
            $table->string('stnk_address');
            $table->enum('condition', ['SECOND', 'NEW']);
            $table->string('picture');
            $table->text('description');
            $table->enum('status', ['READY', 'SOLD']);
            $table->enum('cash_method', ['CASH', 'CREDIT']);

            $table->integer('supplier_no')->nullable();
            $table->foreign('supplier_no')->references('id')->on('supplier');

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
        Schema::drop('motors');
    }
}
