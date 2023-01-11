@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Slider Page</h2>

        </div>
        <div class="col-lg-1">
            <a class="btn btn-danger" href="{{  route('slider.index') }}"> Back</a>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Image:</th>

        </tr>
        <tr>
            <td>{{$slider->id}}</td>
            <td><img src="{{ url('uploads/slider/'.$slider->image) }}" alt="image" style="width:150px; height:150px;"></td>
        </tr>

    </table>

@endsection
