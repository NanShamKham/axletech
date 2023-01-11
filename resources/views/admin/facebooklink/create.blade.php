@extends('admin.layout.master')

@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center text-secondary p-3 m-3">CREATE FACEBOOK POSTLINK</h2>
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

    <div class="card">
    <div class="card-body">

    <form action="{{ route('facebooklink.store') }}" method="POST" enctype="multipart/form-data">
   		@csrf
    	<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                
                <div class="m-1 p-1"></div>
                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file" name="picture" class="form-control">
                </div>

                <div class="m-1 p-1"></div>
                <div class="form-group">
                    <strong>FacebookPostLink:</strong>
                    <textarea class="form-control" id="project_post_link" name="project_post_link" rows="4" placeholder="Facebook Post Link"></textarea>
                </div>

                <div class="m-1 p-1"></div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" id="description" name="description" rows="10" placeholder="description"></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center m-4 p-3">
            <button type="submit" class="btn btn-success">Create</button>
            <a class="btn btn-danger" href="{{ route('facebooklink.index') }}"> Cancel</a>
        </div>
    </div>
</div>
    </form>
</div>
@endsection
