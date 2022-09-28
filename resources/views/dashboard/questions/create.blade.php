<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ display('create questions') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mr-lg-5">
                            <h3 class="card-title m-1">{{ display('form question') }}</h3>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-question-mark" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4">
                                    </path>
                                    <line x1="12" y1="19" x2="12" y2="19.01"></line>
                                </svg>
                            </span>
                        </div>
                        <form action="{{ route('dashboard.questions.store') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post') }}
                            {{-- @mido_shriks body form --}}
                            <div class="card-body">
                                @include('partials._errors')

                                <div class="form-group mb-3 col-md-12 d-flex">
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('quantity products') }}</label>
                                        <div>
                                            <input type="text" class="form-control" name="name" value="how ? "
                                                placeholder="Enter questions ...?">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 m-1">
                                        <label class="form-label required">{{ display('type questions') }}</label>
                                        <div>
                                            <select class="form-select" name="type_question">
                                                <option value="">chooes</option>
                                                <option value="hard">{{ display('hard') }}</option>
                                                <option value="easy">{{ display('easy') }}</option>
                                                <option value="madem">{{ display('madem') }}</option>
                                                <option value="low">{{ display('low') }}</option>
                                            </select>
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
