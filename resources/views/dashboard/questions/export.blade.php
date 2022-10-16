<table class="table table-vcenter card-table text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>question</th>
            <th>type</th>
            <th>level</th>
            <th>answer_1</th>
            <th>answer_2</th>
            <th>answer_3</th>
            <th>answer_4</th>
            <th>correct</th>
            <th class="w-1"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $index => $question)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $question->name }}</td>
                <td>{{ display($question->type->name) }}</td>
                <td>{{ display($question->level->name) }}</td>
                @foreach ($question->answers as $answer)
                    <td>
                        {{ $answer->answer }}
                    </td>
                @endforeach
                {{-- @mido_shriks get number correct data in excel --}}
                <td>
                    @foreach ($question->answers as $index => $answer)
                        {{ $answer->correct == 1 ? $index + 1 : '' }}
                    @endforeach
                </td>
                {{-- @mido_shriks get number correct data in excel --}}
            </tr>
        @endforeach
    </tbody>
</table>
