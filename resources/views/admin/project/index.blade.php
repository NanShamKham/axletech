@extends('admin.layout.master')

@section('content')
<div class="container text-center">
	<div class="row">
		<div class="col"><h1 class="text-secondary">PROJECT LIST PAGE</h1></div>
	</div>
</div><br/>

	@if ($message = Session::get('success'))
	    <div class="alert alert-success">
	    	<div class="text-end">
            	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        	</div>
	        <span>{{ $message }}</span>
	    </div>
	@endif

	<div class="pull-right">
	    <a class="btn btn-success" href="{{ route('project.create') }}"> Create Your Project</a><br/>
    </div><br/>

	<!-- <div class="container">
	<div class="card">
	<div class="card-body"> -->
	<table class="table table-light">
		<thead>
			<tr>
				<th scope="col">NO</th>
				<th scope="col">ProjectName</th>
				<th scope="col">CoverImage</th>
				<!-- <th scope="col">Images</th> -->
				<th scope="col">Lprice</th>
				<th scope="col">Rprice</th>
				<th scope="col">CategoryName</th>
				<th scope="col">City</th>
				<th scope="col">Township</th>
				<th scope="col">HouseNo</th>
                <th scope="col">Street</th>
                <th scope="col">Ward</th>
				<th scope="col">Amenity</th>
				<th scope="col">Layer</th>
				<th scope="col">SquareFeet</th>
				<th scope="col">ProjectNumber</th>
				<th scope="col">Show</th>
				<th scope="col">Edit</th>
				<th scope="col">Delete</th>
			</tr>
		</thead>

	@php
	 $i = 0;
	@endphp

	@foreach($projects as $p)
	<tbody>
		<tr>
			<th scope="row">{{ ++$i }}</th>
			<td>{{ $p->project_name }}</td>
			<td><img src="{{asset('images/projects/'.$p->cover)}}" style="width:190px; height: 180px;" class="img-thumbnail"></td>
			<!-- <td>
				@if (count($p->images)>0)
				@foreach ($p->images as $img)
					<img src="/images/gallery/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
	             @endforeach
	             @endif
			</td> -->
			<td>{{ $p->lower_price }}</td>
			<td>{{ $p->upper_price }}</td>
			<!-- <td>{{ $p->description }}</td> -->
			<td>
				@foreach ($categories as $c)
                    @if($c->category_id==$p->category_id)
                    	{{$c->category_name}}
                    @endif
                @endforeach
			</td>
			<td>
				@foreach($cities as $c)
					@if($c->id==$p->city_id)
						{{$c->name}}
					@endif
				@endforeach
			</td>
			<td>
				@foreach($towns as $t)
					@if($t->id==$p->township_id)
						{{$t->name}}
					@endif
				@endforeach
			</td>
			<td>{{ $p->hou_no }}</td>
			<td>{{ $p->street }}</td>
			<td>{{ $p->ward }}</td>
			<td>
				@foreach ($amenities as $am)
		            <!-- <option value="{{$am->id}}"> -->
		                @foreach($p->amenity as $pm)
		                    @if($pm->id==$am->id)
		                        {{$am->amenity}},
		                    @endif
		                @endforeach
		            <!-- </option> -->
	            @endforeach
			</td>
			<td>{{ $p->layer }}</td>
			<td>{{ $p->squre_feet }}</td>
			<td>{{ $p->project_id_number }}</td>
			<form action="{{ route('project.destroy',$p->id) }}" method="POST">
            <td><a class="btn btn-info" href="{{ route('project.show',$p->slug) }}"><i class="bi bi-eye-fill"></i></a>
            <td><a class="btn btn-primary" href="{{ route('project.edit',$p->slug) }}"><i class="bi bi-pencil-square"></i></a>
            @csrf
            @method('DELETE')
            <td><button type="submit" onclick="return confirm('Do you really want to delete project!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
		</tr>
	</tbody>
	@endforeach
	</table>
	<div class="m-3 p-3"></div>
	{{$projects->links()}}
@endsection
