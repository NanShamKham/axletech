@extends('admin.layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

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
        <div class="card-header">
            <h2 class="text-center text-secondary">FACEBOOK POSTLINK UPDATE FORM</h2>
        </div>
        <div class="card-body">
    <form action="{{ route('facebooklink.update',$facebooklink->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            
            <div class="m-2 p-1"></div>
            <div class="form-group mb-3">
                <label for="">Image</label>
                <input type="file" name="picture" value="{{$facebooklink->picture}}" class="form-control">
                <img src="{{asset('images/fb-images/'.$facebooklink->picture)}}" style="height: 130px; width: 150px;"  alt="Image">
            </div>

            <div class="m-2 p-1"></div>
            <div class="form-group">
                <strong>Facebook Post Link:</strong>
                <textarea class="form-control" id="project_post_link" name="project_post_link" rows="4" placeholder="Your FacebookPostLink">{{$facebooklink->project_post_link}}</textarea>
            </div>

            <div class="m-2 p-1"></div>
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" id="description" name="description" rows="10" placeholder="description">{{$facebooklink->description}}</textarea>
            </div>

            
            <div class="form-group mb-3 text-center">
                <button type="submit" class="btn btn-success" onclick="return confirm('Do you really want to update link!')">Update</button>
                <a class="btn btn-danger" href="{{ route('facebooklink.index') }}" onclick="return confirm('Do you really want to back!')"> Cancel</a>
            </div>
        </div>

    </div>
    </form>
</div>
</div>
        </div>
    </div>
</div>
@endsection
