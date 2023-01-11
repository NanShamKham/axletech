@extends('master')

@section('title', 'Detail')
@section('css')
     <!-- Pannellum library -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css"
     integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- End Pannellum library -->
@endsection

    
@section('content')
<!-- main -->
  <main class="main">
    <!-- back -->
    <div class="back py-2 py-md-3">
      <span class="backBtn" onclick="history.back()">
        <i class="bi bi-chevron-left"></i><i>Back</i>
      </span>
    </div>
    <!-- end back -->

    <div class="container px-4 px-md-0 px-xl-2">

        <!-- project-detail first section -->
        <div class="pb-4 pt-3 py-md-5 project-detail-card overflow-hidden">
            <div class="row gy-4 gx-0 gy-md-0 gx-lg-3 gy-lg-0 flex-column flex-md-row justify-content-center align-content-center">
                <div class="col-7 col-md-5 col-lg-4 d-flex justify-content-center justify-content-lg-end mx-auto main-image">
                    <div class="main-image-div bg-red rounded rounded-2 overflow-hidden shadow">
                      <!-- https://source.unsplash.com/random/300x400/?building,project,apartments -->
                        <img src="{{ asset('images/projects/'.$project->cover) }}" class="" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8 ps-0 ps-md-3 ps-lg-4 pe-0">
                    <div class="detail-text-div">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="category">
                                <i class="bi bi-building"></i>
                                @foreach($category as $c)
                                  @if($c->category_id==$project->category_id)
                                <span class="text-uppercase ">{{$c->category_name}}</span>
                                  @endif
                                @endforeach
                            </div>
                            <div class="finished-badge pe-lg-2">
                              <div class="badge {{$project->progress == '100' ? 'bg-success':'bg-warning'}} text-uppercase shadow-sm py-2 py-md-2 px-md-2 px-lg-2 py-lg-2 rounded rounded-2">
                                {{$project->progress}}% Finished
                              </div>
                            </div>
                        </div>

                        <div class="pe-lg-5">
                          <div class="price-range my-2 my-md-3 my-lg-2 my-xl-3">
                            <span class="fw-bold">{{ $project->lower_price }} - {{ $project->upper_price }} Lakhs</span>
                          </div>
                          <div class="address mb-2 mb-md-3 mb-xl-4">
                            <div class="">
                              No({{$project->hou_no}}), {{$project->street}} Street, {{$project->ward}} Ward, 
                               
                              @foreach ($town as $t)
                                @if($t->id==$project->township_id)
                                  {{$t->name}} TownShip,
                                @endif
                              @endforeach

                              @foreach ($city as $c)
                                @if($c->id==$project->city_id)
                                  {{$c->name}},
                                @endif
                              @endforeach
                              <!-- No(19/21), 45<sup>th</sup> Street (lower block), Bothtaung TownShip, Yangon, Myanmar -->
                            </div>
                          </div>
                          <div class="facts mb-3 mb-md-3 mb-lg-4 mb-xl-5">
                            <table class="table tb-sm project-card-table table-borderless mb-0">
                              <tbody>
                                <tr>
                                  <td class="w-25 text-nowrap pe-2">ID No</td>
                                  <td>: {{$project->project_id_number}}</td>
                                </tr>
                                <tr>
                                  <td class="w-25 text-nowrap pe-2">Layers</td>
                                  <td>: {{$project->layer}} Floors</td>
                                </tr>
                                <tr>
                                  <td class="w-25 text-nowrap pe-2">Squre Feet </td>
                                  <td>: {{$project->squre_feet}} ft<sup>2</sup></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="entity" style="font-size: 26px;">
                            @foreach ($amenity as $am)
                              @foreach($project->amenity as $pm)
                                @if($pm->id==$am->id)
                                  {{$am->amenity}},
                                @endif
                              @endforeach
                            @endforeach
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end project-detail first section -->
        <!-- gallery  -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-gallery ">
          <div class="gallery">
            <div class="row row-cols-2 row-cols-md-5 row-cols-xl-5 g-lg-3 g-md-2 g-1">

              <!-- 360* images -->
        
                  <div class="col" style="aspect-ratio: 1;">
                    <a data-vbtype="iframe" href="{{ url('panorama/'.$project->id) }}" class="myGallery" data-gall="myGallery"  data-maxwidth="1000px" data-overlay="#423e3ddf">
                      <img src="{{ asset('images/360images/'.$project->gallery) }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                    </a>
                  </div>
               
              <!-- 360* images -->

              <!-- Normal Image -->
              @if (count($project->images)>0)
                @foreach ($project->images as $img)
                  <div class="col" style="aspect-ratio: 1;">
                    <a href="/images/gallery/{{ $img->image }}" class="myGallery" data-gall="myGallery"  data-maxwidth="600px" data-overlay="#423e3ddf">
                      <img src="/images/gallery/{{ $img->image }}" style="width: 100%;height:100%;object-fit:cover;" alt="">
                    </a>
                  </div>
                @endforeach
              @endif
              <!-- Normal Image -->

            </div>
          </div>
        </div>
        <!-- end gallery -->


        <!-- Map -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-map">
            <div class="map">
              <div class="row">
                <div class="col-12">
                  <iframe src="{{$project->gmlink}}" class="w-100 iframe-map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
        </div>
        <!-- End Map -->
        <!-- Project Detail -->
        <div class="pb-3 pb-md-4 pb-lg-5 project-about">
          <div class="row">
            <div class="col-12 text-center text-md-start">
              <h3 class="text-uppercase">Project Details</h3>
              <p>
                {{$project->description}}
              </p>
            </div>
          </div>
        </div>
        <!-- End Project Detail -->



        <!-- 360 img -->
        <!-- <div class="pb-5 project-360">
          <div class="row">
            <div class="col-12">
              <div id="panorama-360-view"></div> -->
              <!-- <img src="./image/gallery/360img.jpeg" alt=""> -->
              <!-- <iframe src="https://momento360.com/e/u/28c5f6727652423fb96a02e1c0a10c83?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium&display-plan=true" class="w-100" height="500px" frameborder="0"></iframe> -->
            <!-- </div>
          </div>
        </div> -->
      <!-- end 360 img -->

    </div>
  </main>
  <!-- end main -->
@endsection


@section('script')  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"
    integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection
    

    <!-- <script>
      new VenoBox({
        selector: '.myGallery',
        numeration: true,
        spinner: 'grid',
        spinColor:'#F5CC7A',
        share: false,
      });

      pannellum.viewer('panorama-360-view', {
        "type": "equirectangular",
        "panorama": "http://127.0.0.1:5500/image/gallery/360img.jpeg",
        "autoLoad": true
    })
    </script> -->
