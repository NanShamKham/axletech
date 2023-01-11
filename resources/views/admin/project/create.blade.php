@extends('admin.layout.master')

<!-- @section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection{
            height: 2000px !important;
        }
    </style>
@endsection -->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="text-center text-secondary">CREATE YOUR PROJECT</h1><br/><br/>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <strong>Whoops!</strong> something we are problems with your input.<br/><br/>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif

    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container bg-info">
        <div class="row align-items-start">
        <div class="col">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ProjectName:</strong>
                    <input type="text" name="project_name" class="form-control" placeholder="project name">
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>360-Images: <i class="text-danger"></i></strong>
                    <input type="file" name="gallery" class="form-control" placeholder="Gallery">
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cover Image: <i class="text-danger">[your image-size need to be (width:474;height:664;)]</i></strong>
                    <input type="file" name="cover" class="form-control" placeholder="Image">
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Images: <i class="text-danger">[**Cannot upload more than 9-images!]</i></strong>
                    <input type="file" id="input-file-now-custom-3" class="form-control" name="images[]" multiple>
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Price:</strong>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Price" aria-label="Price" name="lower_price">
                        <span class="input-group-text">TO</span>
                    <input type="number" class="form-control" placeholder="Price" aria-label="Price" name="upper_price">
                </div>
            </div>

            <!-- <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>LongiTude:</strong>
                <input type="text" name="longitude" class="form-control" placeholder="LongiTude">
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>LatiTude:</strong>
                <input type="text" name="latitude" class="form-control" placeholder="LatiTude">
                </div>
            </div> -->
            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="category">Choose Your City:</strong>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <strong for="category">Choose Your Township:</strong>
                <div class="form-group">
                    <select name="city_slug" class="col-sm-5 p-1">
                        @foreach ($cities as $c)
                        <option value="{{$c->slug}}">{{$c->name}}</option>
                        @endforeach
                    </select> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <select name="town_slug" class="col-sm-5 p-1">
                        @foreach ($towns as $t)
                        <option value="{{$t->slug}}">{{$t->name}}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>House No:</strong>
                <input type="text" name="hou_no" class="form-control" placeholder="House No">
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Street:</strong>
                <input type="text" name="street" class="form-control" placeholder="Street">
                </div>
            </div>

            <div class="m-2 p-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Ward:</strong>
                <input type="text" name="ward" class="form-control" placeholder="Ward">
                </div>
            </div>
        </div>

        <div class="col-1"></div>

        <div class="col">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="category">Choose Your Category:</strong>
                <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <strong for="category">Choose Your Township:</strong> -->
                <div class="form-group">
                    <select name="category_id" class="col-sm-5 p-1">
                        @foreach ($categories as $c)
                        <option value="{{$c->category_id}}">{{$c->category_name}}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Google Map Link:</strong>
                    <textarea class="form-control" id="gmlink" name="gmlink" rows="10" placeholder="Googel Map Link"></textarea>
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Progress:</strong>
                <input type="text" name="progress" class="form-control" placeholder="Progress">
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>SquareFeet:</strong>
                <input type="text" name="squre_feet" class="form-control" placeholder="SquareFeet">
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>ProjectNumber:</strong>
                <input type="number" min="1" name="project_id_number" class="form-control" placeholder="ProjectIdNumber">
                </div>
            </div>

            <div class="m-2 p-3"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Layer:</strong>
                <input type="text" name="layer" class="form-control" placeholder="Layer">
                </div>
            </div>
        </div>
        </div>
    </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="amenity">Choose Your Amenity:</strong>
                <div class="form-group">
                    <select class="amenity related-post form-control" name="amenity[]" multiple required>
                        @foreach ($amenities as $am)
                            <option value="{{$am->id}}">{{$am->amenity}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" id="description" name="description" rows="10" placeholder="Your Description"></textarea>
                </div>
            </div>

        <div class="m-2 p-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center p-4">
            <a class="btn btn-danger" href="{{ route('project.index') }}" onclick="return confirm('Do you ready to cancel?');"> Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection

<!-- @section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function(){
            $('#category').select2();
        });
    </script>
@endsection -->
