<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_pictures', function (Blueprint $table) {
            $table->string('id',32)->index();
            $table->primary('id');
            $table->string('nip');
            $table->foreign('nip')->references('nip')->on('employees')->onDelete('cascade');
            $table->string('filename');
            $table->string('original_name');
            $table->string('filetype');
            $table->string('filesize');
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
        Schema::dropIfExists('employee_pictures');
    }
}
