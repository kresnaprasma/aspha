<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon\Carbon::now();

        App\Bank::insert([
        	['name'=>'Bank Rakyat Indonesia', 'alias'=>'BRI', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Negara Indonesia', 'alias'=>'BNI', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Mandiri', 'alias'=>'Mandiri', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Tabungan Negara', 'alias'=>'BTN', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Central Asia', 'alias'=>'BRI', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Bukopin', 'alias'=>'Bukopin', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Danamon', 'alias'=>'Danamon', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Mega', 'alias'=>'Mega', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Mayapada', 'alias'=>'Mayapada', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Panin', 'alias'=>'Panin', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank CIMB Niaga', 'alias'=>'CIMB Niaga', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Maybank', 'alias'=>'Maybank', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Permata', 'alias'=>'Permata', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank UOB Indonesia', 'alias'=>'UOB', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Muamalat', 'alias'=>'Muamalat', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bank Jateng', 'alias'=>'Bank Jateng', 'created_at'=>$now, 'updated_at'=>$now],
        ]);
    }
}
