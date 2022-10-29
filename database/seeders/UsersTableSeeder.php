<?php

namespace Database\Seeders;

use random;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserLevel;
use App\Models\Wallets;
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

        /// developer
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
        $user = Wallets::create([
            'user_id' => $user->id
        ]);

        $user = User::create([
            'first_name' => 'mo2men',
            'last_name' => 'elsyd',
            'email' => 'mom.enlsyd@gmail.com',
            'phone' => '01200300002',
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
        $user = Wallets::create([
            'user_id' => $user->id
        ]);

        /// developer


        /// onwers
        $user = User::create([
            'first_name' => 'Abd',
            'last_name' => 'Al-hameed',
            'email' => 'abdoalhameed@gmail.com',
            'phone' => '9705990765321',
            'dob_date' => Carbon::parse('2022-09-20'),
            'gender' => 'male',
            'country_id' => '1',
            'type_id' => '1',
            'code_membership' => Str::random(2) . mt_rand(1000000, 10000000),
            'role_permissions' => 'super_admin',
            'password' => bcrypt('12345678'),
        ]);

        $user->attachRole('super_admin');

        $levelids = [1, 2, 3, 4];
        $user->levels()->attach($levelids);
        $user = Wallets::create([
            'user_id' => $user->id
        ]);

        /// Admin
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'site',
            'email' => 'adminsite@gmail.com',
            'phone' => '0109898866',
            'dob_date' => Carbon::parse('2022-09-20'),
            'gender' => 'male',
            'country_id' => '1',
            'type_id' => '1',
            'code_membership' => Str::random(2) . mt_rand(1000000, 10000000),
            'role_permissions' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        $user->attachRole('admin');

        $levelids = [1, 2, 3, 4];
        $user->levels()->attach($levelids);
        $user = Wallets::create([
            'user_id' => $user->id
        ]);



        // users gaming
        for ($i = 0; $i < 5; $i++) {
            # code...
            $user = User::create([
                'first_name' => 'gaming_'.$i,
                'last_name' => 'gaming_'.$i,
                'email' => 'gaming_'.$i.'@gmail.com',
                'phone' => '01200300090'.$i,
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
            $user = Wallets::create([
                'user_id' => $user->id
            ]);
        }
    } // end run
}// end seeder
