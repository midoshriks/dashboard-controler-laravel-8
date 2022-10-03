<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ display('create users') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mr-lg-5">
                            <h3 class="card-title">{{ display('Form Admin or User ') }}</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                <path d="M16 11h6m-3 -3v6"></path>
                            </svg>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.users.store') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('post') }}

                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-md-12">
                                        <label class="form-label required">{{ display('first name') }}</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="first_name"
                                                value="firts name" placeholder="Enter First name">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-md-12">
                                        <label class="form-label required">{{ display('last name') }}</label>
                                        <div>
                                            <input type="text" class="form-control" name="last_name"
                                                value="last name" placeholder="Enter last name">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-md-12">
                                        <label class="form-label required">{{ display('Phone user') }}</label>
                                        <div>
                                            <input type="number" class="form-control" name="phone" value="012000000"
                                                placeholder="+020--- -- --">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-md-12">
                                        <label class="form-label required">{{ display('date of birth') }}</label>
                                        <input type="date" name="dob_date" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-md-12">
                                        <div>
                                            <div class="mb-3">
                                                <div class="form-label">{{ display('Select Role') }}</div>
                                                <select class="form-select" name="role_permissions">
                                                    <option value="">chooes</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{$type->name}}">{{ display($type->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-label">{{ display('Select gender') }}</div>
                                            <select class="form-select" name="gender">
                                                <option value="">{{ display('chooes') }}</option>
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
                                                <option value="{{ $select_country->id }}">
                                                    {{ $select_country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-3 ">
                                    <label class="form-label required">{{ display('Email address') }}</label>
                                    <div>
                                        <input type="email" class="form-control" aria-describedby="emailHelp"
                                            name="email" placeholder="Enter email">
                                        <small
                                            class="form-hint">{{ display("We'll never share your email with anyone else.") }}</small>
                                    </div>
                                </div>
                                <div class="form-group mb-3 ">
                                    <label class="form-label required">{{ display('Password') }}</label>
                                    <div>
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password">
                                        <small class="form-hint">
                                            {{ display('Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.') }}
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group mb-3 ">
                                    <label class="form-label required">{{ display('Re Password') }}</label>
                                    <div>
                                        <input type="password" class="form-control" placeholder="Retype Password"
                                            name="password_confirmation">
                                    </div>
                                </div>

                                @php
                                    $models = ['users', 'qoution'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <div class="row">
                                    <div class="col-lg-12">
                                        {{-- @mido_shriks_tabs --}}
                                        <div class="card">
                                            {{-- haeder tabs --}}
                                            <ul class="nav nav-tabs">
                                                @foreach ($models as $index => $model)
                                                    <li class="nav-item {{ $index == 0 ? 'active' : '' }}">
                                                        <a href="#{{ $model }}"
                                                            class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                                            data-toggle="tab">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                                            </svg>
                                                            {{ $model }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            {{-- haeder tabs --}}

                                            {{-- body tabs --}}
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    @foreach ($models as $index => $model)
                                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}"
                                                            id="{{ $model }}">

                                                            @foreach ($maps as $map)
                                                                <label style="margin-right: 20px;">
                                                                    <input type="checkbox" name="permissions[]"
                                                                        value="{{ $model . '_' . $map }}"
                                                                        id="">
                                                                    {{ $model . ' ' . $map }}
                                                                </label>
                                                            @endforeach

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            {{-- body tabs --}}

                                        </div>
                                    </div>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{ display('Close') }}</button>
                <button type="submit" class="btn btn-primary"
                    data-bs-dismiss="modal">{{ display('Save') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
