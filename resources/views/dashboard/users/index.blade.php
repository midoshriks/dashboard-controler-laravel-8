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
                        {{ display('Dashboard') }}\{{ display('Users') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        {{-- <span class="d-none d-sm-inline">
                        <a href="#" class="btn btn-white">
                            New view
                        </a>
                    </span> --}}
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-large">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create new user
                        </a>
                        {{-- @mido_shriks --}}
                        @include('dashboard.users.create')
                        {{-- @mido_shriks --}}
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-large">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>{{ display('Name') }}</th>
                                        <th>{{ display('Title') }}</th>
                                        <th>{{ display('Role') }}</th>
                                        <th>{{ display('Status') }}</th>
                                        <th>{{ display('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex py-1 align-items-center">
                                                    <span class="avatar me-2">
                                                        <img src="{{ $user->getMedia('photo')->last()? $user->getMedia('photo')->last()->getUrl('mobile'): $user->image_path }}"
                                                            alt="">
                                                    </span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $user->first_name }}
                                                        </div>
                                                        <div class="text-muted"><a
                                                                href="{{ route('dashboard.users.show', $user->id) }}"
                                                                class="text-reset">{{ $user->email }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{ $user->phone }}</div>
                                                <div class="text-muted">{{ $user->country->name }}</div>
                                            </td>
                                            <td class="text-muted">
                                                {{-- Owner --}}
                                                @if ($user->role_permissions == 'super_admin')
                                                    {{ $user->role_permissions == 'super_admin' ? 'Owner' : 'Admin' }}
                                                @else
                                                    {{ $user->role_permissions == 'gaming' ? 'Gaming' : 'Admin' }}
                                                @endif
                                            </td>
                                            <td>
                                                {{-- @mido_shriks // button switch toggle actived laravel by sweetalert2 --}}
                                                <div class="mb-3">
                                                    <label class="form-check form-switch">
                                                        <!-- Rounded switch -->
                                                        <label class="switch">
                                                            <input class="form-check-input btn-active" type="checkbox"
                                                                {{ $user->status == 1 ? 'checked' : '' }}
                                                                data-form-id="user-active-{{ $user->id }}"
                                                                data-name-item="{{ $user->first_name }}">
                                                        </label>
                                                        {{-- form --}}
                                                        <form id="user-active-{{ $user->id }}" style="display: none"
                                                            action="{{ route('dashboard.user.active', $user->id) }}"
                                                            {{-- action="{{ route('dashboard.users.update', $user->id) }}" --}} method="POST"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('PUT')
                                                            <input name="status"
                                                                value="{{ $user->status == 1 ? 0 : 1 }}">
                                                            <input type="submit" value="save">
                                                        </form>
                                                        {{-- form --}}
                                                        {{-- front_end button --}}
                                                        {{-- <input class="form-check-input" type="checkbox" $user->status == 1 ? 'checked' : '' }}> --}}
                                                        {{-- front_end bouuten --}}
                                                    </label>
                                                </div>
                                                {{-- @mido_shriks // button switch toggle actived laravel by sweetalert2 --}}
                                            </td>
                                            <td>
                                                <div class="col-auto">
                                                    <div class="dropdown">
                                                        <a href="#" class="btn-action" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <circle cx="12" cy="12" r="1" />
                                                                <circle cx="12" cy="19" r="1" />
                                                                <circle cx="12" cy="5" r="1" />
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                                                class="dropdown-item">Edit</a>
                                                            {{-- <a href="#"  class="dropdown-item text-danger">Delete</a> --}}

                                                            <a href="javascript:;"
                                                                class="dropdown-item text-danger btn-delet"
                                                                data-form-id="user-delete-{{ $user->id }}"
                                                                data-name-item="{{ $user->first_name }}">
                                                                Delete
                                                            </a>

                                                            <form id="user-delete-{{ $user->id }}"
                                                                action="{{ route('dashboard.users.destroy', $user->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>

                                                            {{-- <form
                                                                action="{{ route('dashboard.users.destroy', $user->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                {{ csrf_field() }}
                                                                {{ method_field('delete') }}

                                                                <button href="#"
                                                                    class="dropdown-item text-danger">Delete</button>
                                                            </form> --}}
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- function delelet users by seetalret2 --}}
    {{-- <script>
        $('.btn-delet').click(function(){
        let form_id = $(this).data('form-id');
        let name_val = $(this).data('name-item');
        swal({
            title: "Are you sure " + name_val +'?',
            text: "Once deleted, " + name_val + "  you will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete !",
            cancelButtonText: "No, cancel !",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                $('#' + form_id).submit();
                swal("Deleted!", "Your imaginary file has been deleted."+ name_val, "success");
            } else {
                swal("Cancelled", "Your imaginary file is safe "+ name_val, "error");
            }
        });
    });
    </script> --}}

    {{-- Sizebox container html --}}
    {{-- <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

            </div>
        </div>
    </div> --}}
@endsection
