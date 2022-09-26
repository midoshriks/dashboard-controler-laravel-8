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
                            <h3 class="card-title m-1">{{ display('form Route api') }}</h3>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-api"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 13h5"></path>
                                    <path d="M12 16v-8h3a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-3"></path>
                                    <path d="M20 8v8"></path>
                                    <path d="M9 16v-5.5a2.5 2.5 0 0 0 -5 0v5.5"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dashboard.developers.store') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                @include('partials._errors')

                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('model') }}</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="model"
                                                placeholder="Enter name model">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('selevt type') }}</label>
                                        <div>
                                            <select class="form-select" name="type">
                                                <option value="">chooes</option>
                                                <option value="GET">{{ display('GET') }}</option>
                                                <option value="POST">{{ display('POST') }}</option>
                                                <option value="PUT">{{ display('PUT') }}</option>
                                                <option value="DELETE">{{ display('DELETE') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-sm-12 m-1">
                                        <label class="form-label required">{{ display('Route') }}</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="route_api" 
                                                placeholder="Enter route api">
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
