@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-lg-11">
            <h2 class="text-center text-secondary p-3 m-3">FACEBOOK POSTLINK FORM</h2>
    </div>
    
</div>

        <table class="table table-bordered">
            <tr>
                <!-- <th>Project ID:</th> -->
                <th>Project Post Link:</th>
                <th>Image</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>{{ $facebooklink->project_post_link }}</td>
                <td>
                    <img src="{{ url('images/fb-images/'.$facebooklink->picture) }}" alt="image" style="width:150px; height:150px;">
                </td>
                <td>{{ $facebooklink->description }}</td>
            </tr>
        </table>

        <div class="col-lg-1">
            <a class="btn btn-danger" href="{{ route('facebooklink.index') }}" onclick="return confirm('Do you really want to back!')"> Back</a>
        </div>
@endsection
