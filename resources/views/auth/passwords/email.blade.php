@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @include('templates.messages')

                    {!! Form::open([
                            'method' => 'POST',
                            'role' => 'form',
                            'class' => 'forgot-password',
                            'name' => 'forgot-password',
                            'id' => 'forgot-password',
                            'files' => true,
                            'url' => route('password.email')
                        ])
                    !!}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'required', 'autofocus']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
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
    {!! Html::script('assets/js/forgot-password.js') !!}
@stop
