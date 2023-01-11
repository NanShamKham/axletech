@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h1 class="text-secondary">Facebook Link Form</h1>
            </div><br/><br/>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('facebooklink.create') }}"> Create</a>
            </div><br/>
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
            <th>Image</th>
            <th>Project Post Link</th>
            <th>Description</th>
            <th width="16px">Show</th>
            <th width="19px">Edit</th>
            <th width="22px">Delete</th>
        </tr>
        @foreach ($facebooklinks as $f)
        <tbody>
        <tr>
            <td>{{ ++$i }}</td>
            <td>
                <img src="{{asset('images/fb-images/'.$f->picture)}}" style="height: 130px; width: 150px;"  alt="Image">
            </td>
            <td>{{ $f->project_post_link }}</td>
            <td>{{ $f->description }}</td>
            <form action="{{ route('facebooklink.destroy',$f->id) }}" method="POST">
            <td><a class="btn btn-info" href="{{ route('facebooklink.show',$f->id) }}"><i class="bi bi-eye-fill"></i></a>
            <td><a class="btn btn-primary" href="{{ route('facebooklink.edit',$f->id) }}"><i class="bi bi-pencil-square"></i></a>
            @csrf
            @method('DELETE')
            <td><button type="submit" onclick="return confirm('Do you really want to delete link!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
        </tr>
        @endforeach
    </table>
@endsection
