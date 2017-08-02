<?php

use Illuminate\Database\Seeder;

class MerksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon\Carbon::now();

        App\Merk::insert([
        	['name'=>'Honda', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Yamaha', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Kawasaki', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Suzuki', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'KTM', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Piaggio', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Bajaj', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'VIAR', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'TVS', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Ducati', 'created_at'=>$now, 'updated_at'=>$now],
        	['name'=>'Harley-Davidson', 'created_at'=>$now, 'updated_at'=>$now],
        ]);
    }
}
