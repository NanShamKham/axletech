@extends('admin.layout.master')

@section('content')
<div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left m-4 p-4">
                <h3>CITY & STATE DETAIL</h3>
            </div>
        </div>
    </div><br/><br/>
    <div class="row text-center">
        <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>City & State</th>
        </tr>
        @php
          $i = 0;
        @endphp
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$city->name}}</td>
        </tr>

    </table>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-danger" href="{{ route('citystate.index') }}"> Cancel</a>
        </div>
    </div>
@endsection