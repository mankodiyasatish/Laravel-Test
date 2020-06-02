@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {!! Form::open([
                            'method' => 'POST',
                            'role' => 'form',
                            'class' => 'registration',
                            'name' => 'registration',
                            'id' => 'registration',
                            'files' => true,
                            'url' => route('register')
                        ])
                    !!}
                        @include('templates.messages')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'id' => 'name', 'required' => 'required', 'autofocus']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmatino', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
    {!! Html::script('assets/js/register.js') !!}
@stop
