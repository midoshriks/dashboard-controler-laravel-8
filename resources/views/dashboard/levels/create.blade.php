<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ display('create level') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mr-lg-5">
                            <h3 class="card-title m-1">{{ display('form levels') }}</h3>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
                                    <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
                                    <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
                                    <line x1="11" y1="6" x2="20" y2="6"></line>
                                    <line x1="11" y1="12" x2="20" y2="12"></line>
                                    <line x1="11" y1="18" x2="20" y2="18"></line>
                                </svg>
                            </span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.levels.store') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                @include('partials._errors')

                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('name level') }}</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="name" value="one"
                                                placeholder="Enter level name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('rewards level') }}</label>
                                        <div>
                                            <input type="text" class="form-control" name="rewards" value="$1000"
                                                placeholder="Enter rewards level ">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{ display('Close') }}</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{ display('Save') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
