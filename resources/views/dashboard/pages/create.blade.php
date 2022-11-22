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
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <form action="{{ route('dashboard.pages.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">{{ display('title') }}</label>
                            <input type="text" class="form-control" name="name" placeholder="titel">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ display('Description') }}</label>
                            <textarea class="ckeditor" id="description" name="description">Hello, <b>Tabler</b>!</textarea>
                            {{-- <textarea id="tinymce-mytextarea" name="description">Hello, <b>Tabler</b>!</textarea> --}}
                            {{-- <textarea id="tinymce-mytextarea" name="description">Hello, <b>Tabler</b>!</textarea> --}}
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">{{ 'create page' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
