<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMokasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mokas', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('mokas_no')->unique();
            $table->string('merk_id');
            $table->string('type_id');
            $table->double('purchase_price');
            $table->double('selling_price');
            $table->double('discount');
            $table->string('stnk');
            $table->string('bpkb');
            $table->string('machine_number');
            $table->string('chassis_number');
            $table->string('plat');
            $table->string('manufacture_year');
            $table->string('kilometers');
            $table->date('stnk_due_date');
            $table->date('period_tax');
            $table->text('note');

            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->boolean('cek_ok');
            $table->string('sales_id');
            $table->string('user_id');
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
        Schema::dropIfExists('mokas');
    }
}
