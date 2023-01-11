@extends('admin.layout.master')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-center text-primary">Update Amenity</h2>
            </div>
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
  
    <form action="{{ route('amenity.update',$amenity->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group m-3 p-3">
                <label for="">Amenity</label>
                <input type="text" name="amenity" value="{{ $amenity->amenity }}"class="form-control">
            </div>
            </div>
            
            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <a class="btn btn-danger" href="{{ route('amenity.index') }}"> Cancel</a>
              <button type="submit" class="btn btn-primary" onclick="return confirm('Do you really want to update amenity!')">Update</button>
            </div>
        </div>
    </form>

@endsection


