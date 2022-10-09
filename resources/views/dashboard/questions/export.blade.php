<table class="table table-vcenter card-table text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ display('name') }}</th>
            <th>{{ display('type') }}</th>
            <th>{{ display('level') }}</th>
            <th>{{ display('answer 1') }}</th>
            <th>{{ display('answer 2') }}</th>
            <th>{{ display('answer 3') }}</th>
            <th>{{ display('answer 4') }}</th>
            <th>{{ display('correct') }}</th>
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
                        @if ($answer->correct == 1)
                            {{ $answer->answer }}
                        @else
                            {{ $answer->answer }}
                        @endif
                    </td>
                @endforeach
                {{-- @mido_shriks get number correct data in excel --}}
                <td>
                    @foreach ($question->answers as $index => $answer)
                        @for ($i = 1; $i < 5; $i++)
                            {{-- @dd($answer->correct == $i ? $index+1 : '') --}}
                            {{ $answer->correct == $i ? $index + 1 : '' }}
                        @endfor
                    @endforeach
                </td>
                {{-- @mido_shriks get number correct data in excel --}}
            </tr>
        @endforeach
    </tbody>
</table>
