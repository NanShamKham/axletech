@extends('master')

@section('title', 'ProjectList')
@section('css')
    <link rel="stylesheet" href="{{asset('js/project-list.js')}}">
    <link rel="stylesheet" href="/sass/project-list.scss">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css ">
@endsection

@section('content')
<!-- main -->
  <main class="pt-5">
    <div class="container px-4 px-md-0">
      <!-- <h1 class="py-5">Project List</h1> -->

    <!-- start search -->
    <form action="{{ route('advance') }}" method="GET">
    <!-- @csrf -->
      <div id="search" class="pt-5">
          <div class="input-group mb-4">
            <input type="search" name="search" maxlength="50" class="form-control" placeholder="Searching">
            <button class="btn btn-secondary px-4" type="submit" id="search-button-addon2">
              <i class="bi bi-search text-gold"></i>
            </button>
          </div>
    <!-- end search -->
    <!-- start filter -->
      <div id="filter">
        <div class="mb-4">
          <div class="row g-0">
            <div class="col-12 col-lg-10 mx-auto">
              <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-4 g-lg-0">
                <div class="align-items-center col d-flex flex-column flex-md-row justify-content-center">
                    <select id="chooseCategory" class="form-select mb-3 mb-md-0 me-0 me-lg-3 me-md-1 w-100" onchange="getValue('chooseCategory','result-category')" aria-label=".form-select-sm example" name="category">
                      <option value="">Choose Category</option>
                      @if(!empty($categories))
                         @foreach ($categories as $c)
                            <option value="{{$c->category_id}}">{{$c->category_name}}</option>
                         @endforeach
                      @endif
                    </select>
                    <select id="chooseTownShip" class="form-select me-lg-3 ms-0 ms-md-1" onchange="getValue('chooseTownShip','result-township')" aria-label=".form-select-sm example" name="township">
                      <option value="">Choose TownShips</option>
                      @if(!empty($towns))
                          @foreach ($towns as $t)
                            <option value="{{$t->id}}">{{$t->name}}</option>
                         @endforeach
                      @endif
                    </select>
                </div>
                <!-- Price Range -->

                <div class="col">
                  <div class="">
                    <div class="row row-cols-2 mb-3 gx-2 price-input ">
                      <div class="col">
                        <div class="row g-0">
                          <label for="inputMin" class="col-sm-2 col-form-label text-center pt-0 pt-md-2">Min</label>
                          <div class="col-sm-10">
                            <input type="number" name="min_price" class="form-control input-min" id="inputMin" value="">
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="row g-0">
                          <label for="inputMax" class="col-sm-2 col-form-label text-center pt-0 pt-md-2">Max</label>
                          <div class="col-sm-10">
                            <input type="number" name="max_price" class="form-control input-max" id="inputMax" value="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="slider">
                      <div class="progress"></div>
                    </div>
                    <div class="range-input">
                      <input type="range" class="range-min" min="100" max="5000" value="1000" step="100" id="rangeMin">
                      <input type="range" class="range-max" min="100" max="5000" value="3000" step="100" id="rangeMax">
                    </div>
                  </div>
                </div>

                <!--End Price Range -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
    <!-- end filter -->

    <!--start Result -->
      <div id="result" class="">

        <div class="result-count mb-4">
          <div class="row">
            <div class="col-12">
              <span class="fs-4 me-3">Result :  @if(!empty($projects)) {{$projects->count()}} @endif</span>
              <div class="text-black-50 d-inline-block result-text">
                <span id="result-category">{{$findCat}}</span> <i class="bi bi-chevron-right"></i>
                <span id="result-township"><?php echo $findTon; ?></span> <i class="bi bi-chevron-right"></i>
                <span class="result-minRange">{{$finPro}}</span> Lakhs & <span class="result-maxRange">{{$findPro}}</span> Lakhs
                <!-- <i class="bi bi-chevron-right"></i>
                100 Lakhs & 400 Lakhs -->
              </div>
            </div>
          </div>
        </div>

            @if(Session::has('no-results'))
            <div class="card">
              <div class="card-body">
                <h4 class="text-danger text-center">
                  <img src="{{asset('image/searching.jpg')}}" style="width:130px; height: 130px;">
                  <i style="background: #769981;">{{ Session::get('no-results') }}</i>
                </h4>
                <p class="text-center">Make sure that all words were spelled correctly, or search for a new keyword.</p>
              </div>
            </div>
            <div class="m-3 p-4"></div>
            @else

        <div class="result-card mb-4">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-2 g-md-3 mb-4 d-none d-lg-flex">
                @foreach($projects as $p)
                      <div class="col">
                        <a href="{{ url('detail/'.$p->id) }}" class="text-decoration-none">
                        <div class="project-list-card card mb-2 mb-md-0 d-flex justify-content-center align-items-center overflow-hidden border-0 shadow">
                          <div class="row row-cols-1 h-100 w-100 g-0">
                            <div class="col-5 project-list-img">
                              <img src="{{ asset('images/projects/'.$p->cover) }}" class="rounded-start" alt="..." style="width:100%;height:100%;object-fit: cover;">
                            </div>
                            <div class="col-7 bg-secondary">
                              <div class="card-body  text-primary px-2 px-md-2 px-lg-2 my-0 my-lg-0" >
                                <h5 class="card-title">
                                  No({{$p->hou_no}}), {{$p->street}} Street, {{$p->ward}} Ward, 
                               
                                  @foreach ($towns as $t)
                                    @if($t->id==$p->township_id)
                                      {{$t->name}} TownShip,
                                    @endif
                                  @endforeach

                                  @foreach ($cities as $c)
                                    @if($c->id==$p->city_id)
                                      {{$c->name}},
                                    @endif
                                  @endforeach
                                </h5>
                                <span class="fw-bold my-1 my-md-2 my-lg-2 range d-block">{{ $p->lower_price }} - {{ $p->upper_price }} Lakhs</span>
                                <table class="table tb-sm text-gold project-card-table table-borderless mb-1">
                                  <tbody>
                                    <tr>
                                      <td class="w-25 text-nowrap pe-2">ID No</td>
                                      <td>{{ $p->project_id_number }}</td>
                                    </tr>
                                    <tr>
                                      <td class="w-25 text-nowrap pe-2">Layers</td>
                                      <td>{{ $p->layer }} Floors</td>
                                    </tr>
                                    <tr>
                                      <td class="w-25 text-nowrap pe-2">Squre Feet </td>
                                      <td>{{ $p->squre_feet }} ft<sup>2</sup></td>
                                    </tr>
                                  </tbody>
                                </table>
                                @foreach ($amenities as $am)
                              <!-- <option value="{{$am->id}}"> -->
                                  @foreach($p->amenity as $pm)
                                    @if($pm->id==$am->id)
                                      <span class="card-text my-0 my-lg-0 my-xl-3 list-entity">{{ $am->amenity }}, </span>
                                    @endif
                                  @endforeach
                              <!-- </option> -->
                               @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                      </div>
                  @endforeach
              </div>

              <!-- For Tablet -->
              <div class="row row row-cols-1 row-cols-md-2 row-cols-xl-3 g-2 g-md-3 mb-4 d-none d-md-flex d-lg-none">
                @foreach($projects as $p)
                <div class="col">
                  <div class="project-list-card card mb-2 mb-md-0 d-flex justify-content-center align-items-center overflow-hidden border-0 shadow">
                    <div class="row row-cols-1 h-100 w-100 g-0">
                      <div class="col-5 project-list-img">
                        <a href="{{ url('detail/'.$p->id) }}" class="text-decoration-none">
                          <img src="{{ asset('images/projects/'.$p->cover) }}" class="rounded-start" alt="..." style="width:100%;height:100%;object-fit: cover;">
                        </a>
                      </div>
                      <div class="col-7 bg-secondary">
                        <a href="project-detail.html" class="text-decoration-none">
                        <div class="card-body  text-primary px-2 px-md-2 px-lg-2 my-0 my-lg-0" >
                          <h5 class="card-title">
                            No({{$p->hou_no}}), {{$p->street}} Street, {{$p->ward}} Ward, 
                               
                            @foreach ($towns as $t)
                              @if($t->id==$p->township_id)
                                {{$t->name}} TownShip,
                              @endif
                            @endforeach

                            @foreach ($cities as $c)
                              @if($c->id==$p->city_id)
                                {{$c->name}},
                              @endif
                            @endforeach
                          </h5>
                          <span class="fw-bold my-1 my-md-2 my-lg-2 range d-block">{{ $p->lower_price }} - {{ $p->upper_price }} Lakhs</span>
                          <table class="table tb-sm text-gold project-card-table table-borderless mb-1">
                            <tbody>
                              <tr>
                                <td class="w-25 text-nowrap pe-2">ID No</td>
                                <td>: {{ $p->project_id_number }}</td>
                              </tr>
                              <tr>
                                <td class="w-25 text-nowrap pe-2">Layers</td>
                                <td>: {{ $p->layer }} Floors</td>
                              </tr>
                              <tr>
                                <td class="w-25 text-nowrap pe-2">Squre Feet </td>
                                <td>: {{ $p->squre_feet }} ft<sup>2</sup></td>
                              </tr>
                            </tbody>
                          </table>
                          @foreach ($amenities as $am)
                            @foreach($p->amenity as $pm)
                              @if($pm->id==$am->id)
                                <span class="card-text d-block my-0 my-lg-0 my-xl-3 list-entity"> {{ $am->amenity }}, </span>
                             @endif
                            @endforeach
                          @endforeach
                        </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                </div>
                <!-- End Tablet -->

           <!-- For Mobile -->
            <div class="row row row-cols-1 row-cols-md-2 row-cols-xl-3 g-2 g-md-3 mb-4 d-flex d-md-none">
               @foreach($projects as $p)
              <div class="col">
                <div class="project-list-card card mb-2 mb-md-0 d-flex justify-content-center align-items-center overflow-hidden border-0 shadow">
                  <div class="row row-cols-1 h-100 w-100 g-0">
                    <div class="col-5 project-list-img">
                      <a href="{{ url('detail/'.$p->id) }}" class="text-decoration-none">
                      <img src="{{ asset('images/projects/'.$p->cover) }}" class="rounded-start" alt="..." style="width:100%;height:100%;object-fit: cover;">
                      </a>
                    </div>
                    <div class="col-7 bg-secondary">
                      <a href="project-detail.html" class="text-decoration-none">
                      <div class="card-body  text-primary px-2 px-md-2 px-lg-2 my-0 my-lg-0" >
                        <h5 class="card-title">
                          No({{$p->hou_no}}), {{$p->street}} Street, {{$p->ward}} Ward, 
                               
                          @foreach ($towns as $t)
                            @if($t->id==$p->township_id)
                              {{$t->name}} TownShip,
                            @endif
                          @endforeach

                          @foreach ($cities as $c)
                            @if($c->id==$p->city_id)
                              {{$c->name}},
                            @endif
                          @endforeach
                        </h5>
                        <span class="fw-bold my-1 my-md-2 my-lg-2 range d-block">{{ $p->lower_price }} - {{ $p->upper_price }} Lakhs</span>
                        <table class="table tb-sm text-gold project-card-table table-borderless mb-1">
                          <tbody>
                            <tr>
                              <td class="w-25 text-nowrap pe-2">ID No</td>
                              <td>: {{ $p->project_id_number }}</td>
                            </tr>
                            <tr>
                              <td class="w-25 text-nowrap pe-2">Layers</td>
                              <td>: {{ $p->layer }} Floors</td>
                            </tr>
                            <tr>
                              <td class="w-25 text-nowrap pe-2">Squre Feet </td>
                              <td>: {{ $p->squre_feet }} ft<sup>2</sup></td>
                            </tr>
                          </tbody>
                        </table>
                        @foreach ($amenities as $am)
                          @foreach($p->amenity as $pm)
                            @if($pm->id==$am->id)
                        <span class="card-text d-block my-0 my-lg-0 my-xl-3 list-entity"> {{ $am->amenity }}, </span>
                            @endif
                          @endforeach
                        @endforeach
                      </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <!-- End Mobile -->

            </div>
            {{ $projects->links() }}
            @endif
        </div>
      </div>
    <!-- end Result -->
  </main>
  </div>
<!-- end main -->
<!-- for tablet -->

@endsection

@section('script')
    <script src="/js/project-list.js"></script>
    <script src="./js/script.js"></script>
    {{-- <script src="./js/script.js"></script> --}}
    <script>


    const subText = (text) =>{
      return text.substring(0, 60) + '...';
  }


   let listEntity = document.querySelectorAll('.list-entity') ;
  //  console.log(listEntity.length);
   for(let i=0; i<= listEntity.length;i++){
    let realText = listEntity[i].innerText;
    let changeText = subText(realText);
    listEntity[i].innerText = changeText;
    // console.log('project-list = '+changeText);

  }

    </script>
@endsection
