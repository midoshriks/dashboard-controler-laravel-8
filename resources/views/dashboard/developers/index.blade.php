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
                            {{ display('Dashboard') }}\{{ display('developer') }}
                        </h2>
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
                                {{ display('Create new Route api') }}
                            </a>
                            {{-- @mido_shriks --}}
                            @include('dashboard.developers.create')
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
                                                <th>{{ display('file') }}</th>
                                                <th>{{ display('example') }}</th>
                                                <th>{{ display('type') }}</th>
                                                <th>{{ display('model') }}</th>
                                                <th>{{ display('Route') }}</th>
                                                <th class="w-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($developer_api as $index => $developer)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $developer->file }}</td>
                                                    <td>
                                                        <p>
                                                            {{ $developer->example }}
                                                        </p>
                                                    </td>
                                                    <td>{{ $developer->type }}</td>
                                                    <td>{{ $developer->model }}</td>
                                                    <td><a target="_blank"
                                                            href="{{ url($developer->route_api) }}">{{ $developer->route_api }}</a>
                                                    </td>
                                                    <td>
                                                        <div class="col-auto">
                                                            <div class="dropdown">
                                                                <a href="#" class="btn-action"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
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
                                                                    <a href="{{ route('dashboard.developers.edit', $developer->id) }}"
                                                                        class="dropdown-item">Edit</a>

                                                                    <a href="javascript:;"
                                                                        class="dropdown-item text-danger btn-delet"
                                                                        data-form-id="developer-delete-{{ $developer->id }}"
                                                                        data-name-item="{{ $developer->route_api }}">
                                                                        Delete
                                                                    </a>

                                                                    <form id="developer-delete-{{ $developer->id }}"
                                                                        action="{{ route('dashboard.developers.destroy', $developer->id) }}"
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
                                        {{ $developer_api->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
