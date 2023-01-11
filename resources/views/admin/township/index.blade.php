@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center p-3 m-3">
                <h3>LIST FOR TOWNSHIP PAGE</h3>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('township.create') }}"> Create TownShip</a>
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
            <th>TownShip Name</th>
            <!-- <th>City Name</th> -->
            <th width="15px">Show</th>
            <th width="17px">Edit</th>
            <th width="20px">Delete</th>
        </tr>
        @foreach ($towns as $t)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $t->name }}</td>
            
            <form action="{{ route('township.destroy',$t->slug) }}" method="POST">
            <td><a class="btn btn-info" href="{{ route('township.show',$t->slug) }}"><i class="bi bi-eye-fill"></i></a>
            <td><a class="btn btn-primary" href="{{ route('township.edit',$t->slug) }}"><i class="bi bi-pencil-square"></i></a>
            @csrf
            @method('DELETE')
            <td><button type="submit" onclick="return confirm('Do you really want to delete township!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
        </tr>
        @endforeach
    </table>
@endsection