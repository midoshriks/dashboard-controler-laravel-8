<?php

namespace Database\Seeders;

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
        $questions = [
            'hard' => 'whats your name',
            'easy' => 'where do you come from',
            'madem' => 'How old are you',
            'low' => 'How gennder are you',
        ];

        foreach ($questions as $key => $value) {
            # code...
            $question = Question::create([
                'name' => $value,
                'type_question' => $key,
                'type_id' => '4',
                'level_id' => '1'
            ]);
        }
    }
}
