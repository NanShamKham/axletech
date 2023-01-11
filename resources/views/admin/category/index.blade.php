@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h2 class="text-secondary m-3 p-3">CATEGORY LIST PAGE</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create Category</a>
            </div><br>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
         <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <span>{{ $message }}</span>
    </div>
    @endif
    
    @php
        $i = 0;
    @endphp

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>CategoryName</th>
            <th>CategoryID</th>
            <th width="10px">Show</th>
            <th width="13px">Edit</th>
            <th width="15px">Delete</th>
        </tr>
        @foreach ($categories as $c)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $c->category_name }}</td>
            <td>{{ $c->category_id }}</td>
            <form action="{{ route('category.destroy',$c->category_id) }}" method="POST">
            <td><a class="btn btn-info" href="{{ route('category.show',$c->category_id) }}"><i class="bi bi-eye-fill"></i></a>
            <td><a class="btn btn-primary" href="{{ route('category.edit',$c->category_id) }}"><i class="bi bi-pencil-square"></i></a>
            @csrf
            @method('DELETE')
            <td><button type="submit" onclick="return confirm('Do you really want to delete category!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
        </tr>
        @endforeach
    </table>
@endsection