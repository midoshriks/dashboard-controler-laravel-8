<?php

namespace Database\Seeders;

use App\Models\Helper;
use Illuminate\Database\Seeder;

class HelpersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $helpers = [
            'add time',
            'delete a question',
            'delete two answers',
            'call a friend',
        ];

        foreach ($helpers as $key => $value) {
            # code...
            $helper = Helper::create([
                'name' => $value
            ]);
        }
    }
}
