@extends('admin.layout.master')

@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-secondary text-center p-5 m-5">CREATE CITY & STATE</h2>
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

    <form action="{{ route('citystate.store') }}" method="POST" enctype="multipart/form-data">
   		@csrf
    	<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>City & State:</strong>
                    <input type="text" name="name" class="form-control" placeholder="city & state">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center m-4 p-3">
            <a class="btn btn-danger" href="{{ route('citystate.index') }}"> Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
    </form>
@endsection