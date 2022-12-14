@extends('layouts.dashboard.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            {{-- @mido_shriks show errors --}}
            @include('partials._errors')

            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            <img src="{{ asset('dashboard/src/static/smart_logo.png') }}" width="60" alt=""
                                srcset="">
                            {{ display('Smart bucks') }}
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{{ display('Home') }}</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.products.index') }}">{{ display($type) }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ display('Data ' . $type . ' tables') }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-12 col-md-auto ms-auto d-print-none">
                        <div class="btn-list">
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
                                {{ display('Create new products') }}
                            </a>
                            {{-- @mido_shriks --}}
                            @include('dashboard.products.create')
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
                                            <th>#</th>
                                            <th>{{ display('quantity') }}</th>
                                            <th>{{ display('price') }}</th>
                                            @if ($type == 'helper')
                                                <th>{{ display('helpers') }}</th>
                                            @endIf
                                            <th>{{ display('image') }}</th>
                                            <th>{{ display('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                            {{-- @dd($product->helper); --}}
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>
                                                    $ {{ $product->price }}
                                                </td>
                                                {{-- @mido_shriks show hlepe acive only  --}}
                                                @if ($type == 'helper')
                                                    <td>
                                                        <div class="datagrid-item">
                                                            <div class="datagrid-title">
                                                                {{ display(@$product->helper->name) }}</div>
                                                            <div class="datagrid-content">
                                                                @if (@$product->helper->status == 1)
                                                                    <span
                                                                        class="status status-green">{{ display('Active') }}</span>
                                                                @else
                                                                    <span
                                                                        class="status status-red">{{ display('Non-Active') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>

                                                @endif
                                                <td>
                                                    {{-- @dd($product->photo_product) --}}
                                                    <span class="avatar me-2">
                                                        <img src="{{ $product->getMedia('photo_product')->last()? $product->getMedia('photo_product')->last()->getUrl('mobile'): $product->photo_product }}"
                                                            alt="">
                                                    </span>
                                                </td>
                                                {{-- @mido_shriks show hlepe acive only --}}
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
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <circle cx="12" cy="12"
                                                                        r="1" />
                                                                    <circle cx="12" cy="19"
                                                                        r="1" />
                                                                    <circle cx="12" cy="5"
                                                                        r="1" />
                                                                </svg>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a href="{{ route('dashboard.products.edit', ['product' => $product->id, 'type' => $product->type->name]) }}"
                                                                    class="dropdown-item">Edit</a>

                                                                <a href="javascript:;"
                                                                    class="dropdown-item text-danger btn-delet"
                                                                    data-form-id="product-delete-{{ $product->id }}"
                                                                    data-name-item="{{ $product->name }}">
                                                                    {{ display('Delete') }}
                                                                </a>

                                                                <form id="product-delete-{{ $product->id }}"
                                                                    action="{{ route('dashboard.products.destroy', ['product' => $product->id, 'type' => $product->type->name]) }}"
                                                                    method="POST" style="display: inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="">
                                    {{ $products->appends(['type' => $type])->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
