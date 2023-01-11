@extends('master')

@section('title', 'Home')
@section('content')
<!-- main -->
            <main class="main">
    <!-- slider -->
              <section id="slider bg-success">
                  <div class="slider-first-div overflow-hidden bg-secondary">
                    <div class="container-fluid px-0 h-100">
                      <div id="carouselExampleInterval" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                          @foreach($slider as $sl)
                                <div class="carousel-item h-100 @if($loop->first) active @endif">
                                    <div class="slider-image text-center">
                                        <img src="{{  asset('uploads/slider/'.$sl->image) }}" class="d-block w-100 h-100" alt="{{ $sl->image }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    </div>
                  </div>

              </section>
    <!-- end slider -->
    <!-- counting -->
              <section id="counting">
                <div class="bg-secondary text-gold py-2 py-lg-0 shadow">
                 <div class="row row-cols-1 justify-content-between align-items-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 mx-auto py-2 py-md-3 py-lg-4">
                    <table class="table counting-table table-borderless mb-0">
                      <tbody>
                        <tr>
                          <td class="counting-title">Happy Customer</td>
                          <td class="counting-title">Complete Projects</td>
                          <td class="counting-title">Strong Workforce</td>
                        </tr>
                        <tr>
                          <td class="fw-bold counting-number ">
                            <span class="counter">1500</span>+
                          </td>
                          <td class="fw-bold counting-number">
                            <span class="counter">180</span>+
                          </td>
                          <td class="fw-bold counting-number">
                            <span class="counter">320</span>+
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                 </div>
                </div>

              </section>
    <!-- end counting -->
    
    <!-- facebook post -->
        <section id="facebook-post">
            <div class="container p-1 pt-0 pb-0 pt-md-5 pb-md-3 p-md-2 p-lg-2 p-xl-5 position-relative" >
              <div class="row px-1 px-md-2 px-lg-5 pt-5 pb-0 py-md-3 pt-lg-5 pb-lg-3 fb-slider ">
                      @foreach($facebooklinks as $f)
                      <div class="col mb-3 mb-md-0 mx-1">
                        <div class="card fb-card border-0 shadow">
                              <a href="{{$f->project_post_link}}">
                            <img src="{{asset('images/fb-images/'.$f->picture)}}" class="card-img-top" alt="..." style="height:175px">
                          <div class="card-body overflow-hidden" style="max-height:85px" >
                              <span class= "fb-card-text card-text overflow-hidden">
                                <i class="d-inline-block text-warning"> <i class="bi bi-facebook text-info" style="font-size: 24px;"></i>{{$f->description}} </i>
                              </span>
                          </div>
                              </a>
                        </div>
                      </div>
                      @endforeach
                  </div>
                    <div class="seemore-fb justify-content-center align-items-center px-2 px-xl-3 py-1 py-xl-2 rounded rounded-pill" >
                      <a href="https://www.facebook.com/Sunmyattun" target="_blank" class="text-decoration-none text-black-50 ">
                          See More &nbsp;<i class="bi bi-arrow-right"></i>
                      </a>
                    </div>
                    <div class="text-end px-3 d-md-none">
                      <a href="https://www.facebook.com/Sunmyattun" target="_blank">
                        <span class="text-secondary go-to-arrow"> 
                            Go To Facebook Page
                        </span>
                      </a>
                    </div>
                </div>


              </section>
    <!-- end facebook post -->
    <!-- project -->
              <section id="project">
                <div class="container d-flex flex-column justify-content-center align-items-center mx-auto px-0 pb-2 pb-lg-4 pb-xl-0">
                    <!-- <div class="row  text-center px-2 py-1 pt-2 pt-md-3 pt-xl-0 py-md-2 pb-md-4 py-lg-0">
                      <div class="col-12 mx-auto project-heading">
                        <span class="fs-1 fw-bold text-secondary">Our Running Projects</span>
                        <p class="text-black-50 pt-2 pt-lg-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam fugiat ipsam sequi ipsa deleniti necessitatibus, vero, totam ut quasi porro illo doloremque quidem eligendi minima quaerat veritatis tempore, error ducimus.</p>
                      </div>
                    </div> -->
                    <div class="row row-cols-1 row-cols-md-2 g-2 g-md-3 g-lg-4 mb-0 mb-lg-3 mb-xl-5 pb-4 pb-md-5  pb-lg-3 pb-xl-5 px-3 px-lg-0">
                      
                      
                @foreach($projects as $p)
                  <div class="col">
                    <a href="{{ url('detail/'.$p->id) }}" class="text-decoration-none">
                    <div class="project-card card mb-2 mb-md-3 d-flex justify-content-center align-items-center overflow-hidden border-0 shadow">
                      <div class="row row-cols-1 h-100 w-100 g-0">
                        <div class="col-5 ">
                          <img src="{{ asset('images/projects/'.$p->cover) }}" class="rounded-start project-img" alt="..." style="width:100%;height:100%;">
                        </div>
                        <div class="col-7 bg-secondary">
                          <div class="card-body  text-primary px-2 px-md-2 px-lg-4 my-0 my-lg-4" >
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
                            <h3 class="fw-bold my-1 my-md-3 range">{{ $p->lower_price }} - {{ $p->upper_price }} Lakhs</h3>
                            <table class="table tb-sm project-card-table table-borderless mb-0">
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
                            <p class="p-1 m-1"></p>
                            @foreach ($amenities as $am)
                            <!-- <option value="{{$am->id}}"> -->
                              @foreach($p->amenity as $pm)
                                @if($pm->id==$am->id)
                                  <span class="card-text my-0 my-md-2 my-lg-0 my-xl-3 entity text-truncate"><i>{{ $am->amenity }}</i></span>
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
            </section>
    <!-- end project -->
    <!-- about -->
              <section id="about">
                <div class="container-fluid bg-transparent px-0" >
                  <div class="container bg-transparent px-0 overflow-hidden">
                     <div class="row row-cols-1 row-cols-md-2 p-0 p-md-2 p-lg-3 p-xl-5">
                      <div class="col px-0 d-flex d-md-none">
                        <img src="./image/Subtraction 2.png" alt="" class="img-fluid" style="margin-top:-6px;">
                      </div>
                      <div class="col px-0 d-none d-md-none d-lg-none" style="min-height:200px;">
                        <!-- <img src="./image/about-tablet.png" alt="" class="img-fluid" style="margin-top:-4px;"> -->
                      </div>
                      <!-- px-0 px-md-2 px-lg-3 py-0 py-md-2 py-lg-3 -->
                      <div class="col  px-4 px-xl-5 text-center text-md-start text-lg-start ">
                        <h4 class="text-uppercase fw-bold text-gold about-heading mt-md-3 mt-2 mt-lg-2">About Our Organization</h4>
                        <div class="text-gold overflow-hidden">
                          <p class="about-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia exercitationem sunt, deleniti consequuntur consequatur, laborum eos recusandae harum totam eaque unde iure odit pariatur mollitia voluptate suscipit, aperiam accusamus eligendi.</p>
                          <p class="about-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat iure eius earum nisi fugiat maxime aut, quos ad at mollitia aperiam illum porro eos quae molestias beatae deleniti quidem. Ipsam.</p>
                          <p class="about-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta eligendi qui, vero facilis nam quia minima deleniti illum explicabo quibusdam optio suscipit, repellat et reiciendis amet, accusamus dignissimos quasi alias.</p>
                        </div>
                      </div>
                     </div>
                  </div>
                </div>

              </section>
    <!-- end about -->
    <!-- contact -->
              <section id="contact">
                  <div class="container pt-3 py-lg-3">
                    <div class="row p-2 p-lg-5 flex-column  text-center justify-content-center align-items-center">
                      <div class="col-12">
                          <h5 class="fw-bold text-grey send-message-heading">Send Message For More Information</h5>
                          <span class="text-black-50 fs-6 send-message-heading-small">Our team will response as soon as possible</span>
                      </div>
                      <div class="col-12">
                        <div class="my-4 send-message-input mx-auto">
                          <div class="input-group input-group-lg mb-3">
                            
                            <input type="text" class="form-control bg-primary bg-opacity-25 rounded send-input-tag" value="" placeholder="Freely Contact Our Team" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-secondary text-gold fw-bold rounded rounded-start" type="button" id="button-addon2">
                              <form id="sendMail" method="post" action="mailto:salses@sunmyattun.com?subject=SMT Information Website!&body=This is only a test!">
                                <a href="mailto:salses@sunmyattun.com?subject=SMT Information Website!&body=This is only a test!" class="text-decoration-none" id="sendBtn">SEND</a>
                              </form>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </section>
    <!-- end contact --> 
            </main>
<!-- end main -->

@endsection