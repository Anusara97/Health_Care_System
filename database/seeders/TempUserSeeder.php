<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Hash;

class TempUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('temp_users')->insert([
            'name'=>'Kalum Perera',
            'age'=>34,
            'telNo'=>'0712485617',
            'email'=>'kalum@gmail.com',
            'gender'=>'Male',
            'nic'=>'911057313V',
            'slmcNo'=>10756,
            'role'=>'Doctor',
            'password'=>Hash::make('kalum123')
        ]);

        DB::table('temp_users')->insert([
            'name'=>'Asela Gamage',
            'age'=>30,
            'telNo'=>'0779205356',
            'email'=>'asela@gmail.com',
            'gender'=>'Male',
            'nic'=>'952697917V',
            'slmcNo'=>11296,
            'role'=>'Senior Pharmacist',
            'password'=>Hash::make('asela123')
        ]);

        DB::table('temp_users')->insert([
            'name'=>'Samanthi Arosha',
            'age'=>40,
            'telNo'=>'0776276536',
            'email'=>'samanthi@gmail.com',
            'gender'=>'Female',
            'nic'=>'852657598V',
            'slmcNo'=>12526,
            'role'=>'Junior Pharmacist',
            'password'=>Hash::make('samanthi123')
        ]);

        DB::table('temp_users')->insert([
            'name'=>'Sirisana Gamlath',
            'age'=>45,
            'telNo'=>'0416276536',
            'email'=>'sirisena@gmail.com',
            'gender'=>'Male',
            'nic'=>'802622750V',
            'slmcNo'=>NULL,
            'role'=>'Patient',
            'password'=>Hash::make('sirisena123')
        ]);

        DB::table('temp_users')->insert([
            'name'=>'Thilini Kaushalya',
            'age'=>20,
            'telNo'=>'0746204936',
            'email'=>'thilini@gmail.com',
            'gender'=>'Female',
            'nic'=>'20052657598V',
            'slmcNo'=>NULL,
            'role'=>'Patient',
            'password'=>Hash::make('thilini123')
        ]);
    }
}
