@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-secondary text-center m-3 p-3">EDIT CATEGORY</h2>
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

    <form action="{{ route('category.update',$category->category_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CategoryName:</strong>
                <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" placeholder="First name">
            </div>
        </div>
        <div class="m-2 p-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-danger" href="{{ route('category.index') }}"> Cancel</a>
            <button type="submit" class="btn btn-success" onclick="return confirm('Do you really want to update category!')">Update</button>
        </div>
    </div>
    </form>
@endsection