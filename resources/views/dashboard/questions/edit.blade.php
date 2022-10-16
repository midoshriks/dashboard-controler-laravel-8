@extends('layouts.dashboard.app')

@section('content')
    {{-- @mido_shriks --}}
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ display('Smart bucks') }}
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ display('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.questions.index') }}">{{ display($title) }}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.questions.edit', $question->id) }}">{{ display($question->name) }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ display('edit') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- Sizebox container html --}}
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ display('edit Question : ') }}
                            {{ $question->name }} </h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="modal-body align-self-center">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-right: 5px;">{{ display('form edit question ') }}
                                </h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                </svg>
                                <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-question-mark"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4">
                                    </path>
                                    <line x1="12" y1="19" x2="12" y2="19.01"></line>
                                </svg>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dashboard.questions.update', $question->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="form-group mb-3 col-md-12 d-flex">
                                        <div class="col-sm-6 m-1">
                                            <label class="form-label required">{{ display('question name') }}</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $question->name }}" placeholder="Enter question ..?">
                                            </div>
                                        </div>
                                        {{-- @dd($question->type_id) --}}

                                        <div class="col-sm-6 m-1">
                                            <label class="form-label required">{{ display('type question') }}</label>
                                            <div>
                                                <select class="form-select" name="type_id">
                                                    <option value="">chooes</option>
                                                    @foreach ($types as $type)
                                                        <option {{ $type->id == $question->type_id ? 'selected' : '' }}
                                                            value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 col-md-12 d-flex">
                                        <div class="col-sm-6 m-1">
                                            <label class="form-label required">{{ display('question level') }}</label>
                                            <div class="">
                                                <select class="form-select" name="level_id">
                                                    <option value="">chooes</option>
                                                    @foreach ($levels as $level)
                                                        <option {{ $level->id == $question->level_id ? 'selected' : '' }}
                                                            value="{{ $level->id }}">{{ $level->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- @mido_shriks function get countr number answer --}}


                                    @foreach ($question->answers as $key=>$answer)
                                        <div class="form-group mb-3 col-md-12 d-flex">
                                            <div class="col-sm-12 m-1">
                                                <label
                                                    class="form-label required">{{ display('answer ' . $key+1) }}</label>
                                                <div>
                                                    <input type="text" class="form-control"
                                                        name="{{ 'answer_' . $key+1 }}"
                                                        value="{{ $answer->answer }}" placeholder="answer">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    {{-- @mido_shriks get correct and show select correct --}}
                                    <div class="form-group mb-3 col-md-12 d-flex">
                                        <div class="col-sm-12 m-1">
                                            <label class="form-label required">{{ display('correct') }}</label>
                                            <div class="">
                                                <select class="form-select" name="correct">
                                                    @foreach ($question->answers as $index => $answer)
                                                        <option {{ $answer->correct == 1 ? 'selected' : '' }}
                                                            value="{{ $index + 1 }}">{{ $index + 1 }}</option>
                                                    @endforeach
                                                </select>

                                                {{-- <select class="form-select" name="correct">
                                                    <option value="">chooes</option>
                                                    <option value="1"> 1 </option>
                                                    <option value="2"> 2 </option>
                                                    <option value="3"> 3</option>
                                                    <option value="4"> 4 </option>
                                                </select> --}}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-1 ">
                                        <div class="modal-footer mt-lg-5">
                                            <button type="submit" class="btn btn-primary"
                                                data-bs-dismiss="modal">{{ display('Update') }}</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
