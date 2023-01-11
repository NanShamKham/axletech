@extends('admin.layout.master')

@section('content')
<div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-secondary text-center m-4 p-4"> Category Detail </h2>
            </div>
        </div>
    </div><br>
    <div class="row text-center">
        <center>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group m-1 p-1">
                <div class="card mb-3" style="width: 18rem;">
                    <strong class="text-primary">Category_ID:</strong><hr/> 
                    <i>{{ $category->category_id }}</i> 
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"> 
                <div class="card mb-3" style="width: 30rem;">
                    <strong class="text-primary">Category_NAME:</strong><hr/>
                    <i>{{ $category->category_name }}</i>
                </div>
            </div>
        </div>
        </center>
        <div class="m-2 p-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-danger" href="{{ route('category.index') }}"> Back</a>
        </div>
    </div>
@endsection