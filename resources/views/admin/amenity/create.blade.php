@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1 class="text-center text-secondary">Add New Amenity</h1>
        </div><br/>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('amenity.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group m-3 p-3">
                <label for="">Amenity</label>
                <input type="text" name="amenity" class="form-control">
            </div>
        </div>

        <div class="m-2 p-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('amenity.index') }}"> Cancel</a>
        </div>
    </div>
</form>
@endsection

