@extends('layouts.dashboard.app')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ display('Data grid') }} \ {{ display($user->first_name) }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ display('Information' . ' ' . $user->first_name . ' ' . $user->last_name) }}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('email user') }}</div>
                            <div class="datagrid-content">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-xs me-2 avatar-rounded" {{-- style="background-image: url({{ asset('dashboard/demo/static/avatars/000m.jpg') }}"></span> --}}
                                        style="background-image: url({{ $user->getMedia('photo_user')->last()? $user->getMedia('photo_user')->last()->getUrl('mobile'): $user->photo_user }}"></span>
                                    {{ $user->email }}
                                </div>
                            </div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('name user') }}</div>
                            <div class="datagrid-content">{{ $user->first_name . ' ' . $user->last_name }}</div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('Name servers Role') }}</div>
                            <div class="datagrid-content">{{ $user->role_permissions }}</div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('code membership') }}</div>
                            <div class="datagrid-content">{{ $user->code_membership }}</div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('user gender') }}</div>
                            <div class="datagrid-content">
                                <div class="datagrid-content">
                                    @if ($user->gender)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-man"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="5" r="2"></circle>
                                            <path d="M10 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5"></path>
                                        </svg>
                                        {{ $user->gender }}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-woman"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="5" r="2"></circle>
                                            <path d="M10 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4"></path>
                                        </svg>
                                        {{ $user->gender }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('Age') }}</div>
                            <div class="datagrid-content">{{ $user->dob_date }}</div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('user continer') }}</div>
                            <div class="datagrid-content">
                                <div class="datagrid-content">
                                    {{ $user->country->name }}
                                </div>
                            </div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('user phone') }}</div>
                            <div class="datagrid-content">
                                <div class="datagrid-content">
                                    {{ $user->phone }}
                                </div>
                            </div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('Checked phone verified') }}</div>
                            <div class="datagrid-content">
                                @if ($user->phone_verified_at == null)
                                    <div class="datagrid-content">
                                        <span class="status status-red">{{ display('X') }}</span>
                                        {{ display('Non-Checked') }}
                                    </div>
                                @else
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                    {{ display('Checked') }}
                                @endif
                            </div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('user status') }}</div>
                            <div class="datagrid-content">
                                @if ($user->status == 1)
                                    <span class="status status-green">{{ display('Active') }}</span>
                                @else
                                    <span class="status status-red">{{ display('Non-Active') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Avatars list</div>
                            <div class="datagrid-content">
                                @foreach ($levels_users as $level_user)
                                    <div class="avatar-list avatar-list-stacked">
                                        <span class="avatar avatar-xs avatar-rounded"
                                            style="background-image: url({{ $level_user->getMedia('photo_level')->last()? $level_user->getMedia('photo_level')->last()->getUrl('mobile'): $level_user->photo_user }})"></span>
                                        <span class="avatar avatar-xs avatar-rounded">{{ $level_user->name }}</span>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('user level') }}</div>
                            <div class="datagrid-content">
                                <div class="datagrid-content">
                                    @foreach ($levels_users as $level_user)
                                        {{ $level_user->name }}
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">Expiration date</div>
                            <div class="datagrid-content">–</div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">{{ display('Age') }}</div>
                            <div class="datagrid-content">{{ $user->dob_date }}</div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">Form control</div>
                            <div class="datagrid-content">
                                <input type="text" class="form-control form-control-flush"
                                    placeholder="Input placeholder">
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Longer description</div>
                            <div class="datagrid-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Empty page
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <!-- Content here -->
        </div>
    </div> --}}
@endsection
