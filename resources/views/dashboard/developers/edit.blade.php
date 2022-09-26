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
                        {{ display('Dashboard') }} \ {{ display('developer') }} \ {{ display('edit') }} \
                        {{ $developer->route_api }}
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
                                {{ display('edit level : ') }}
                                {{ $developer->route_api }} </h5>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="modal-body align-self-center">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-right: 5px;">{{ display('form edit developer Route api ') }}
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
                                        <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
                                        <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
                                        <line x1="11" y1="6" x2="20" y2="6"></line>
                                        <line x1="11" y1="12" x2="20" y2="12"></line>
                                        <line x1="11" y1="18" x2="20" y2="18"></line>
                                    </svg>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('dashboard.developers.update', $developer->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        @include('partials._errors')

                                        <div class="form-group mb-3 col-md-12 d-flex">
                                            <div class="col-sm-6 m-1">
                                                <label class="form-label required">{{ display('model') }}</label>
                                                <div class="">
                                                    <input type="text" class="form-control" name="model" value="{{$developer->model}}"
                                                        placeholder="Enter name model">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-1">
                                                <label class="form-label required">{{ display('selevt type') }}</label>
                                                <div>
                                                    <select class="form-select" name="type">
                                                        <option {{$developer->type ==  $developer->type ? 'selected' : ''}} value="{{ $developer->type}}">{{$developer->type}}</option>
                                                        <option value="">Choees</option>
                                                        <option value="get">{{ display('GET') }}</option>
                                                        <option value="post">{{ display('POST') }}</option>
                                                        <option value="put">{{ display('PUT') }}</option>
                                                        <option value="delete">{{ display('DELETE') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 col-md-12 d-flex">
                                            <div class="col-sm-12 m-1">
                                                <label class="form-label required">{{ display('Route') }}</label>
                                                <div class="">
                                                    <input type="text" class="form-control" name="route_api" value="{{$developer->route_api}}"
                                                        placeholder="Enter route api">
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
