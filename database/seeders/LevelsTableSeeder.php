<?php

namespace Database\Seeders;

use App\Models\level;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            '100' => 'one',
            '200' => 'two',
            '300' => 'three',
            '400' => 'for',
        ];

        foreach ($levels as $key => $level) {
            # code...
            $levels = level::create([
                'name' => $level,
                'rewards' => $key,
            ]);
        }
    }
}
