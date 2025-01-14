<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name'=>'Anusara Punchihewa',
            'age'=>28,
            'telNo'=>'0712245217',
            'email'=>'anusara@gmail.com',
            'gender'=>'Male',
            'nic'=>'971446313V',
            'slmcNo'=>NULL,
            'role'=>'Admin',
            'password'=>Hash::make('anusara123')
        ]);
    }
}
