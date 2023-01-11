@extends('admin.layout.master')
@section('content')


<div class="container">
    <div class="row text-center">
        <!-- <div class="col-lg-12 margin-tb"> -->
            <div class="pull-left">
                <h1 class="text-secondary"> <b>PROJECT DETAIL</b> </h1><hr/>
            </div>
        <!-- </div> -->
    </div><br>

    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">ProjectName</th>
              <th scope="col">CoverImage</th>
              <th scope="col">LPrice</th>
              <th scope="col">RPrice</th>
              <!-- <th scope="col">Description</th> -->
              <th scope="col">CategoryName</th>
              <!-- <th scope="col">TownshipName</th> -->
              <th scope="col">Progress</th>
              <th scope="col">Layer</th>
              <th scope="col">SquareFeet</th>
              <th scope="col">ProjectNumber</th>
              <th scope="col">City</th>
              <th scope="col">Township</th>
              <th scope="col">HouseNo</th>
              <th scope="col">Street</th>
              <th scope="col">Ward</th>
            </tr>
        </thead>
      <tbody>
        <tr>
          <th scope="row">{{ $project->id }}</th>
          <td>{{ $project->project_name }}</td>
          <td><img src="{{ asset('images/projects/'.$project->cover)}}" style="width:190px; height: 180px;" class="img-thumbnail"></td>
          <td>{{ $project->lower_price }}</td>
          <td>{{ $project->upper_price }}</td>
          <!-- <td>{{ $project->description }}</td> -->
          <td>
                @foreach ($categories as $c)
                    @if($c->category_id==$project->id)
                        {{$c->category_name}}
                    @endif
                @endforeach
          </td>
          
          <td>{{ $project->progress }}</td>
          <!-- <td>{{ $project->address_id }}</td> -->
          <td>{{ $project->layer }}</td>
          <td>{{ $project->squre_feet }}</td>
          <td>{{ $project->project_id_number }}</td>
          <td>
              @foreach ($cities as $c)
                @if($c->id==$project->city_id)
                    {{$c->name}}
                @endif
             @endforeach
          </td>
          <td>
              @foreach ($towns as $t)
                @if($t->id==$project->township_id)
                    {{$t->name}}
                @endif
             @endforeach
          </td>
          <td>{{ $project->hou_no }}</td>
          <td>{{ $project->street }}</td>
          <td>{{ $project->ward }}</td>
        </tr>
      </tbody>
    </table>

    <div class="card">
        <table>
        <h3 class="text-secondary text-center">IMAGES</h3><br/>
        <tbody>
            @if (count($project->images)>0)
            @foreach ($project->images as $img)
                <td><img src="/images/gallery/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset=""></td>
             @endforeach
             @endif
        </tbody>
        </table><hr/>

        <div class="p-2 m-2"></div>
        <table>
        <h3 class="text-secondary text-center">360-images</h3><br/>
        <tbody>
            <td class="text-center"><img src="/images/360images/{{ $project->gallery }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset=""></td>
        </tbody>
        </table>

        <div class="m-2 p-2"><hr/><hr/></div>

        <div class="card-body text-center">
        <h3 class="text-secondary">AMENITY</h3>
            <div class="text-primary">
                @foreach ($amenities as $am)
                <!-- <option value="{{$am->id}}"> -->
                    @foreach($project->amenity as $pm)
                        @if($pm->id==$am->id)
                            {{$am->amenity}} ,
                        @endif
                    @endforeach
                <!-- </option> -->
                @endforeach
            </div>
        </div><hr/>

        <table>
        <h3 class="text-secondary text-center">GM--Link</h3><br/>
        <tbody>
            <p class="text-center text-info"> {{ $project->gmlink }} </p>
        </tbody>
        </table>


        <div class="m-1 p-1"><hr/><hr/></div>

        <div class="card-body text-center">
            <h3 class="text-secondary">DESCRIPTION</h3>
            <div class="text-success">{{ $project->description }}</div>
        </div>
    </div>

        <div class="m-2 p-2"></div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-danger" href="{{ route('project.index') }}"> Back</a>
        </div>
</div>
@endsection
