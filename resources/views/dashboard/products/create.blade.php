<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ display('create products') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mr-lg-5">
                            <h3 class="card-title m-1">{{ display('form product') }}</h3>
                            <span>
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
                            </span>
                        </div>
                        <form action="{{ route('dashboard.products.store') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            {{-- @mido_shriks body form --}}
                            <div class="card-body">
                                @include('partials._errors')

                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('name products') }}</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="name" value="gold"
                                                placeholder="Enter products name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('quantity products') }}</label>
                                        <div>
                                            <input type="text" class="form-control" name="quantity" value="90.Kg"
                                                placeholder="Enter quantity products ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('price products') }}</label>
                                        <div>
                                            <input type="number" class="form-control" name="price" value="1000"
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
