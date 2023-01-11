@extends('admin.layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <div class="text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Gallery
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary float-end">Add Photo</a>
                </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Project</th>
                                <th>Show</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $item )

                            <tr>
                                <td>{{$item->id}}</td>
                                <td>
                                    <img src="{{asset('images/360images/'.$item->image)}}" style="height: 130px; width: 150px;"  alt="Image">
                                </td>
                                <td>
                                    @foreach ($projects as $p)
                                        @if($p->id==$item->project_id)
                                         {{$p->project_name}}
                                        @endif
                                    @endforeach
                                </td>
                                <form action="{{ route('gallery.destroy',$item->id) }}" method="POST">
                                    <td><a class="btn btn-info" href="{{ route('gallery.show',$item->id) }}"><i class="bi bi-eye-fill"></i></a>
                                    <td><a class="btn btn-primary" href="{{ route('gallery.edit',$item->id) }}"><i class="bi bi-pencil-square"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <td><button type="submit" onclick="return confirm('Do you really want to delete gallery!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
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
