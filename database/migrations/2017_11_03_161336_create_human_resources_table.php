<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHumanResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('employee_departments', function(Blueprint $table){
            $table->string('id')->index();
            $table->primary('id');
            $table->string('department_no')->unique();
            $table->string('name');
            $table->timestamps(); 
        });

        Schema::create('employee_positions', function(Blueprint $table){
            $table->string('id',32)->index();
            $table->primary('id');
            $table->string('position_no')->unique();
            $table->string('name');
            $table->string('department_no');
            $table->foreign('department_no')->references('department_no')->on('employee_departments');
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->string('id',32)->index();
            $table->primary('id');
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('alias')->nullable();
            $table->string('email')->unique();
            $table->string('facebook_account')->nullable();
            $table->string('instagram_account')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('province')->nullable();
            $table->date('birthday')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('phone')->nullable();
            $table->string('marrital')->nullable();
            $table->enum('blood_type',['A', 'AB','B','O']);
            $table->string('zipcode')->nullable();
            $table->enum('gender',['male', 'female']);
            $table->string('bank_account')->nullable();
            $table->string('npwp')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_name')->nullable();
            $table->enum('job_status',['Active', 'Skorsing', 'Move', 'Retired', 'Fired']);
            $table->date('job_start')->nullable();
            $table->date('job_end')->nullable();

            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branches');

            $table->string('department_no')->nullable();
            $table->foreign('department_no')->references('department_no')->on('employee_departments');

            $table->string('position_no')->nullable();
            $table->foreign('position_no')->references('position_no')->on('employee_positions');

            $table->string('grade')->nullable();
            $table->string('mother_name')->nullable();
            
            $table->boolean('is_user')->default(false);
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
        Schema::dropIfExists('employees');
        Schema::dropIfExists('employee_positions');
        Schema::dropIfExists('employee_departments');
    }
}
