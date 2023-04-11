<?php

namespace App\Exports;

use App\Models\type;
use App\Models\level;
use App\Models\Answer;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

use Illuminate\Contracts\View\View as ViewView;

class QuestionsDemoExport implements
    // FromCollection,
    // FromView,
    ShouldAutoSize,
    WithHeadings
{
    // public function headings(): array
    // {
    //     return ["question", "type", "level", "answer 1", "answer 2", "answer 3", "answer 4", "correct"];
    // }

    public function headings(): array
    {
        return [
            ["question", "type", "level", "answer_1", "answer_2", "answer_3", "answer_4", "correct", "type_status"],
            ['ما هى عملة مصر؟', 'Easy', 'one', 'دولار', 'ريال', 'جنيه', 'درهم', '3', 'basic'],
            ['ما هى عملة سعودية ؟', 'Easy', 'one', 'دولار', 'ريال', 'جنيه', 'درهم', '2', 'basic'],
            ['ما هى عملة امريكا ؟', 'Easy', 'one', 'دولار', 'ريال', 'جنيه', 'درهم', '1', 'additional'],
            ['ما هى عملة لبنان ؟', 'Easy', 'one', 'دولار', 'ريال', 'جنيه', 'ليرة', '4', 'additional'],
        ];
    }


    // /**
    //  * @return \Illuminate\Support\Collection
    //  */

    // public function map($rows): array
    // {
    //     dd($rows);
    // }
}
