@extends('layouts.dashboard.app')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ display('info user') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                {{-- info name & email --}}
                                <div class="col-9">
                                    <div class="row g-3 align-items-center">
                                        <a href="#" class="col-auto">
                                            <span class="avatar"
                                                style="background-image: url({{ Auth::user()->getMedia('photo_user')->last()? Auth::user()->getMedia('photo_user')->last()->getUrl('mobile'): Auth::user()->photo_user }})">
                                            </span>
                                            {{-- <span class="badge bg-green"></span> --}}
                                        </a>
                                        <div class="col text-truncate">
                                            <a href="#"
                                                class="text-reset d-block text-truncate">{{ display(Auth::user()->first_name . ' ' . Auth::user()->last_name) }}</a>
                                            <div class="text-muted text-truncate mt-n1">{{ display(Auth::user()->email) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- info phone & country --}}
                                <div class="col-9">
                                    <div class="row g-3 align-items-center">
                                        <a href="#" class="col-auto">
                                            <span class="avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-file-info" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path
                                                        d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                    </path>
                                                    <path d="M11 14h1v4h1"></path>
                                                    <path d="M12 11h.01"></path>
                                                </svg>
                                                {{-- <span class="badge bg-green"></span> --}}
                                            </span>
                                        </a>
                                        <div class="col text-truncate">
                                            <a href="#"
                                                class="text-reset d-block text-truncate">{{ display(Auth::user()->phone) }}</a>
                                            <div class="text-muted text-truncate mt-n1">
                                                {{ display(Auth::user()->country->name) }}</div>
                                        </div>
                                    </div>
                                </div>

                                {{-- info coins & bucks --}}
                                <div class="col-9">
                                    <div class="row g-3 align-items-center">
                                        <a href="#" class="col-auto">
                                            <span class="avatar"
                                                style="background-image: url({{ asset('uploads/products/coin.png') }})">
                                                {{-- <span class="badge bg-green"></span> --}}
                                            </span>
                                        </a>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-reset d-block text-truncate">
                                                {{ display('coins' . ' ' . Auth::user()->wallets->balance('coin') . ' ' . '$') }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="row g-3 align-items-center">
                                        <a href="#" class="col-auto">
                                            <span class="avatar"
                                                style="background-image: url({{ asset('uploads/products/helper.png') }})">
                                                {{-- <span class="badge bg-green"></span> --}}
                                            </span>
                                        </a>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-reset d-block text-truncate">
                                                {{ display('helpers' . ' ' . Auth::user()->wallets->balance('helper')) }}</a>
                                        </div>
                                    </div>
                                </div>

                                {{-- info count helper --}}
                                {{-- <div class="col-9">
                                    <div class="row g-3 align-items-center">
                                        <a href="#" class="col-auto">
                                            <span class="avatar"
                                                style="background-image: url({{ Auth::user()->getMedia('photo_user')->last()? Auth::user()->getMedia('photo_user')->last()->getUrl('mobile'): Auth::user()->photo_user }})">
                                            </span>
                                        </a>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-reset d-block text-truncate">
                                                @for ($i = 1; $i < 5; $i++)
                                                    {{ Auth::user()->wallets->balance('helper', $i) }}
                                                @endfor
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-9">
                                    <div class="row g-3 align-items-center">
                                        <a href="#" class="col-auto">
                                            {{-- <span class="avatar"
                                                style="background-image: url({{ asset('uploads/levels/level.png') }})"> --}}
                                                <span class="badge bg-green">{{ display('levels') }}</span>
                                            </span>
                                        </a>
                                        <div class="col text-truncate">
                                            {{-- <a href="#" class="text-reset d-block text-truncate">
                                                {{ display('helpers' . ' ' . Auth::user()->wallets->balance('helper')) }}</a> --}}
                                            @foreach (Auth::user()->levels as $level_user)
                                                <div class="avatar-list avatar-list-stacked">
                                                    <span class="avatar avatar-xm avatar-rounded"
                                                        style="background-image: url({{ $level_user->getMedia('photo_level')->last()? $level_user->getMedia('photo_level')->last()->getUrl('mobile'): $level_user->photo_level }})"></span>
                                                    <span
                                                        class="avatar avatar-xm avatar-rounded">{{ $level_user->name }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="datagrid-item">
                                    <div class="datagrid-title">{{ display('list LEVELS USER') }}</div>
                                    <div class="datagrid-content">
                                        @foreach (Auth::user()->levels as $level_user)
                                            <div class="avatar-list avatar-list-stacked">
                                                <span class="avatar avatar-xm avatar-rounded"
                                                    style="background-image: url({{ $level_user->getMedia('photo_level')->last()? $level_user->getMedia('photo_level')->last()->getUrl('mobile'): $level_user->photo_level }})"></span>
                                                <span
                                                    class="avatar avatar-xm avatar-rounded">{{ $level_user->name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div> --}}
                                <a href="/api/dashboard/user/test">test</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection