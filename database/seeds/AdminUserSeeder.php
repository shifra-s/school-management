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
        \DB::table('administrators')->insert(['name' => 'Shifra', 'role' => '1', 'image' => 'uploads/shifra.jpg', 'phone' => '8888888888', 'email' => 'shifra@jb.com', 'password' => bcrypt('123456')])
;    }
}
