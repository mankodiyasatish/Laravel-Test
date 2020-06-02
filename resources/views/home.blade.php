@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('files.create') }}" class="btn btn-primary">
                        UPLOAD FILES
                    </a>

                        <a href="{{ route('files.index') }}" class="btn btn-primary">
                            MY FILES
                        </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
