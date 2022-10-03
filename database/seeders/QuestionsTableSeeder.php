<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // @mido_shriks seeder create question end anwsers
        $questions = [
            'hard' => 'whats your name',
            'easy' => 'where do you come from',
            'madem' => 'How old are you',
            'low' => 'How gennder are you',
        ];

        $answers = [
            'true'  =>  '1',
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
                'level_id' => $level_id++,
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
