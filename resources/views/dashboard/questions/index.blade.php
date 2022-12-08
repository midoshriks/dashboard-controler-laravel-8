@extends('layouts.dashboard.app')


@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            {{-- @mido_shriks show errors --}}
            @include('partials._errors')
            <div class="page-header d-print-none">
                <div class="row">
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
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ display('Data questions tables') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-large">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                {{ display('Create new questions') }}
                            </a>
                            {{-- @mido_shriks --}}
                            @include('dashboard.questions.create')
                            {{-- @mido_shriks --}}
                            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                data-bs-target="#modal-large">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                            </a>
                            {{-- mido_hsriks btn export --}}
                            <span class="d-sm-inline">
                                <a href="{{ route('dashboard.questions.export') }}" class="btn btn-white">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-database-export" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                            <path
                                                d="M4 6v6c0 1.657 3.582 3 8 3a19.84 19.84 0 0 0 3.302 -.267m4.698 -2.733v-6">
                                            </path>
                                            <path
                                                d="M4 12v6c0 1.599 3.335 2.905 7.538 2.995m8.462 -6.995v-2m-6 7h7m-3 -3l3 3l-3 3">
                                            </path>
                                        </svg>
                                    </span>
                                    {{ 'download file' }}
                                </a>
                                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-success">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                            <polyline points="7 9 12 4 17 9"></polyline>
                                            <line x1="12" y1="4" x2="12" y2="16"></line>
                                        </svg>
                                    </span>
                                    {{ 'uplaode file' }}
                                </a>
                                {{-- ==== --}}
                                <div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <div class="modal-status bg-success"></div>
                                            <div class="modal-body text-center py-4">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon mb-2 text-green icon-lg" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <circle cx="12" cy="12" r="9" />
                                                    <path d="M9 12l2 2l4 -4" />
                                                </svg>
                                            </div>
                                            <form action="{{ route('dashboard.questions.import') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <div class="form-label">File xsls</div>
                                                        <input type="file" name="file" value="1"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="w-100">
                                                        <div class="row">
                                                            <div class="col"><button type="submit" href="#"
                                                                    class="btn btn-success w-100" data-bs-dismiss="modal">
                                                                    {{ display('uploade file') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                        {{-- ==== --}}
                        </span>
                    </div>
                    <div class="btn-list">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="col-12">
                            <form action="{{ route('dashboard.questions.delets') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ display('checked') }}</th>
                                                <th>{{ display('name') }}</th>
                                                <th>{{ display('type') }}</th>
                                                <th>{{ display('level') }}</th>
                                                <th>{{ display('answer 1') }}</th>
                                                <th>{{ display('answer 2') }}</th>
                                                <th>{{ display('answer 3') }}</th>
                                                <th>{{ display('answer 4') }}</th>
                                                <th>{{ display('action') }}</th>
                                                {{-- <th class="w-1"></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($questions as $index => $question)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <input class="form-check-input" name="ids[{{ $question->id }}]"
                                                            type="checkbox" value="{{ $question->id }}">
                                                    </td>
                                                    <td>{{ $question->name }}</td>
                                                    <td>{{ display($question->type->name) }}</td>
                                                    <td>{{ display($question->level->name) }}</td>
                                                    @foreach ($question->answers as $answer)
                                                        {{-- @dd($answer) --}}
                                                        <td>
                                                            <div class="datagrid-item">
                                                                <div class="datagrid-content">
                                                                    @if ($answer->correct == 1)
                                                                        <span
                                                                            class="status status-green">{{ $answer->answer }}</span>
                                                                    @else
                                                                        <span
                                                                            class="status status-red">{{ $answer->answer }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            {{-- {{$answer->correct == 1 ? "style=background:green;" : ''}}>{{ $answer->answer }} --}}
                                                        </td>
                                                    @endforeach
                                                    <td>
                                                        <div class="col-auto">
                                                            <div class="dropdown">
                                                                <a href="#" class="btn-action"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <circle cx="12" cy="12"
                                                                            r="1" />
                                                                        <circle cx="12" cy="19"
                                                                            r="1" />
                                                                        <circle cx="12" cy="5"
                                                                            r="1" />
                                                                    </svg>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a href="{{ route('dashboard.questions.edit', $question->id) }}"
                                                                        class="dropdown-item">Edit</a>

                                                                    <a href="javascript:;"
                                                                        class="dropdown-item text-danger btn-delet"
                                                                        data-form-id="question-delete-{{ $question->id }}"
                                                                        data-name-item="{{ @$question->name }}">
                                                                        {{ display('Delete') }}
                                                                    </a>

                                                                    <form id="question-delete-{{ $question->id }}"
                                                                        action="{{ route('dashboard.questions.destroy', $question->id) }}"
                                                                        method="POST" style="display: inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        <div class="card-footer text-end">
                                            <button type="submit"
                                                class="btn btn-red">{{ display('Make deletes quetions') }}</button>
                                        </div>
                                    </table>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
