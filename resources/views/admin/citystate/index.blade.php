@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center p-3 m-3">
                <h2 class="text-secondary">LIST FOR CITY & STATE PAGE</h2>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('citystate.create') }}"> Create City & State</a>
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
            <th>City & State</th>
            <th width="19px">Show</th>
            <th width="22px">Edit</th>
            <th width="25px">Delete</th>
        </tr>
        @foreach ($cities as $c)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $c->name }}</td>
            <form action="{{ route('citystate.destroy',$c->id) }}" method="POST">
            <td><a class="btn btn-info" href="{{ route('citystate.show',$c->id) }}"><i class="bi bi-eye-fill"></i></a>
            <td><a class="btn btn-primary" href="{{ route('citystate.edit',$c->id) }}"><i class="bi bi-pencil-square"></i></a>
            @csrf
            @method('DELETE')
            <td><button type="submit" onclick="return confirm('Do you really want to delete city&state!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
        </tr>
        @endforeach
    </table>
@endsection