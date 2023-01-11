@extends('admin.layout.master')

@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center">AMENITY LIST PAGE</h2>
            </div><br/><br/>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('amenity.create') }}"> INSERT NEW AMENITY </a>
            </div><br/>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <p>{{ $message }}</p>
        </div>
    @endif
   
    @php
      $i = 0;
    @endphp

    <table class="table table-hover">
        <tr class="text-success">
            <th>No:</th>
            <th>Amenity:</th>
            <!-- <th>ProjectID:</th> -->
            <th width="17px">Show</th>
            <th width="22px">Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($amenities as $am)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $am->amenity }}</td>
            
                <form action="{{ route('amenity.destroy',$am->id) }}" method="POST" enctype="multipart/form-data" >
                    <td><a class="btn btn-info" href="{{ route('amenity.show',$am->id) }}"><i class="bi bi-eye-fill"></i></a>
                    <td><a class="btn btn-primary" href="{{ route('amenity.edit',$am->id) }}"><i class="bi bi-pencil-square"></i></a>
                    
                    @csrf
                    @method('DELETE')
                    <td><button type="submit" onclick="return confirm('Do you really want to delete amenity!')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>

                </form>
            
        </tr>
        @endforeach
    </table>
@endsection