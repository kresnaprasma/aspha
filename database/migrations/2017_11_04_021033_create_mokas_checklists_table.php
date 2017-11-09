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

            $table->boolean('mesin');
            $table->boolean('karburator');
            $table->boolean('tutup_oli');
            $table->boolean('kabel_busi');
            $table->boolean('knalpot');
            $table->boolean('standar');
            $table->boolean('kickstater');
            $table->boolean('pijakan_rem');
            $table->boolean('pijakan_perseneleng');
            $table->boolean('footstep_depan');
            $table->boolean('footstep_belakang');
            $table->boolean('rantai');
            $table->boolean('tutup_rantai');
            $table->boolean('swingarm');
            $table->boolean('gear_belakang');
            $table->boolean('rem_depan');
            $table->boolean('rem_belakang');
            $table->boolean('shock_depan');
            $table->boolean('shock_belakang');
            $table->boolean('velg_depan');
            $table->boolean('velg_belakang');
            $table->boolean('tanki_bensin');
            $table->boolean('cakram_rem');
            $table->boolean('tutup_tanki_bensin');
            $table->boolean('kunci_kontak');
            $table->boolean('speedo_meter');
            $table->boolean('riting_depan');
            $table->boolean('riting_belakang');
            $table->boolean('lampu_depan');
            $table->boolean('lampu_belakang');
            $table->boolean('stang');
            $table->boolean('spion');
            $table->boolean('slebor_depan');
            $table->boolean('slebor_belakang');
            $table->boolean('fairing');
            $table->boolean('front_guard_sayap');
            $table->boolean('body');
            $table->boolean('stripbody');
            $table->boolean('stnk');
            $table->boolean('toolkit');
            $table->boolean('filter_udara');
            $table->boolean('pegangan_belakang');
            $table->boolean('peredam_gas');
            $table->boolean('klakson');
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
