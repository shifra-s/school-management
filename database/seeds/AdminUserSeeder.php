<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('administrators')->insert(['name' => 'Admin', 'role' => '1', 'image' => 'uploads/2FiOLuKHQg54.jpeg', 'phone' => '8888888888', 'email' => 'owner@owner.com', 'password' => bcrypt('123456')])
;    }
}
