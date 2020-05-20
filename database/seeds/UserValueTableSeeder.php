<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'name' => 'saiful admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'admin'
        ]);
          DB::table('users')->insert([
            'name' => 'saiful users',
            'email' => 'users@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'user'
        ]);
           DB::table('tb_product')->insert([
            'name' => 'Lipstik Pink',
            'code' => Str::random(3),
            'price' => 12000000,
            'qty' => 4,
        ]);
    }
}
