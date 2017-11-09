<?php

use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon\Carbon::now();

        App\Branch::insert([
        	['name'=>'ASPHA KENDAL', 'email'=>'kendal@aspha.co.id'],
            ['name'=>'ASPHA BATANG', 'email'=>'batang@aspha.co.id'],
            ['name'=>'ASPHA PEMALANG', 'email'=>'pemalang@aspha.co.id']
        ]);

        App\CreditType::insert([
            ['name'=>'bulanan'],
            ['name'=>'musiman']
        ]);
    }
}
