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
                            {{ display('Dashboard') }} \ {{ display('languages') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <span class="d-none d-sm-inline">
                                <a href="#" class="btn btn-white">
                                    New view
                                </a>
                            </span>
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
                                            <th>{{ display('phrase') }}</th>
                                            <th>{{ display('en') }}</th>
                                            <th>{{ display('ar') }}</th>
                                            <th>{{ display('action') }}</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($languages as $index => $lang)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $lang->phrase }}</td>
                                                <td>{{ $lang->en }}</td>
                                                <td>{{ $lang->ar }}</td>
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
                                                                <a href="{{ route('dashboard.languages.edit', $lang->id) }}"
                                                                    class="dropdown-item">Edit</a>

                                                                <a href="javascript:;"
                                                                    class="dropdown-item text-danger btn-delet"
                                                                    data-form-id="lang-delete-{{ $lang->id }}"
                                                                    data-name-item="{{ $lang->phrase }}">
                                                                    Delete
                                                                </a>

                                                                <form id="lang-delete-{{ $lang->id }}"
                                                                    action="{{ route('dashboard.languages.destroy', $lang->id) }}"
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
                                <div class="">
                                    {{ $languages->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
