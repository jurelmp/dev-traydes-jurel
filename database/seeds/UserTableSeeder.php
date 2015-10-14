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
        DB::table('users')->insert([
            'first_name' => 'Jurel',
            'last_name' => 'Patoc',
            'email' => 'patocjurel@gmail.com',
            'password' => bcrypt('password1'),
        ]);
    }
}
