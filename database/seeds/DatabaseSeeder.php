<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MerksTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        $this->call(VehicleCollateralsTableSeeder::class);
    }
}
