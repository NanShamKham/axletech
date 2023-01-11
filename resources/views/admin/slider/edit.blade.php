@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">


            @if(Session::has('status'))
          <div class="alert alert-success alert-dismissible fade show " role="alert">
            {{Session::get('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit photo in Slider
                    <a href="{{route('slider.index')}}" class="btn btn-danger float-end">Back</a>
                </h4>
                </div>
                <div class="card-body">

                    <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" value="{{$slider->image}}" class="form-control">
                            <img src="{{asset('uploads/slider/'.$slider->image)}}" style="height: 130px; width: 150px;"  alt="Image">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
