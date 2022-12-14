@extends('layouts.dashboard.app')
@php
    use Illuminate\Support\Carbon;
@endphp

@section('content')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">
                    <div class="col-3 d-none d-md-block border-end">
                        <div class="card-body">
                            <h4 class="subheader">Business settings</h4>
                            <div class="list-group list-group-transparent">
                                @if (app()->getLocale() == 'en')
                                    <a href="#profile"
                                        class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('en/dashboard/profile/show/*') ? 'active' : '' }}">
                                    @else
                                        <a href="#profile"
                                            class="list-group-item list-group-item-action d-flex align-items-center {{ Request::is('ar/dashboard/profile/show/*') ? 'active' : '' }}">
                                @endif
                                {{ display('My Account') }}
                                </a>

                                {{-- <a href="#notifications"
                                    class="list-group-item list-group-item-action d-flex align-items-center">
                                    {{ display('My Notifications') }}
                                </a> --}}

                                {{-- <a href="#"
                                    class="list-group-item list-group-item-action d-flex align-items-center">Connected
                                    Apps</a>

                                <a href="./settings-plan.html"
                                    class="list-group-item list-group-item-action d-flex align-items-center">Plans</a>

                                <a href="#"
                                    class="list-group-item list-group-item-action d-flex align-items-center">Billing &
                                    Invoices</a> --}}
                            </div>
                            {{-- <h4 class="subheader mt-4">Experience</h4>
                            <div class="list-group list-group-transparent">
                                <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col d-flex flex-column">

                        <div class="line bg-blue text-center text-white">my profile</div>

                        <section id="profile">
                            <div class="card-body">
                                <h2 class="mb-4">My Account</h2>
                                <h3 class="card-title">Profile Details</h3>
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="avatar avatar-xl"
                                            style="background-image: url({{ $profile->getMedia('photo_user')->last()? $profile->getMedia('photo_user')->last()->getUrl('mobile'): $profile->photo_user }})"></span>
                                    </div>

                                    <div class="col-auto">
                                        <a href="#" class="btn" data-bs-toggle="modal"
                                            data-bs-target="#modal-simple">
                                            Change avatar
                                        </a>
                                    </div>

                                    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Change avatar</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('dashboard.profiles.update', $profile->id) }}"
                                                    enctype="multipart/form-data" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <div class="modal-body">
                                                        <div class="form-group mb-3 ">
                                                            <label
                                                                class="form-label required">{{ display('image user') }}</label>
                                                            <div>
                                                                <input type="file" class="form-control" name="image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn me-auto"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-auto">
                                        <a href="#" class="btn btn-ghost-danger" data-bs-toggle="modal" data-bs-target="#modal-danger">
                                            Delete avatar
                                        </a>
                                    </div>

                                    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                                <div class="modal-status bg-danger"></div>
                                                <div class="modal-body text-center py-4">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon mb-2 text-danger icon-lg" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M12 9v2m0 4v.01" />
                                                        <path
                                                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                                                    </svg>
                                                    <h3>Are you sure?</h3>
                                                    <div class="text-muted">
                                                        Do you really want to remove files?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="w-100">
                                                        <div class="row">
                                                            <div class="col"><a href="#" class="btn w-100"
                                                                    data-bs-dismiss="modal">
                                                                    Cancel
                                                                </a></div>
                                                            <div class="col"><button type="submit"
                                                                    class="btn btn-danger w-100" data-bs-dismiss="modal">
                                                                    Delete items
                                                                </button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>
                                <h3 class="card-title mt-4">Business Profile</h3>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Business Name</div>
                                        <input type="text" class="form-control"
                                            value="{{ $profile->first_name . ' ' . $profile->last_name }}" disabled>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Business ID</div>
                                        <input type="text" class="form-control" value="{{ $profile->code_membership }}"
                                            disabled>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">PHONE</div>
                                        <input type="text" class="form-control" value="{{ $profile->phone }}" disabled>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Location</div>
                                        <input type="text" class="form-control" value="{{ $profile->country->name }}"
                                            disabled>
                                    </div>

                                        {{-- <img src="{{ asset('dashboard/flags/'.$profile->country->flag) }}" height="45" alt=""  > --}}

                                    <div class="col-md">
                                        <div class="form-label">DATE OF BIRTH</div>
                                        <input type="text" class="form-control"
                                            value="{{ Carbon::parse($profile->dob_date)->diff(Carbon::now())->y }} Years"
                                            disabled>
                                    </div>
                                </div>

                                <form action="{{ route('dashboard.profiles.update', $profile->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <h3 class="card-title mt-4">Email</h3>
                                    <p class="card-subtitle">This contact will be shown to others publicly, so choose it
                                        carefully.
                                    </p>
                                    <div>
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <input type="text" class="form-control" name="email"
                                                    value="{{ $profile->email }}">
                                            </div>
                                            <div class="col-auto"><button type="submit" class="btn">
                                                    Change
                                                </button></div>
                                        </div>
                                    </div>
                                </form>


                                <h3 class="card-title mt-4">Password</h3>
                                <p class="card-subtitle">You can set a permanent password if you don't want to use
                                    temporary
                                    login codes.</p>
                                <div>
                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-pass">
                                        Set new password
                                    </a>
                                </div>

                                <div class="modal modal-blur fade" id="modal-pass" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('dashboard.profiles.update', $profile->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="modal-title">Are you sure?</div>
                                                    <div>
                                                        <div class="form-group mb-3 ">
                                                            <label
                                                                class="form-label required">{{ display('Enter New Password') }}</label>
                                                            <div>
                                                                <input type="password" class="form-control"
                                                                    placeholder="Enter old Password" name="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-link link-secondary me-auto"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-green"
                                                        data-bs-dismiss="modal">Yes, Set new </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                {{-- <h3 class="card-title mt-4">Public profile</h3>
                                <p class="card-subtitle">Making your profile public means that anyone on the Dashkit network
                                    will be able to find
                                    you.</p>
                                <div>
                                    <label class="form-check form-switch form-switch-lg">
                                        <input class="form-check-input" type="checkbox">
                                        <span class="form-check-label form-check-label-on">You're currently visible</span>
                                        <span class="form-check-label form-check-label-off">You're
                                            currently invisible</span>
                                    </label>
                                </div> --}}

                            </div>

                            {{-- <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <a href="#" class="btn">
                                        Cancel
                                    </a>
                                    <a href="#" class="btn btn-primary">
                                        Submit
                                    </a>
                                </div>
                            </div> --}}

                        </section>

                        {{-- <div class="line bg-blue text-center text-white">notifications</div> --}}

                        {{-- <section id="notifications">
                            <div class="card-body">
                                <h3 class="card-title mt-4">Public profile</h3>
                                <p class="card-subtitle">
                                    Making your profile public means that anyone on the Dashkit network
                                    will be able to find
                                    you.
                                </p>
                                <div>
                                    <div class="col-sm-6 col-lg-12 mb-5">
                                        <div class="dropdown-menu dropdown-menu-demo dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#">
                                                Notifications
                                                <span
                                                    class="badge bg-primary ms-auto">{{ Auth::user()->unreadNotifications->count() }}</span>
                                            </a>

                                            @foreach (Auth::user()->unreadNotifications as $notification)
                                                <div class="card-body">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <div class="row g-3 align-items-center">
                                                                <a href="#" class="col-auto">
                                                                    <span class="avatar"
                                                                        style="background-image: url({{ Auth()->user()->getMedia('first_name')->last()? Auth()->user()->getMedia('photo_user')->last()->getUrl('mobile'): Auth()->user()->photo_user }})">
                                                                        <span class="badge bg-green"></span></span>
                                                                </a>
                                                                <div class="col text-truncate">
                                                                    <a href="{{ route('dashboard.users.show', $notification->data['data_send_id']) }}"
                                                                        class="text-reset d-block text-truncate">
                                                                        {{ $notification->data['data_send_name'] }}
                                                                    </a>
                                                                    <div class="text-muted text-truncate mt-n1">
                                                                        {{ display($notification->data['message']) }}
                                                                        <a
                                                                            href="{{ route('dashboard.users.show', $notification->notifiable_id) }}">
                                                                            {{ $notification->data['data_send_create'] }}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            @foreach (Auth::user()->readNotifications as $notification)
                                                <div class="card-body">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <div class="row g-3 align-items-center">
                                                                <a href="#" class="col-auto">
                                                                    <span class="avatar"
                                                                        style="background-image: url({{ Auth()->user()->getMedia('first_name')->last()? Auth()->user()->getMedia('photo_user')->last()->getUrl('mobile'): Auth()->user()->photo_user }})">
                                                                        <span class="badge bg-green"></span></span>
                                                                </a>
                                                                <div class="col text-truncate">
                                                                    <a href="{{ route('dashboard.users.show', $notification->data['data_send_id']) }}"
                                                                        class="text-reset d-block text-truncate">
                                                                        {{ $notification->data['data_send_name'] }}
                                                                    </a>
                                                                    <div class="text-muted text-truncate mt-n1">
                                                                        {{ display($notification->data['message']) }}
                                                                        <a
                                                                            href="{{ route('dashboard.users.show', $notification->notifiable_id) }}">
                                                                            {{ $notification->data['data_send_create'] }}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
