<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UserTableSeeder::class);
        \App\User::create([
            'name' => 'saiful admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'admin'
        ]);

       \App\User::create([
            'name' => 'saiful user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'user'
        ]);
    }
}
