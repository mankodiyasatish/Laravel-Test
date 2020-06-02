@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File Details</div>

                <div class="card-body text-center">

                    <div class="clearfix"><strong>File Name</strong>: {{ $file->original_file_name }}</div>
                    <div class="clearfix mt-2"><strong>Uploaded Date</strong>: {{ date('d/m/Y H:i:s', strtotime($file->created_at)) }}</div>
                    @if(Auth::user())
                        <div class="clearfix mt-4"><a href="{{ route('files.download', $file->short_name) }}" class="btn btn-secondary btn-sm">Download</a> <a href="{{ route('files.index') }}" class="btn btn-primary btn-sm">Back to Files</a></div>
                    @else
                        <div class="clearfix mt-4"><a href="{{ route('file.download', $file->short_name) }}" class="btn btn-secondary btn-sm">Download</a></div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
