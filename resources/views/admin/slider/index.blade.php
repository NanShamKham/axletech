@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Slider</h4>
                    <a href="{{route('slider.create')}}" class="btn btn-primary float-end">Create</a>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $item )

                            <tr>
                                <td>{{$item->id}}</td>
                                <td><img src="{{asset('uploads/slider/'.$item->image)}}" style="height: 130px; width: 150px;"  alt="Image"></td>
                                <form action="{{ route('slider.destroy',$item->id) }}" method="POST">
                                    <td><a class="btn btn-info" href="{{ route('slider.show',$item->id) }}"><i class="bi bi-eye-fill"></i></a>
                                    <td><a class="btn btn-primary" href="{{ route('slider.edit',$item->id) }}"><i class="bi bi-pencil-square"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <td><button type="submit" onclick="return confirm('Do you really want to delete slider!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
