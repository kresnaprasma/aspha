<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCusomterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('customer_no')->unique();
            $table->string('name');
            $table->text('address');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->boolean('active')->default(1);
            
            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches');
            
            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('identity_number')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->integer('postalcode')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('kk_number')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
