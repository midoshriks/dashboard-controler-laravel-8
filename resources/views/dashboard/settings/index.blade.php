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
                                    href="{{ route('dashboard.settings.index') }}">{{ display('settings') }}</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Settings</h3>
                        </div>

                            <div class="card-body">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                        @foreach ($models as $index => $model)
                                            <li class="nav-item">
                                                <a href="#{{ $model->model }}" class="nav-link {{ $index == 0 ? 'active' : '' }}" data-bs-toggle="tab">{{$model->model}}</a>
                                            </li>
                                        @endforeach

                                        {{-- <li class="nav-item">
                                            <a href="#tabs-profile-7" class="nav-link" data-bs-toggle="tab">Profile</a>
                                        </li> --}}
                                        <li class="nav-item ms-auto">
                                            <a href="#tabs-settings-7" class="nav-link" title="Settings" data-bs-toggle="tab">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                                <div class="card-body">
                                    <div class="tab-content">
                                        @foreach ($models as $index => $model)
                                            <div class="tab-pane {{ $index == 0 ? 'active' : '' }} show" id="{{ $model->model }}">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                {{-- <th>{{ display('model') }}</th> --}}
                                                                <th>{{ display('key') }}</th>
                                                                <th>{{ display('value') }}</th>
                                                                <th>{{ display('Action') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($settings as $index => $value)
                                                                @if ($value->model == $model->model)
                                                                {{-- @dd($model->model) --}}
                                                                {{-- @dd($value->model) --}}

                                                                <form action="{{ route('dashboard.settings.update',$value->id)}}" method="post">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <tr>
                                                                        {{-- <td>{{ $value->model }}</td> --}}
                                                                        <td>
                                                                            <input type="text" class="form-control" name="key"
                                                                                value="{{ $value->key }}" disabled>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" class="form-control" name="value"
                                                                                value="{{ $value->value }}">
                                                                        </td>
                                                                        <td>
                                                                            <form action="{{ route('dashboard.settings.update',$value->id)}}" method="post">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button type="submit" class="btn btn-primary">Update Settings
                                                                                    
                                                                                </button>
                                                                                {{-- <div class="card-footer text-end">
                                                                                </div> --}}
                                                                            </form>
                                                                        </td>
                                                                    </tr>

                                                                @endif
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{-- <div class="tab-pane" id="tabs-profile-7">
                                            <h4>Profile tab</h4>
                                            <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at
                                                diam, sem nunc amet, pellentesque id egestas velit sed</div>
                                        </div> --}}
                                        <div class="tab-pane" id="tabs-settings-7">
                                            <h4>Settings tab</h4>
                                            <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet,
                                                facilisi sit mauris accumsan nibh habitant senectus</div>
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="form-label">Assertions</div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>{{ display('model') }}</th>
                                                <th>{{ display('key') }}</th>
                                                <th>{{ display('value') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($setting as $index => $value)
                                                <tr>
                                                    <td>{{ $value->model }}</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="key"
                                                            value="{{ $value->key }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="value"
                                                            value="{{ $value->value }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> --}}
                            </div>
                            {{-- <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Make Settings</button>
                            </div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
