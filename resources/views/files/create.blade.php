@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Files</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open([
                            'method' => 'POST',
                            'role' => 'form',
                            'class' => 'upload-files',
                            'name' => 'upload-files',
                            'id' => 'upload-files',
                            'files' => true,
                            'url' => route('files.store')
                        ])
                    !!}
                        @include('templates.messages')
                        <div class="form-group row">
                            <label for="files" class="col-md-4 col-form-label text-md-right">{{ __('Files') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    {!! Form::file('file', ['class' => 'custom-file-input', 'id' => 'files', 'required' => 'required']) !!}
                                    <label class="custom-file-label" for="files">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>

                                <a href="{{ route('files.index') }}" class="btn btn-secondary">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('assets/vendors/validation/jquery.validate.min.js') !!}
    {!! Html::script('assets/vendors/validation/additional-methods.min.js') !!}
    {!! Html::script('assets/js/create-file.js') !!}
@stop
