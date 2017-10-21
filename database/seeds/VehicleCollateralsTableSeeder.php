<?php

use Illuminate\Database\Seeder;

class VehicleCollateralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon\Carbon::now();

        App\Type::insert([
        	['id' => 'P55', 'name' => 'ABSOLUTE REVO', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'P56', 'name' => 'ABSOLUTE REVO CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'P57', 'name' => 'ABSOLUTE REVO DX', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0CM', 'name' => 'BEAT CBS FI', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'N83', 'name' => 'BEAT CUSTIC', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'V47', 'name' => 'BEAT CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0CV', 'name' => 'BEAT CW FI', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10D', 'name' => 'BEAT CW PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '12S', 'name' => 'BEAT FI CBS ESP PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10F', 'name' => 'BEAT FI CBS ISS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10G', 'name' => 'BEAT FI CBS ISS PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '12R', 'name' => 'BEAT FI CW ESP PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '12Q', 'name' => 'BEAT FI POP CBS ESP', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10C', 'name' => 'BEAT FI POP CBS ISS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10B', 'name' => 'BEAT FI POP CBS MMC', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10E', 'name' => 'BEAT FI POP CBS PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10A', 'name' => 'BEAT FI POP CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '12P', 'name' => 'BEAT FI POP CW ESP', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '12T', 'name' => 'BEAT FI POP CW ESP', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0ZY', 'name' => 'BEAT FI SPORTY CBS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0ZX', 'name' => 'BEAT FI SPORTY CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0ZZ', 'name' => 'BEAT FI SPORTY CBS ISS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '12O', 'name' => 'BEAT FI SPORTY CW ESP', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10H', 'name' => 'BEAT FI SPORTY CW PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10I', 'name' => 'BEAT FI SPORTY CBS PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'N82', 'name' => 'BEAT FUNKY', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'T88', 'name' => 'BEAT GROOVY & BOLD', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0CN', 'name' => 'BEAT SPOKE FI', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'S73', 'name' => 'BEAT STD', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '10J', 'name' => 'BEAT FI SPORTY CBS ISS PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'P38', 'name' => 'BLADE CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'Q96', 'name' => 'BLADE REPSOL', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'P39', 'name' => 'BLADE SE CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0FP', 'name' => 'CB 150 R', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0JH', 'name' => 'CB 150 R PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0MG', 'name' => 'CB 150 R STREETFIRE', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '1KI', 'name' => 'CB 150 R MMC SE', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '698', 'name' => 'CBR 150 BUILTUP', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0UN', 'name' => 'CBR 150 R', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0ME', 'name' => 'CBR 150 RC', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0MF', 'name' => 'CBR 150 RCR', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '03A', 'name' => 'CBR 150 REPSOL', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'N40', 'name' => 'CS 1', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '019', 'name' => 'MEGA PRO', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'B62', 'name' => 'MEGA PRO CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '322', 'name' => 'MEGA PRO NEOTECH', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'C02', 'name' => 'MEGA PRO NEOTECH CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0D9', 'name' => 'NEW VARIO CBS FI ADVT', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0WR', 'name' => 'NEW BEAT FU CW + SPORTY', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0HR', 'name' => 'NEW BEAT FI CW PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0I3', 'name' => 'NEW BEAT FI SP PLUS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '1YE', 'name' => 'NEW BEAT STREET ESP', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0TN', 'name' => 'NEW BLADE 125 FI SRE', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '\24', 'name' => 'NEW BLADE CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0TM', 'name' => 'NEW BLADE R 125 FI', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '\04', 'name' => 'NEW BLADE REPSOL', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'G89', 'name' => 'NEW MEGA PRO CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0RK', 'name' => 'NEW MEGA PRO CW FI', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'G88', 'name' => 'NEW MEGA PRO STD', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'Y96', 'name' => 'NEW REVO CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0QF', 'name' => 'NEW REVO FI CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0QE', 'name' => 'NEW REVO FI FIT', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0QG', 'name' => 'NEW REVO FI SW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'Y95', 'name' => 'NEW REVO SP', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0CP', 'name' => 'NEW SCOOPY RETRO', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'F80', 'name' => 'NEW SUPRA FIT', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '120', 'name' => 'NEW SUPRA FIT CAKRAM', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'G58', 'name' => 'NEW SUPRA FIT CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'I10', 'name' => 'NEW SUPRA FIT S', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'K63', 'name' => 'NEW SUPRA X 125 CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'Z49', 'name' => 'NEW SUPRA X 125 D3', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'K62', 'name' => 'NEW SUPRA X 125 DB', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'Z48', 'name' => 'NEW SUPRA X 125 TR3', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'K66', 'name' => 'NEW SUPRA X 125 PG MFI', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'V72', 'name' => 'NEW VARIO CW', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '0TH', 'name' => 'NEW VARIO CW FI', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'V73', 'name' => 'NEW VARIO CW TECHNO', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => 'V74', 'name' => 'NEW VARIO CW TECHNO CBS', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],
        	['id' => '02Z', 'name' => 'NEW VARIO CW TECHNO FI', 'merk_id' => '1', 'created_at'=> $now, 'updated_at' => $now],

			['id' => '', 'name' => '', 'merk_id' => '1', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}