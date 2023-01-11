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
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card">
                <div class="card-header">
                    <h4>Add photo in Gallery
                    <a href="{{ route('gallery.index')}}" class="btn btn-danger float-end">Back</a>
                </h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Project</label>
                            <div class="form-group">
                                <select name="id" class="col-sm-5 p-1">
                                    @foreach ($projects as $p)
                                        <option value="{{$p->id}}">{{$p->project_name}}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
