<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // @mido_shriks function seeder create question & answers
        $questions = [
            'haed' => 'test question by seeder ?',
            'easy' => 'how make question by seeder ?',
            'low' => 'i cant make question by seeder ?',
        ];

        foreach ($questions as $key => $value) {
            # code...
            $question = Question::create([
                'name' => $value,
                'type_question' => $key,
                'level_id' => 1,
            ]);

            $answers = [
                'true'  =>  '1',
                'false' =>  '0',
                'yes'   =>  '0',
                'no'    =>  '0',
            ];

            foreach ($answers as $key => $value) {
                # code...
                $answer = Answer::create([
                    'answer' => $key,
                    'question_id' => $question->id,
                    'correct' => $value,
                ]);
            }
        }


    }
}
