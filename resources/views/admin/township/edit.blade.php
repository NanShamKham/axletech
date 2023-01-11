@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left m-4 p-4">
                <h2 class="text-secondary text-center">Edit TownShip</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            <strong>Whoops!</strong> something we are problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('township.update',$town->slug) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TownShip Name:</strong>
                <input type="text" name="name" value="{{ $town->name }}" class="form-control" placeholder="township name">
            </div>
        </div>

        
        
        <div class="p-1 m-1"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-danger" href="{{ route('township.index') }}"> Cancel</a>
            <button type="submit" class="btn btn-success" onclick="return confirm('Do you really want to update township!')">Update</button>
        </div>
    </div>
    </form>
@endsection