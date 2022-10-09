<?php

namespace App\Exports;

use App\Models\level;
use App\Models\Type;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\View\View as ViewView;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class QuestionsExport implements
    // FromCollection,
    FromView,
    ShouldAutoSize,
    WithHeadings
{
    public function headings(): array
    {
        return ["#", "questios", "type", "level", "answer 1", "answer 2", "answer 3", "answer 4", "correct"];
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): ViewView
    {
        return view('dashboard.questions.export', [
            'questions' => Question::all(),
            'types' => Type::all(),
            'levels' => level::all(),
            'answers' => Answer::all(),
        ]);
    }


    // public function collection()
    // {
    //     return Question::all();
    // }
}
