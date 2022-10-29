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
                        <img src="{{ asset('dashboard/src/static/smart_logo.png')}}" width="60" alt="" srcset="">
                        {{ display('Smart bucks') }}
                    </div>
                    <h2 class="page-title">
                        {{ display('Dashboard') }} \ {{ display('product') }} \ {{ display('edit') }} \
                        {{ $product->name }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    {{-- Sizebox container html --}}
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="modal-content">
                    <div class="col-md-4">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                {{ display('edit product : ') }}
                                {{ $product->name }} </h5>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="modal-body align-self-center">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="margin-right: 5px;">{{ display('form edit product ') }}
                                    </h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                    </svg>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                        <line x1="12" y1="12" x2="20" y2="7.5" />
                                        <line x1="12" y1="12" x2="12" y2="21" />
                                        <line x1="12" y1="12" x2="4" y2="7.5" />
                                        <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                    </svg>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('dashboard.products.update', $product->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        @include('partials._errors')

                                        <div class="col-sm-12 m-1 d-none">
                                            <input type="hidden" value="{{ $type }}" name="type">
                                            <label class="form-label required">{{ display('type') }}</label>
                                            <div>
                                                <select class="form-select" name="type_id">
                                                    <option value="">chooes</option>
                                                    @foreach ($types as $product_type)
                                                        <option {{ $product_type->name == $type ? 'selected' : '' }}
                                                            value="{{ $product_type->id }}">
                                                            {{ display($product_type->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @if ($type == 'helper' || 'coin')
                                            <div class="col-sm-12 m-1 {{ $type == 'helper' ? '' : 'd-none' }}">
                                                <label class="form-label required">{{ display('helper') }}</label>
                                                <div>
                                                    <select class="form-select" name="helper_id">
                                                        <option value="">chooes</option>
                                                        @foreach ($helpers as $helper)
                                                            <option {{$helper->id == $product->helper_id ? 'selected' : ''}} value="{{ $helper->id }}"> {{ display($helper->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endIf
                                        <div class="form-group mb-3 col-md-12 d-flex">
                                            <div class="col-sm-6 m-1">
                                                <label
                                                    class="form-label required">{{ display('quantity product') }}</label>
                                                <div>
                                                    <input type="text" class="form-control" name="quantity"
                                                        value="{{ $product->quantity }}"
                                                        placeholder="Enter quantity product">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 m-1">
                                                <label class="form-label required">{{ display('price product') }}</label>
                                                <div>
                                                    <input type="text" class="form-control" name="price"
                                                        value="{{ $product->price }}" placeholder="Enter price product">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3 ">
                                            <label class="form-label required">{{ display('image user') }}</label>
                                            <div>
                                                <input type="file" class="form-control" name="image">
                                                <small class="form-hint">
                                                    <img src="{{ $product->getFirstMediaUrl('photo_product') }}"
                                                        alt="" srcset="" width="160">
                                                </small>
                                            </div>
                                        </div>

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
@endsection
