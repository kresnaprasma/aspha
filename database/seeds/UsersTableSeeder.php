<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon\Carbon::now();

        App\Role::insert([
            ['name'=>'super', 'created_at'=> $now, 'updated_at'=> $now],
            ['name'=>'staff admin', 'created_at'=> $now, 'updated_at'=> $now],
        ]);

        App\Permission::insert([
        	['name' => 'user.open','created_at' => $now, 'updated_at' => $now],
            ['name' => 'user.create','created_at' => $now, 'updated_at' => $now],
            ['name' => 'user.edit','created_at' => $now, 'updated_at' => $now],
            ['name' => 'user.delete','created_at' => $now, 'updated_at' => $now],
            ['name' => 'user.super','created_at' => $now, 'updated_at' => $now],

            ['name' => 'role.open','created_at' => $now, 'updated_at' => $now],
            ['name' => 'role.create','created_at' => $now, 'updated_at' => $now],
            ['name' => 'role.edit','created_at' => $now, 'updated_at' => $now],
            ['name' => 'role.delete','created_at' => $now, 'updated_at' => $now],
            ['name' => 'role.super','created_at' => $now, 'updated_at' => $now],

            ['name' => 'permission.open','created_at' => $now, 'updated_at' => $now],
            ['name' => 'permission.create','created_at' => $now, 'updated_at' => $now],
            ['name' => 'permission.edit','created_at' => $now, 'updated_at' => $now],
            ['name' => 'permission.delete','created_at' => $now, 'updated_at' => $now],
            ['name' => 'permission.super','created_at' => $now, 'updated_at' => $now],
        ]);

        $super = App\User::create([
                'name'=>'PRAMANDA TIRTA MULYA',
                'email'=>'tmulya@gmail.com',
                'password'=>bcrypt('1234567890'),
        ]);

        $super->assignRole('super');

        $super = App\User::create([
                'name' => 'KRESNA PRASMADEWA',
                'email' => 'kresnaprasmadewa@gmail.com',
                'password' => bcrypt('12341234'),
        ]);

        $super->assignRole('super');
    }
}
