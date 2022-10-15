@extends('layouts.dashboard.material')

@section('content')
    <div class="container-tight py-4">
        <div class="text-center">
            <a href="." class="navbar-brand navbar-brand-autodark mb-0">
                <img src="{{ asset('dashboard/src/static/smart_logo.png') }}" height="200" alt="">
            </a>
        </div>
        <form class="card card-md" action="{{ route('login') }}" method="POST" autocomplete="off">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ display('Login to your account') }}</h2>
                <div class="mb-3">
                    <label class="form-label">{{ display('Email address') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter email" autocomplete="off" id="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="form-label">
                        {{ display('Password') }}
                        <span class="form-label-description">
                            <a href="{{ route('password.request') }}">{{ display('I forgot password') }}</a>
                        </span>
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" autocomplete="off" id="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- Icons show password --}}
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path
                                        d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" class="form-check-input" />
                        <span class="form-check-label">{{ display('Remember me on this device') }}</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ display('Sign in') }}</button>
                </div>
            </div>
            <div class="hr-text">{{ display('or') }}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col"><a href="#" class="btn btn-white w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                            </svg>
                            {{ display('Login Facebook') }}
                        </a></div>
                    <div class="col"><a href="#" class="btn btn-white w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-google -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                            </svg>
                            {{ display('Login Google') }}
                        </a></div>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            {{ display("Don't have account yet") }} ? <a href="./sign-up.html"
                tabindex="-1">{{ display('Sign up') }}</a>
        </div>
    </div>
@endsection
