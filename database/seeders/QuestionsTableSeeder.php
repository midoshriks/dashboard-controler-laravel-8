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
            'hard'  => 'questins level level Is random',
            'easy'  => 'questins level level Is random',
            'madem' => 'questins level level Is random',
            'low'   => 'questins level level Is random',
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

        // create 5 questions to level one test

        $questions = [
            'hard'  => 'quetions by level one',
            'easy'  => 'quetions by level one',
            'madem' => 'quetions by level one',
            'low'   => 'quetions by level one',
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

        // create 5 questions to level two test

        $questions = [
            'hard'  => 'quetions by level two',
            'easy'  => 'quetions by level two',
            'madem' => 'quetions by level two',
            'low'   => 'quetions by level two',
        ];

        $answers = [
            'level two'  =>  '1',
            'false' =>  '0',
            'yes'   =>  '0',
            'no'    =>  '0',
        ];

        $type_id = 1;
        $level_id = 2;

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
        // create 5 questions to level 	Three test

        $questions = [
            'hard'  => 'quetions by level Three',
            'easy'  => 'quetions by level Three',
            'madem' => 'quetions by level Three',
            'low'   => 'quetions by level Three',
        ];

        $answers = [
            'level 	Three'  =>  '1',
            'false' =>  '0',
            'yes'   =>  '0',
            'no'    =>  '0',
        ];

        $type_id = 1;
        $level_id = 3;

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

        // create 5 questions to level 	for test

        $questions = [
            'hard'  => 'quetions by level for',
            'easy'  => 'quetions by level for',
            'madem' => 'quetions by level for',
            'low'   => 'quetions by level for',
        ];

        $answers = [
            'level 	for'  =>  '1',
            'false' =>  '0',
            'yes'   =>  '0',
            'no'    =>  '0',
        ];

        $type_id = 1;
        $level_id = 4;

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
    } // end of run
} // end
