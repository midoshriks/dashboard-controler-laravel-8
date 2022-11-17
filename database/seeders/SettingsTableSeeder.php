<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['model' => 'question', 'key' => 'time', 'value' => '60' ],
            ['model' => 'question', 'key' => 'rewards', 'value' => '2' ],
            ['model' => 'users', 'key' => 'time', 'value' => '60' ],
            ['model' => 'users', 'key' => 'user', 'value' => '2' ],
            ['model' => 'helpers', 'key' => 'time', 'value' => '60' ],
            ['model' => 'helpers', 'key' => 'helpers', 'value' => '2' ],
            ['model' => 'coins', 'key' => 'time', 'value' => '60' ],
            ['model' => 'coins', 'key' => 'coins', 'value' => '2' ],
        ];

        foreach ($settings as $key => $setting) {
            # code...
            Setting::create($setting);
        }
    }
}
