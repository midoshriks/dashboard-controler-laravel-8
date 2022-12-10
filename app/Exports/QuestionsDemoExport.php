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
    //     return ["questios", "type", "level", "answer 1", "answer 2", "answer 3", "answer 4", "correct"];
    // }

    public function headings(): array
    {
        return [
            ["questios", "type", "level", "answer_1", "answer_2", "answer_3", "answer_4", "correct"],
            ['ما هى عملة مصر؟', 'Easy', 'one', 'دولار', 'ريال', 'جنيه', 'درهم', '3'],
            ['ما هى عملة مصر؟', 'Easy', 'one', 'دولار', 'ريال', 'جنيه', 'درهم', '3'],
            ['ما هى عملة مصر؟', 'Easy', 'one', 'دولار', 'ريال', 'جنيه', 'درهم', '3'],
            ['ما هى عملة مصر؟', 'Easy', 'one', 'دولار', 'ريال', 'جنيه', 'درهم', '3'],
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
