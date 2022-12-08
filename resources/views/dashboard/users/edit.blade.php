@extends('layouts.dashboard.app')

@section('content')
    {{-- @mido_shriks --}}
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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.users.edit',$user->id) }}">{{ display('Edit') }}</a>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.users.edit',$user->id) }}">{{ display($user->first_name) }}</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- Sizebox container html --}}
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-4">
                    <div class="modal-header mb-1">
                        <h5 class="modal-title">
                            {{ $user->role_permissions == 'admin' ? display('edit admin : ') : display('edit user : ') }}
                            {{ $user->first_name .' '. $user->last_name}} </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="modal-content">
                        <div class="col-md-12">
                            <div class="modal-body align-self-center">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title" style="margin-right: 5px;">
                                            {{ display('form Admin end User ') }}
                                        </h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-user-plus" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            <path d="M16 11h6m-3 -3v6"></path>
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('dashboard.users.update', $user->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="form-group mb-3 col-md-12 d-flex">
                                                <div class="col-sm-6 me-2">
                                                    <label class="form-label required">{{ display('first name') }}</label>
                                                    <div class="">
                                                        <input type="text" class="form-control" name="first_name"
                                                            value="{{ $user->first_name }}" placeholder="Enter First name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label required">{{ display('last name') }}</label>
                                                    <div>
                                                        <input type="text" class="form-control" name="last_name"
                                                            value="{{ $user->last_name }}" placeholder="Enter last name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-3 col-md-12 d-flex">
                                                <div class="col-md-6 me-2">
                                                    <label class="form-label required">{{ display('Phone user') }}</label>
                                                    <div>
                                                        <input type="number" class="form-control" name="phone"
                                                            value="{{ $user->phone }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label
                                                        class="form-label required">{{ display('date of birth') }}</label>
                                                    <input type="date" name="dob_date" id=""
                                                        class="form-control" value="{{ $user->dob_date }}">
                                                </div>
                                            </div>


                                            <div class="form-group mb-3 col-md-12 d-flex">
                                                {{-- @dd($user->role_permissions) --}}
                                                @if ($user->role_permissions == 'super_admin')
                                                    <div class="col-md-6 me-2">
                                                        <div>
                                                            <div class="mb-3">
                                                                <div class="form-label">{{ display('Select Role') }}</div>
                                                                <select class="form-select" name="role_permissions">
                                                                    <option value="">{{ display('chooes') }}
                                                                    </option>
                                                                    <option
                                                                        {{ $user->role_permissions == 'super_admin' ? 'selected' : '' }}
                                                                        value="">
                                                                        {{ display($user->role_permissions) }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-6 me-2">
                                                        <div>
                                                            <div class="mb-3">
                                                                <div class="form-label">{{ display('Select Role') }}</div>
                                                                <select class="form-select" name="role_permissions">
                                                                    <option value="">{{ display('chooes') }}
                                                                    </option>
                                                                    @foreach ($types as $type)
                                                                        <option
                                                                            {{ $type->name == $user->role_permissions ? 'selected' : '' }}
                                                                            value="{{ $type->id }}">
                                                                            {{ display($type->name) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif



                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ display('Select gender') }}</div>
                                                        <select class="form-select" name="gender">
                                                            <option value="">{{ display('chooes') }}</option>
                                                            <option {{ $user->gender == $user->gender ? 'selected' : '' }}
                                                                value="{{ $user->gender }}">{{ $user->gender }}</option>
                                                            <option value="male">{{ display('male') }}</option>
                                                            <option value="famle">{{ display('famle') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="mb-3">
                                                    <div class="form-label">{{ display('Select nation') }}</div>
                                                    <select class="form-select" name="country_id">
                                                        <option value="">{{ display('chooes') }}</option>
                                                        @foreach ($select_countries as $select_country)
                                                            <option
                                                                {{ $select_country->id == $user->country_id ? 'selected' : '' }}
                                                                value="{{ $select_country->id }}">
                                                                {{ $select_country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- <div class="form-group mb-3 ">
                                            <label class="form-label required">{{ display('Email address') }}</label>
                                            <div>
                                                <input type="email" class="form-control"
                                                    aria-describedby="emailHelp" name="email"
                                                    placeholder="Enter email" value="{{ $user->email }}">
                                                <small
                                                    class="form-hint">{{ display("We'll never share your email with anyone else.") }}</small>
                                            </div>
                                        </div> --}}

                                            {{-- <div class="form-group mb-3 ">
                                            <label class="form-label required">{{ display('Password') }}</label>
                                            <div>
                                                <input type="password" class="form-control" placeholder="Password"
                                                    name="password" value="{{ $user->password }}">
                                                <small class="form-hint">
                                                    {{ display('Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.') }}
                                                </small>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3 ">
                                            <label class="form-label required">{{ display('Re Password') }}</label>
                                            <div>
                                                <input type="password" class="form-control"
                                                    placeholder="Retype Password" name=""
                                                    value="{{ $user->password }}">
                                            </div>
                                        </div> --}}

                                            <div class="form-group mb-3 ">
                                                <label class="form-label required">{{ display('image user') }}</label>
                                                <div>
                                                    <input type="file" class="form-control" name="image">
                                                    <small class="form-hint">
                                                        <img src="{{ $user->getMedia('photo_user')->last()? $user->getMedia('photo_user')->last()->getUrl('mobile'): $user->photo_user }}"
                                                            alt="" srcset="" width="160">
                                                    </small>
                                                </div>
                                            </div>


                                            {{-- @dd($user->role_permissions) --}}
                                            @if ($user->role_permissions == 'admin' || 'super_admin' || 'developer')
                                                @php
                                                    $models = ['users', 'qoutions'];
                                                    $maps = ['create', 'read', 'update', 'delete'];
                                                @endphp

                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <ul class="nav nav-tabs" data-bs-toggle="tabs">
                                                            @foreach ($models as $index => $model)
                                                                <li class="nav-item">
                                                                    <a href="#{{ $model }}"
                                                                        class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                                        data-bs-toggle="tab">{{ $model }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                @foreach ($models as $index => $model)
                                                                    <div class="tab-pane fade {{ $index == 0 ? 'active' : '' }} show"
                                                                        id="{{ $model }}">
                                                                        @foreach ($maps as $map)
                                                                            <label style="margin-right: 20px;">
                                                                                <input type="checkbox"
                                                                                    name="permissions[]"
                                                                                    {{ $user->hasPermission($model . '_' . $map) ? 'checked' : '' }}
                                                                                    value="{{ $model . '_' . $map }}"
                                                                                    id="{{ $model . ' ' . $map }}">
                                                                                {{ $model . ' ' . $map }}
                                                                            </label>
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

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
    </div>

@endsection
