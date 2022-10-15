<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
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
        $user = User::create([
            'first_name' => 'mido',
            'last_name' => 'shriks',
            'email' => 'midoshriks36@gmail.com',
            'phone' => '01207200622',
            'dob_date' => Carbon::parse('2022-09-20'),
            'gender' => 'male',
            'country_id' => '1',
            'type_id' => '1',
            'code_membership' => '001',
            'role_permissions' => 'super_admin',
            'password' => bcrypt('12345678'),
        ]);

        $user->attachRole('super_admin');

        $user = User::create([
            'first_name' => 'mo2men',
            'last_name' => 'd',
            'email' => 'mo2men@gmail.com',
            'phone' => '01200300002',
            'dob_date' => Carbon::parse('2022-09-20'),
            'gender' => 'male',
            'country_id' => '1',
            'type_id' => '1',
            'code_membership' => '002',
            'role_permissions' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        $user->attachRole('admin');

    }// end run
}// end seeder
