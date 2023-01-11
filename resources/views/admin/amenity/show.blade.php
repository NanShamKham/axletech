@extends('admin.layout.master')

@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left p-4 m-4">
                <h1 class="text-center text-primary"> Show Amenity</h1>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-center">
                <!-- <div class="card-body"> -->
                    <strong>Amenity:</strong> &nbsp; &nbsp; &nbsp; &nbsp;
                    <b>[ {{ $amenity->amenity }} ]</b>
                <!-- </div> -->
            </div>
        </div>
        <div class="p-2 m-2"></div>
        <div class="text-center"><a class="btn btn-danger" href="{{ route('amenity.index') }}"> Cancel</a></div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12 p-5 m-1">
            <div class="form-group text-success text-center">
                <h4><strong><i>ProjectID::</i></strong> &nbsp; &nbsp; &nbsp;
                {{ $amenity->facility }}</h4></br>
                
            </div>
        </div> -->
    </div>
@endsection