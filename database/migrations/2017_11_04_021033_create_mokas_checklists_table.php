<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMokasChecklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mokas_checklists', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('mokascheck_no');
            
            $table->string('mokas_no');
            $table->foreign('mokas_no')->references('mokas_no')->on('mokas');

            $table->boolean('mesin')->nullable();
            $table->boolean('karburator')->nullable();
            $table->boolean('tutup_oli')->nullable();
            $table->boolean('kabel_busi')->nullable();
            $table->boolean('knalpot')->nullable();
            $table->boolean('standar')->nullable();
            $table->boolean('kickstater')->nullable();
            $table->boolean('pijakan_rem')->nullable();
            $table->boolean('pijakan_perseneleng')->nullable();
            $table->boolean('footstep_depan')->nullable();
            $table->boolean('footstep_belakang')->nullable();
            $table->boolean('rantai')->nullable();
            $table->boolean('tutup_rantai')->nullable();
            $table->boolean('swingarm')->nullable();
            $table->boolean('gear_belakang')->nullable();
            $table->boolean('rem_depan')->nullable();
            $table->boolean('rem_belakang')->nullable();
            $table->boolean('shock_depan')->nullable();
            $table->boolean('shock_belakang')->nullable();
            $table->boolean('velg_depan')->nullable();
            $table->boolean('velg_belakang')->nullable();
            $table->boolean('tanki_bensin')->nullable();
            $table->boolean('cakram_rem')->nullable();
            $table->boolean('tutup_tanki_bensin')->nullable();
            $table->boolean('kunci_kontak')->nullable();
            $table->boolean('speedo_meter')->nullable();
            $table->boolean('riting_depan')->nullable();
            $table->boolean('riting_belakang')->nullable();
            $table->boolean('lampu_depan')->nullable();
            $table->boolean('lampu_belakang')->nullable();
            $table->boolean('stang')->nullable();
            $table->boolean('spion')->nullable();
            $table->boolean('slebor_depan')->nullable();
            $table->boolean('slebor_belakang')->nullable();
            $table->boolean('fairing')->nullable();
            $table->boolean('front_guard_sayap')->nullable();
            $table->boolean('body')->nullable();
            $table->boolean('stripbody')->nullable();
            $table->boolean('stnk')->nullable();
            $table->boolean('toolkit')->nullable();
            $table->boolean('filter_udara')->nullable();
            $table->boolean('pegangan_belakang')->nullable();
            $table->boolean('peredam_gas')->nullable();
            $table->boolean('klakson')->nullable();
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
        Schema::dropIfExists('mokas_checklists');
    }
}
