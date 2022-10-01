@extends('layouts.dashboard.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            {{-- @mido_shriks show errors --}}
            @include('partials._errors')

            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            {{ display('Overview') }}
                        </div>
                        <h2 class="page-title">
                            {{ display('Dashboard') }} \ {{ display('answers') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <span class="d-none d-sm-inline">
                                <a href="{{ route('dashboard.export') }}" class="btn btn-white">
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
                            </span>
                            {{-- <form action="{{ route('dashboard.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="from-group">
                                        <input type="file" name="file" require>
                                    </div>
                                </div>
                                <span class="d-none d-sm-inline">
                                    <a href="{{ route('dashboard.import') }}" class="btn btn-white">
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
                                        {{ 'import file' }}
                                    </a>
                                </span>
                            </form> --}}

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
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ display('answer') }}</th>
                                            <th>{{ display('no. question') }}</th>
                                            <th>{{ display('correct') }}</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($answers as $index => $answer)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $answer->answer }}</td>
                                                <td>{{ $answer->question_id }}</td>
                                                <td>
                                                    @if ($answer->correct == 1)
                                                        <h4>true</h4>
                                                    @else
                                                        <h4>false</h4>
                                                    @endif
                                                    {{-- {{  }} --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="">
                                    {{ $answers->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
