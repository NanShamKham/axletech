@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2 class="text-secondary text-center">GALLERY PAGE</h2>
        </div>
    </div>
    <br/><br/>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Gallery Image:</th>
            <th>Project Name</th>

        </tr>
        <tr>
            <td>{{$gallery->id}}</td>
            <td><img src="{{ url('images/360images/'.$gallery->image) }}" alt="image" style="width:150px; height:150px;">
            </td>
            <td>
                @foreach ($projects as $p)
                    @if($p->id==$gallery->project_id)
                        {{$p->project_name}}
                    @endif
                @endforeach
            </td>
        </tr>
    </table>

        <div class="col-lg-1">
            <a class="btn btn-danger" href="{{ route('gallery.index') }}"> Back</a>
        </div>
@endsection
