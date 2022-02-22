@extends('layouts.admin')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title"><i class="fa fa-building"></i> New Business</div>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.business.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Business Information</header>
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="name" name="name" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-user"></i>
                                            Name:</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="tel" id="id" name="phone" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-id-card"></i> Phone</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="email" id="email" name="email" required>
                                        <label class="mdl-textfield__label"><i class="fa fa-envelope"></i> Email
                                            Address:</label>
                                        <span class="mdl-textfield__error">Enter Valid Email Address!</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" type="text" id="rent" name="location" required>
                                        <label class="mdl-textfield__label"> Location</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <textarea class="mdl-textfield__input" type="text" name="description"></textarea>
                                        <label class="mdl-textfield__label"><i class="fa fa-pen"></i>
                                            Description<small>(Optional)</small></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="button" onclick="window.location='/'"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default btn-block">Cancel</button>

                                    <button type="submit" id="add_tenant"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card box">
                            <div class="card-head">
                                <header>Business Logo <span class="text-danger">*</span> </header>
                            </div>
                            <div class="card-body" id="bar-parent">
                                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                    id="logo-dropzone">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- end page content -->
    </div>
@endsection
@section('js')
    <script>
        Dropzone.options.logoDropzone = {
            url: '{{ route('admin.business.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function(file, response) {
                $('form').find('input[name="logo"]').remove()
                $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($showroomLogo) && $showroomLogo->logo)
                    var file = {!! json_encode($showroomLogo->logo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
