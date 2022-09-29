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
                            {{ display('Dashboard') }} \ {{ display('helpers') }}
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
                                            <th>{{ display('name') }}</th>
                                            <th>{{ display('satuts') }}</th>
                                            <th class="w-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($helpers as $index => $helper)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $helper->name }}</td>
                                                <td>
                                                    {{-- @mido_shriks // button switch toggle actived laravel by sweetalert2 --}}
                                                    <div class="mb-3">
                                                        <label class="form-check form-switch">
                                                            <!-- Rounded switch -->
                                                            <label class="switch">
                                                                <input class="form-check-input btn-active" type="checkbox"
                                                                    {{ $helper->status == 1 ? 'checked' : '' }}
                                                                    data-form-id="helper-active-{{ $helper->id }}"
                                                                    data-name-item="{{ $helper->name }}">
                                                            </label>
                                                            {{-- form --}}
                                                            <form id="helper-active-{{ $helper->id }}"
                                                                style="display: none"
                                                                action="{{ route('dashboard.active', $helper->id) }}"
                                                                {{-- action="{{ route('dashboard.helpers.updatestatus', $helper->id) }}" --}} method="POST"
                                                                style="display: inline-block;">
                                                                @csrf
                                                                @method('PUT')
                                                                <input name="status"
                                                                    value="{{ $helper->status == 1 ? 0 : 1 }}">
                                                                <input type="submit" value="save">
                                                            </form>
                                                            {{-- form --}}
                                                        </label>
                                                    </div>
                                                    {{-- @mido_shriks // button switch toggle actived laravel by sweetalert2 --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="">
                                    {{ $helpers->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
