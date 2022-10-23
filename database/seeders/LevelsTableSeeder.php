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

        // create 5 questions to level one test

        $questions = [
            'hard' => 'whats your name level 1',
            'easy' => 'where do you come from level 1',
            'madem' => 'How old are you level 1',
            'low' => 'How gennder are you level 1',
        ];

        $answers = [
            'level one'  =>  '1',
            'false' =>  '0',
            'yes'   =>  '0',
            'no'    =>  '0',
        ];

        $type_id = 1;
        $level_id = 1;

        foreach ($questions as $key => $value) {
            # code...
            $question = Question::create([
                'name' => $value,
                'type_id' => $type_id++,
                'level_id' => $level_id,
            ]);

            foreach ($answers as $key => $value) {
                # code...
                $answer = Answer::create([
                    'answer' => $key,
                    'question_id' => $question->id,
                    'correct' => $value == 1,
                ]);
            }
        }
    }
}
