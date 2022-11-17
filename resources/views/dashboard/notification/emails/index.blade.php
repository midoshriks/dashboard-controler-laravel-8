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
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.mail.index') }}">{{ display('send mail') }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="col-md-12">
                        <form class="card" action="{{ route('dashboard.mail.store')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="card-header">
                                <h3 class="card-title">{{ display('Form Send Ads Mail ') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">{{ display('title button') }}</label>
                                    <div>
                                        <input type="text" class="form-control" name="title" placeholder="Enter title">
                                        <small class="form-hint">We'll never share your title with anyone else.</small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label required">{{ display('body message mail') }}</label>
                                    <textarea class="form-control" name="body" rows="5"></textarea>
                                </div>

                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">{{ 'Send mail' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
