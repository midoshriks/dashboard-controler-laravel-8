@extends('layouts.dashboard.app')

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
                                <a href="#home" class="list-group-item list-group-item-action d-flex align-items-center">
                                    {{ display('My Notifications') }}
                                </a>
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

                        <section id="profile">
                            <div class="card-body">
                                <h2 class="mb-4">My Account</h2>
                                <h3 class="card-title">Profile Details</h3>
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="avatar avatar-xl"
                                            style="background-image: url({{ $profile->getMedia('photo_user')->last()? $profile->getMedia('photo_user')->last()->getUrl('mobile'): $profile->photo_user }})"></span>
                                    </div>
                                    {{-- <div class="col-auto"><a href="#" class="btn">
                                            Change avatar
                                        </a></div>
                                    <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                                            Delete avatar
                                        </a></div> --}}
                                </div>
                                <h3 class="card-title mt-4">Business Profile</h3>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Business Name</div>
                                        <input type="text" class="form-control"
                                            value="{{ $profile->first_name . ' ' . $profile->last_name }}">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Business ID</div>
                                        <input type="text" class="form-control" value="{{ $profile->code_membership }}">
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Location</div>
                                        <input type="text" class="form-control" value="{{ $profile->country->name }}">
                                    </div>
                                </div>
                                <h3 class="card-title mt-4">Email</h3>
                                <p class="card-subtitle">This contact will be shown to others publicly, so choose it carefully.
                                </p>
                                <div>
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <input type="text" class="form-control" value="{{ $profile->email }}">
                                        </div>
                                        <div class="col-auto"><a href="#" class="btn">
                                                Change
                                            </a></div>
                                    </div>
                                </div>
                                <h3 class="card-title mt-4">Password</h3>
                                <p class="card-subtitle">You can set a permanent password if you don't want to use temporary
                                    login codes.</p>
                                <div>
                                    <a href="#" class="btn">
                                        Set new password
                                    </a>
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
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <a href="#" class="btn">
                                        Cancel
                                    </a>
                                    <a href="#" class="btn btn-primary">
                                        Submit
                                    </a>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
