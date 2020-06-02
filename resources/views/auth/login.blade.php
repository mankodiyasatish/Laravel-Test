@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    {!! Form::open([
                            'method' => 'POST',
                            'role' => 'form',
                            'class' => 'login',
                            'name' => 'login',
                            'id' => 'login',
                            'files' => true,
                            'url' => route('login')
                        ])
                    !!}
                        @include('templates.messages')

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'required', 'autofocus']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {!! Form::checkbox('remember', '1', old('remember'), ['class' => 'form-check-input', 'id' => 'remember']) !!}
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
    {!! Html::script('assets/js/login.js') !!}
@stop
