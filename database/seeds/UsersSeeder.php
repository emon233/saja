<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'first_name' => 'Md. Sazid',
            'last_name' => 'Hossain',
            'mobile' => '01521441218',
            'email' => 'sazid140233@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
