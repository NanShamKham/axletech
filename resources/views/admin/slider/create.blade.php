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


              <h4 class="text-center"><strong>Add photo in Slider</strong></h4>
            <div class="card">
                <div class="card-header">

                    <a href="{{route('slider.index')}}" class="btn btn-danger float-end">Back</a>
                </h4>
                </div>

                <div class="card-body">

                    <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image"  class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
