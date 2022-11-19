@extends('layouts.dashboard.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <img class="mt-0" src="{{ asset('dashboard/src/static/smart_logo.png') }}" width="40" alt=""
                        srcset="">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <div class="page-pretitle">
                                    {{ display('Smart bucks') }}
                                </div>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ display('Dshboard') }}</li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ display('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.pages.index') }}">{{ display('pages') }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        {{-- mido_hsriks btn  --}}
                        <span class="d-sm-inline">
                            <a href="{{ route('dashboard.pages.create') }}" class="btn btn-white">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-file-arrow-right" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                        </path>
                                        <path d="M9 15h6"></path>
                                        <path d="M12.5 17.5l2.5 -2.5l-2.5 -2.5"></path>
                                    </svg>
                                </span>
                                {{ 'create page' }}
                            </a>
                        </span>
                    </div>
                    {{-- ==== --}}
                    </span>
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
                                        <th>{{ display('title') }}</th>
                                        <th>{{ display('status') }}</th>
                                        <th>{{ display('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $index => $page)
                                        <tr>
                                            <td>{{ $page->index + 1 }}</td>
                                            <td>{{ $page->name }}</td>
                                            <td>
                                                <div class="mb-3">
                                                    <label class="form-check form-switch">
                                                        <!-- Rounded switch -->
                                                        <label class="switch">
                                                            <input class="form-check-input btn-active" type="checkbox"
                                                                {{ $page->status == 1 ? 'checked' : '' }}
                                                                data-form-id="page-active-{{ $page->id }}"
                                                                data-name-item="{{ $page->name }}">
                                                        </label>
                                                        {{-- form --}}
                                                        <form id="page-active-{{ $page->id }}" style="display: none"
                                                            action="{{ route('dashboard.page.active', $page->id) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <input name="status" value="{{ $page->status == 1 ? 0 : 1 }}">
                                                            <input type="submit" value="save">
                                                        </form>
                                                        {{-- form --}}
                                                    </label>
                                                </div>
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
                                                            <a href="{{ route('dashboard.pages.edit', $page->id) }}"
                                                                class="dropdown-item">{{ display('Edit') }}</a>
                                                            {{-- <a href="#"  class="dropdown-item text-danger">Delete</a> --}}

                                                            <a href="javascript:;"
                                                                class="dropdown-item text-danger btn-delet"
                                                                data-form-id="page-delete-{{ $page->id }}"
                                                                data-name-item="{{ $page->name }}">
                                                                {{ display('Delete') }}
                                                            </a>

                                                            <form id="page-delete-{{ $page->id }}"
                                                                action="{{ route('dashboard.pages.destroy', $page->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
