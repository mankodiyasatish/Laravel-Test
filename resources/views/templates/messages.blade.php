@if (count($errors) > 0)
    <div class="clearfix"></div>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Whoops!</strong> There were some problems with your input.<br /><br />
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('message'))
    <div class="clearfix"></div>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Success!</strong> {{ session('message') }}
    </div>
@endif

@if (session('status'))
    <div class="clearfix"></div>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Success!</strong> {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="clearfix"></div>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Whoops!</strong> {{ session('error') }}
    </div>
@endif
