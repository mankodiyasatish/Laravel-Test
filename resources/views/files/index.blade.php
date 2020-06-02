@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Files</div>

                <div class="card-body">
                    @include('templates.messages')

                    <div class="clearfix mb-3">
                        <a href="{{ route('files.create') }}" class="btn btn-primary">
                            UPLOAD FILES
                        </a>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">File Name</th>
                                <th scope="col"># of Downloads</th>
                                <th scope="col">Uploaded Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{ $file->original_file_name }}</td>
                                    <td>{{ $file->number_of_downloads }}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($file->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('files.show', $file->short_name) }}" class="btn btn-primary btn-sm">Details</a>
                                        <a href="{{ route('files.download', $file->short_name) }}" class="btn btn-secondary btn-sm">Download</a>
                                        <a data-id="{{ $file->id }}" href="#" class="btn btn-danger btn-sm delete-file-btn">Delete</a>
                                        <button data-clipboard-text="{{ route('file.catch', $file->short_name) }}" href="#" class="btn btn-info btn-sm copy-btn">Copy Link</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::open(array('role' => 'form', 'method' => 'delete', 'route' => array('files.index'), 'id' => 'delete-file')) !!}
{!! Form::close() !!}
@endsection

@section('styles')
    {!! Html::style('assets/vendors/swal/sweetalert2.min.css') !!}
@stop

@section('scripts')
    {!! Html::script('assets/vendors/swal/sweetalert2.min.js') !!}
    {!! Html::script('assets/vendors/clipboard/clipboard.min.js') !!}
    {!! Html::script('assets/js/files.js') !!}
@stop
