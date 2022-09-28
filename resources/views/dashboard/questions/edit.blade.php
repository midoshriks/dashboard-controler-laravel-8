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
                        {{ display('Overview') }}
                    </div>
                    <h2 class="page-title">
                        {{ display('Dashboard') }} \ {{ display('question') }} \ {{ display('edit') }} \
                        {{ $question->name }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    {{-- Sizebox container html --}}
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="modal-content">
                    <div class="col-md-4">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ display('edit product : ') }}
                                {{ $question->name }} </h5>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="modal-body align-self-center">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-right: 5px;">{{ display('form edit question ') }}
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                    </svg>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-question-mark" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
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
                                            <div class="col-sm-6 m-1">
                                                <label class="form-label required">{{ display('type question') }}</label>
                                                <div>
                                                    <select class="form-select" name="type_question">
                                                        <option value="">chooes</option>
                                                        <option {{$question->type_question == 'hard' ? 'selected' : ''}} value="hard">{{ display('hard') }}</option>
                                                        <option {{$question->type_question == 'easy' ? 'selected' : ''}} value="easy">{{ display('easy') }}</option>
                                                        <option {{$question->type_question == 'madem'?'selected' : '' }} value="madem">{{ display('madem') }}</option>
                                                        <option {{$question->type_question == 'low' ? 'selected' : ''}} value="low">{{ display('low') }}</option>
                                                    </select>
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
    </div>
@endsection
