<?php

namespace App\Exports;

use App\Models\Answer;
use App\Models\level;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AnswersExport implements FromView,

ShouldAutoSize,
WithHeadings
// FromCollection,
// WithMapping,
{
    use Exportable;
    // @mido_shriks function {
    //     ShouldAutoSize لمسافة الأكسل
    //     WithMapping لأضافة دتا من جدولان فى شيت واجد
    // }

    /**
     * @return \Illuminate\Support\Collection
     */


        public function view(): ViewView
        {
            return view('dashboard.questions.export',[
                'questions' => Question::all(),
                'types' => Type::all(),
                'levels' => level::all(),
                'answers' => Answer::all(),
            ]);
        }

    public function headings(): array
    {
        return ["#","questios", "type", "level", "answer 1", "answer 2", "answer 3", "answer 4", "correct"];
    }

    // // @mido_shriks
    // public function collection()
    // {
    //     return Question::with('level','type','answers')->get();
    // }

    // public function map($rows): array
    // {
    //     // var_dump($row->name);
    //     // var_dump($row->type->name);
    //     // var_dump($row->level->name);
    //     // var_dump($row->answers->answer);
    //     // exit;

    //     # code...
    //     foreach ($rows as $key => $row) {
    //         # code...
    //         // $row->id;
    //         // dd($row->id);
    //     }
    //     return [
    //         dd($rows->type->name)
    //     ];

    //     // [
    //     //         $row->id,
    //     //         $row->name,
    //     //         $row->type->name,
    //     //         $row->level->name,
    //     //         // $row->answers->answer,
    //     //         // $row->answers->correct,
    //     //     ];
    // }
}
