<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ display('create products ' . $type) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mr-lg-5">
                            <h3 class="card-title m-1">{{ display('form product ' . $type) }}</h3>
                            @if ($type == 'coin')
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-coin-bitcoin" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <path
                                            d="M9 8h4.09c1.055 0 1.91 .895 1.91 2s-.855 2 -1.91 2c1.055 0 1.91 .895 1.91 2s-.855 2 -1.91 2h-4.09">
                                        </path>
                                        <path d="M10 12h4"></path>
                                        <path d="M10 7v10v-9"></path>
                                        <path d="M13 7v1"></path>
                                        <path d="M13 16v1"></path>
                                    </svg>
                                </span>
                            @else
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <line x1="12" y1="17" x2="12" y2="17.01">
                                        </line>
                                        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4"></path>
                                    </svg>
                                </span>
                            @endif
                        </div>
                        <form action="{{ route('dashboard.products.store') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            {{-- @mido_shriks body form --}}
                            <div class="card-body">
                                @include('partials._errors')
                                <div class="col-sm-12 m-1 d-none">
                                    <input type="hidden" value="{{ $type }}" name="type">
                                    <label class="form-label required">{{ display('type') }}</label>
                                    <div>
                                        <select class="form-select" name="type_id">
                                            <option value="">chooes</option>
                                            @foreach ($types as $product_type)
                                                <option {{ $product_type->name == $type ? 'selected' : '' }}
                                                    value="{{ $product_type->id }}">{{ display($product_type->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if ($type == 'helper')
                                    <div class="col-sm-12 m-1 {{ $type == 'helper' ? '' : 'd-none' }}">
                                        <label class="form-label required">{{ display('helper') }}</label>
                                        <div>
                                            <select class="form-select" name="helper_id">
                                                <option value="">chooes</option>
                                                @foreach ($helpers as $helper)
                                                    <option value="{{ $helper->id }}">{{ display($helper->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endIf
                                <div class="form-group mb-3 col-md-12 d-flex">

                                    <div class="col-sm-12 m-1">
                                        <label
                                            class="form-label required">{{ display('quantity products ' . $type) }}</label>
                                        <div>
                                            <input type="text" class="form-control" name="quantity" value="2"
                                                placeholder="Enter quantity products">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-sm-12 m-1">
                                        <label
                                            class="form-label required">{{ display('price products ' . $type) }}</label>
                                        <div>
                                            <input type="number" class="form-control" name="price" value="100"
                                                placeholder="Enter price products ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- @mido_shriks footer body --}}
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto"
                                    data-bs-dismiss="modal">{{ display('Close') }}</button>
                                <button type="submit" class="btn btn-primary"
                                    data-bs-dismiss="modal">{{ display('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
