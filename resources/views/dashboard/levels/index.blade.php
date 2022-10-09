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
                        <div class="page-pretitle">
                            {{ display('Smart bucks') }}
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index')}}">{{ display('Home')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.levels.index')}}">{{ display($title)}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ display('Data levels tables')}}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            {{-- <span class="d-none d-sm-inline">
                            <a href="#" class="btn btn-white">
                                New view
                            </a>
                        </span> --}}
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
                                {{ display('Create new level') }}
                            </a>
                            {{-- @mido_shriks --}}
                            @include('dashboard.levels.create')
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
                                <table id="dataTable" class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ display('Name') }}</th>
                                            <th>{{ display('rewards') }}</th>
                                            <th>{{ display('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($levels as $index => $level)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $level->name }}</td>
                                                <td>
                                                    {{ $level->rewards }}
                                                </td>
                                                <td>
                                                    <div class="col-auto">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn-action" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <circle cx="12" cy="12" r="1" />
                                                                    <circle cx="12" cy="19" r="1" />
                                                                    <circle cx="12" cy="5" r="1" />
                                                                </svg>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a href="{{ route('dashboard.levels.edit', $level->id) }}"
                                                                    class="dropdown-item">Edit</a>

                                                                <a href="javascript:;"
                                                                    class="dropdown-item text-danger btn-delet"
                                                                    data-form-id="level-delete-{{ $level->id }}"
                                                                    data-name-item="{{ $level->name }}">
                                                                    Delete
                                                                </a>

                                                                <form id="level-delete-{{ $level->id }}"
                                                                    action="{{ route('dashboard.levels.destroy', $level->id) }}"
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
                                </table>
                                <div class="">
                                    {{ $levels->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @mido_shrisk test ravd code --}}
    {{-- <h2>test rand  {{Str::random(2)}} </h2>
    <h2>test rand  {{mt_rand(1000000,10000000)}} </h2>
    <h2>test rand  {{Str::random(2) . mt_rand(1000000,10000000) }} </h2> --}}
@endsection
