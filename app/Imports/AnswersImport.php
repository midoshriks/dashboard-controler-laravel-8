<?php

namespace App\Imports;

use App\Models\Answer;
use Maatwebsite\Excel\Concerns\ToModel;

class AnswersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Answer([
            'answer' => $row[0],
            'question_id' => $row[1],
            'correct' => $row[2],
        ]);
    }
}
