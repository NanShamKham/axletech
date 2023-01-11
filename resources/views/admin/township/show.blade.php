@extends('admin.layout.master')

@section('content')
<div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left m-4 p-4">
                <h3>TOWNSHIP DETAIL</h3>
            </div>
        </div>
    </div><br/><br/>

    <div class="row">
        <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>TownShip Name</th>
            <!-- <th>City Name</th> -->
        </tr>
        @php
            $i = 0;
        @endphp
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$town->name}}</td>
        </tr>

    </table>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-danger" href="{{ route('township.index') }}"> Cancel</a>
        </div>
    </div>
@endsection