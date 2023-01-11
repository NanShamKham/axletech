@extends('admin.layout.master')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center text-secondary">EDIT HERE YOUR PROJECT</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
        <div class="text-end">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <strong>Whoops!</strong> something we are problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif

        <div class="p-3 m-3"></div>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-2">
                    <h4 class="text-danger">Cover Image:</h4>
                    <form action="/admin/deletecover/{{ $project->id }}" method="post">
                    <button class="bi bi-x-octagon-fill"></button>
                    @csrf
                    @method('DELETE')
                    </form>
                    <img src="/images/projects/{{ $project->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">

                    <div class="p-3 m-3"></div>
                     @if (count($project->images)>0)
                     <h4 class="text-danger">Images:</h4>
                     @foreach ($project->images as $img)
                     <form action="/admin/deleteimage/{{ $img->id }}" method="post">
                     <button class="bi bi-x-circle"></button>
                     @csrf
                     @method('DELETE')
                     </form>
                     <img src="/images/gallery/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                     @endforeach
                     @endif
                </div>



    <div class="col text-warning bg-dark">
        <form action="{{ route('project.update',$project->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ProjectName:</strong>
                    <input type="text" name="project_name" required class="form-control" value="{{ $project->project_name }}">
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>360*-Image:</strong>
                    <input type="file" id="gallery" class="form-control" name="gallery" value="{{$project->gallery}}">
                    <img src="{{asset('images/360images/'.$project->gallery)}}" style="height: 100px; width: 100px;"  alt="Image">
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cover Image:</strong>
                    <input type="file" id="input-file-now-custom-3" class="form-control" name="cover">
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" id="input-file-now-custom-3" class="form-control" name="images[]" multiple>
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Price:</strong>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" value="{{ $project->lower_price }}" aria-label="Price" name="lower_price" required>
                        <span class="input-group-text">TO</span>
                    <input type="number" class="form-control" value="{{ $project->upper_price }}" aria-label="Price" name="upper_price" required>
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong for="category">Choose Your City:</strong>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <strong for="category">Choose Your Township:</strong>
                <div class="form-group">
                    <select name="city_slug" class="col-sm-5 p-1">
                        @foreach ($cities as $c)
                        <option value="{{$c->slug}}"
                            @if($c->id==$project->city_id)
                            selected
                            @endif
                            >{{$c->name}}
                        </option>
                        @endforeach
                    </select> 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <select name="town_slug" class="col-sm-5 p-1">
                        @foreach ($towns as $t)
                        <option value="{{$t->slug}}"
                            @if($t->id==$project->township_id)
                            selected
                            @endif
                            >{{$t->name}}
                        </option>
                        @endforeach
                    </select> 
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>HouseNo:</strong>
                    <input type="text" name="hou_no" class="form-control" value="{{ $project->hou_no }}">
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Street:</strong>
                    <input type="text" name="street" class="form-control" value="{{ $project->street }}">
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Wrad:</strong>
                    <input type="text" name="ward" class="form-control" value="{{ $project->ward }}">
                </div>
            </div>

            <div class="m-2 p-2"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Square Feet:</strong>
                    <input type="text" name="squre_feet" class="form-control" required value="{{ $project->squre_feet }}">
                </div>
            </div>
    </div>

    <div class="col-1"></div>

    <div class="col text-warning bg-dark">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Layer:</strong>
                <input type="text" name="layer" required class="form-control" value="{{ $project->layer }}">
            </div>
        </div>

        <div class="m-2 p-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Number:</strong>
                <input type="number" min="1" name="project_id_number" class="form-control" value="{{ $project->project_id_number }}">
            </div>
        </div>

        <div class="m-2 p-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong for="category">Choose Your Category:</strong>
            <!-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <strong for="category">Choose Your Township:</strong> -->
            <div class="form-group">
                <select name="category_id" class="col-sm-5 p-1">
                    @foreach ($categories as $c)
                    <option value="{{$c->category_id}}"
                        @if($c->category_id==$project->category_id)
                        selected
                        @endif
                        >{{$c->category_name}}
                    </option>
                    @endforeach
                </select> 
            </div>
        </div>

        <div class="m-2 p-3"></div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Google Map Link:</strong>
                <textarea class="form-control" id="gmlink" name="gmlink" rows="10">{{ $project->gmlink }}</textarea>
            </div>
        </div>

        <div class="col text-warning bg-dark">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Progress:</strong>
                    <input type="text" name="progress" class="form-control" value="{{ $project->progress }}">
                </div>
            </div>

        <div class="m-2 p-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong for="amenity">Choose Your Amenity:</strong>
                    <select class="amenity related-post form-control" name="amenity[]" multiple required>
                        @foreach ($amenity as $am)
                        <option value="{{$am->id}}"
                            @foreach($project->amenity as $pm)
                                @if($pm->id==$am->id)
                                selected
                                @endif
                            @endforeach
                            >{{$am->amenity}}
                        </option>
                        @endforeach
                    </select>
            </div>
        </div>

        <div class="m-2 p-3"></div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" id="description" required name="description" rows="10">{{ $project->description }}</textarea>
            </div>
        </div>
    </div>

    <div class="m-2 p-2"></div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center p-4">
        <a class="btn btn-danger" href="{{ route('project.index') }}" onclick="return confirm('Are you sure want to go back?')"> Cancel</a>
        <button type="submit" class="btn btn-success" onclick="return confirm('Do you really want to update project!')">Update</button>
    </div>
    </form>
@endsection
