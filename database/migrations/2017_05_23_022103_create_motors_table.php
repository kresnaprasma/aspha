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
            $table->string('fitur')->nullable();
            $table->string('stnk_address');
            $table->enum('condition', ['SECOND', 'NEW']);
            $table->text('description');
            $table->enum('status', ['READY', 'SOLD']);
            $table->enum('cash_method', ['CASH', 'CREDIT']);
        
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
