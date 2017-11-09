<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceSalesHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_sales_histories', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('pricesaleshistory_no')->unique();

            $table->string('merk_id');
            $table->string('type_id');

            $table->double('discount');
            $table->double('price_sale');
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
        Schema::dropIfExists('price_sales_histories');
    }
}