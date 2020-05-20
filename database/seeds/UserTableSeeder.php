<?php

use Illuminate\Database\Seeder;
use App\User;
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
        User::create([
            'name' => 'saiful admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'saiful user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'user'
        ]);
    }
}
