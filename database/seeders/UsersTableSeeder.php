<?php

namespace Database\Seeders;

use random;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserLevel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Intervention\Image\Facades\Image;

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

        $levelids = [1, 2, 3, 4];
        $user->levels()->attach($levelids);


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
        $levelids = [1, 2, 3, 4];
        $user->levels()->attach($levelids);



        // users gaming

        $user = User::create([
            'first_name' => 'gaming_1',
            'last_name' => 'gaming_1',
            'email' => 'gaming@gmail.com',
            'phone' => '01200300090',
            'dob_date' => Carbon::parse('2022-10-20'),
            'gender' => 'male',
            'country_id' => '2',
            'type_id' => '2',
            'code_membership' => Str::random(2) . mt_rand(1000000, 10000000),
            'role_permissions' => 'gaming',
            'password' => bcrypt('12345678'),
        ]);

        $levelids = [1, 2];
        $user->levels()->attach($levelids);
    } // end run
}// end seeder
