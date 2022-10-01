<?php

namespace App\Exports;

use App\Models\Answer;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class AnswersExport implements FromCollection, ShouldAutoSize, WithMapping
{
    // @mido_shriks function {
    //     ShouldAutoSize لمسافة الأكسل
    //     WithMapping لأضافة دتا من جدولان فى شيت واجد
    // }

    /**
    * @return \Illuminate\Support\Collection
    */

    // @mido_shriks
    public function collection()
    {
        return Answer::with('dataexcel')->get();
    }

    public function map($row): array
    {
        return [
            $row->dataexcel->name,
            $row->dataexcel->type_question,
            $row->answer,
            $row->correct,
        ];
    }
}
