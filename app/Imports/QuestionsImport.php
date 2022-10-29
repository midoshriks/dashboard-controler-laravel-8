<?php

namespace App\Imports;

use App\Models\level;
use App\Models\Answer;
use App\Models\Question;
use App\Models\type;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;


class QuestionsImport implements
    ToCollection,
    WithHeadingRow
{
    // /**
    //  * @param array $row
    //  *
    //  * @return \Illuminate\Database\Eloquent\Model|null
    //  */
    public function collection(Collection $rows)
    {
        // @mido_shriks validator excel
        validator::make($rows->toArray(), [
            '*.type' => 'required',
            '*.level' => 'required',

            '*.question' => 'required|min:10|unique:questions,name',
            // '*.answer_'.$i => 'required|min:10|unique:answers,answer',
            '*.correct' => 'required',
        ])->validate();

        foreach ($rows as $index => $row) {
            $type = type::where('name', $row['type'])->first();
            $level = level::where('name', $row['level'])->first();

            if (!$type) {
                $type = type::create([
                    'model' => 'question',
                    'name' => $row['type'],
                ]);
            }

            if (!$level) {
                $level = level::create([
                    'name' => $row['level'],
                    'rewards' => '100',
                ]);
            }


            # code...
            $question = Question::create([
                'name' => $row['question'],
                'type_id' => $type->id,
                'level_id' => $level->id,
            ]);

            for ($i = 1; $i <= 4; $i++) {
                Answer::create([
                    'answer' => $row["answer_$i"],
                    'question_id' => $question->id,
                    'correct' => ($row['correct'] == $i) ? 1 : 0,
                ]);
            }
        }
    }
}
