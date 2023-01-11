<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SMT</title>
    <link rel="icon" href="../../images/smtlogo.png" type="image/png">


    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../../css/datatable.css">

    <!--    sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</head>
<body>

<!--            backdrop-->
<div class="w-100 vh-100 bg-black opacity-50 position-absolute top-0 d-none" id="backdrop"></div>
<!-- backdrop-->


<section id="app">
    <div class="row justify-content-start align-items-center g-0">
        <!--            start Aside-->
        <!--            col-4 col-md-3 col-lg-2-->
        <aside class="vh-100 bg-secondary aside-hide ">
            <div class="d-flex justify-content-end">
                <button class="btn btn-link " id="close-aside">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <div class="header justify-content-center align-items-center">
                <img src="../images/smtlogo.png" alt="">
            </div>
            <div id="side"  class="bg-secondary w-100 my-3">
                <ul class="list-unstyled">
                    <a class="side-link active  w-100" href="{{url('/admin')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3 ">
                            Dashboard
                        </li>
                    </a>
                    <a class="side-link  w-100" href="{{url('admin/contact')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Contact Us
                        </li>
                    </a>
                    <a class="side-link  w-100" href="{{url('admin/project')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Projects
                        </li>
                    </a>
                    <a class="side-link  w-100" href="{{url('admin/category')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Cateogries
                        </li>
                    </a>
                    <a class="side-link  w-100" href="{{url('admin/amenity')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Amenities
                        </li>
                    </a>
                    <a class="side-link  w-100" href="{{url('admin/address')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Address
                        </li>
                    </a>
                    <a class="side-link   w-100" href="{{url('admin/facebooklink')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Facebook Link
                        </li>
                    </a>
                    <a class="side-link  w-100" href="{{url('admin/slider')}}" style="text-decoration: none;">
                        <li class="py-3 side-item px-3">
                            Slider Images
                        </li>
                    </a>
                    @if(auth()->guard('admin')->check())
                        @if($data->role === 'Admin')
                        <a class="side-link  w-100" href="{{url('admin/setting')}}" style="text-decoration: none;">
                            <li class="py-3 side-item px-3">
                                Setting
                            </li>
                        </a>
                        @else
                            <!-- no data -->
                        @endif
                    @endif

                </ul>
            </div>
        </aside>
        <!--            end Aside-->
        <!--            col-12 col-md-12 col-lg-10-->
        <div class=" min-vh-100 bg-danger px-0 g-0 right">
            <!--                start Nav-->
            <nav class="navbar position-sticky top-0">
                <div class="container-fluid">
                    <button class="btn btn-link fs-3 text-primary menu-list">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="d-flex flex-row justify-content-end  align-items-center">
                        <div class="contact-noti position-relative me-3 ">
                            <a href="https://smtcon.netlify.app/" class="p-1" target="_blank">
                                <i class="bi bi-box-arrow-up-right fs-3 fa-fw "></i>
                                <div class="position-absolute d-none p-1 rounded-circle top-0 end-0" style="width: 10px;height:10px;">
                                </div>
                            </a>
                        </div>
                        <div class="contact-noti position-relative me-3 ">
                            <a href="./contactUs/contact_us_empty_view.html" class="p-1">
                                <i class="bi bi-bell-fill fs-3 fa-fw "></i>
                                <div class="position-absolute bg-danger p-1 rounded-circle top-0 end-0" style="width: 10px;height:10px;">
                                </div>
                            </a>
                        </div>
                        <div class="dropdown">
                            <div class="profile d-flex align-items-center pe-2 text-primary" style="min-width: max-content;">
                                <div class="overflow-hidden rounded rounded-circle  dropdown-toggle" data-bs-toggle="dropdown" data-bs-offset="20,20" style="width:50px;height:50px">
                                    <img src="../images/unaylintun.png" alt="" style="width: 100%;height: 100%;object-fit: cover">
                                </div>
                                <div class="dropdown-menu dropdown-menu-end bg-secondary text-primary py-0">
                                    <!--                                    profile hover card-->
                                    <div class="profile-hover-card">
                                        <div class="card bg-secondary text-primary px-2 py-2" style="max-width: 500px" >
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fw-light px-3"> SMT Admin Dashboard </span>
                                                <form action="{{ url('/admin/logout') }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-link fw-light">Log out</button>
                                                </form>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center my-3 px-3">
                                                <div class="overflow-hidden rounded rounded-circle border border-primary " style="width:100px;height:100px">
                                                    <a href="">
                                                        <img src="../images/unaylintun.png" alt="" style="width: 100%;height: 100%;object-fit: cover">
                                                    </a>
                                                </div>
                                                <div class="ps-3">
                                                    <span class="fs-5 fw-bold">Win Win Maw</span>
                                                    <span class="fw-light d-block mb-3">winwinmaw@gmail.com</span>
                                                    <a href="./user/userProfile.html" class="text-decoration-underline fw-light">View Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    end profile card-->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>
            <!--                end Nav-->
            <!--                start content-->
            <div class="content">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <div class="w-100 min-vh-100">
                        <div class="row g-0 d-flex justify-content-center align-items-center">
                            <div class="col-lg-6">
                              <div class="mt-5 mb-3 px-3">
                                  <div class="w-100">
                                      <div class="card bg-secondary border-0 rounded rounded-2 overflow-hidden w-100" >
                                          <div class="card-body bg-secondary"  >
                                              <h5 class="text-primary text-center">Total Visitor To Website</h5>
                                              <div class="w-100" style="height: 350px">
                                                  <canvas id="myChart" style="width: 100%;height: 100%"></canvas>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-lg-5">
                                <div class=" d-flex flex-column justify-content-center align-items-center">
                                    <div class="card w-75 bg-secondary py-4 px-3 border-0 my-2">
                                        <div class="card-body text-success d-flex flex-column justify-content-center align-items-center">
                                            <h4 class="">
                                                <i class="bi bi-people-fill"></i>
                                                Total Visitor
                                            </h4>
                                            <span class="fw-bold fs-2">200+</span>
                                        </div>
                                    </div>
                                    <div class="card w-75 bg-secondary py-4 px-3 border-0 my-2">
                                        <div class="card-body text-info d-flex flex-column justify-content-center align-items-center">
                                            <h4 class="">
                                                <a href="#" class="text-info">
                                                    <i class="bi bi-flag"></i>
                                                    Total Projects
                                                </a>
                                            </h4>
                                            <span class="fw-bold fs-2">
                                               <a href="#" class="text-info">
                                                    100+
                                               </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 px-3 my-5">
                                <div class="card bg-secondary table-card mb-5">
                                    <div class="card-body px-0">
                                        <div class="w-100 px-3 mb-3 d-flex justify-content-between align-items-center">
                                            <h3 class="text-white">Top 10 Projects</h3>
                                            <a href="project/project.html" title="show project list">
                                                <i class="bi bi-list text-primary fs-3"></i>
                                            </a>
                                        </div>
                                        <div class="w-100">
                                            <table id="table_Project_In_Dashboard" class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                                <thead class="">
                                                <tr class="bg-primary text-secondary">
                                                    <th class="text-center">NO</th>
                                                    <th class="">Name</th>
                                                    <th class="" style="max-width: 300px">Address</th>
                                                    <th class="">Range</th>
                                                    <th class="">Category</th>
                                                    <th class="text-center">Viewer</th>
                                                    <th class="text-center" data-orderable="false">Action</th>
                                                    <th class="text-nowrap text-center">Modify Date</th>

                                                </tr>
                                                </thead>
                                                <tbody class="bg-secondary text-white">
                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-center">1</th>
                                                    <td class="text-start text-nowrap text-uppercase">A110029</td>
                                                    <td class="text-start text-capitalize overflow-hidden" style="white-space:normal;min-width:300px;max-width: 300px;height: 3em !important; text-overflow: ellipsis;">
                                                        <small>Malar Myine 2 St, 16 W, North Okkalar, Yangon.</small>
                                                    </td>
                                                    <td class="text-start text-nowrap">100 - 500</td>
                                                    <td class="text-start text-nowrap text-capitalize">Apartment</td>
                                                    <td class="text-center text-nowrap ">210</td>


                                                    <td >
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div class="mx-1">
                                                                <a href="./project/projectDetail.html"  class="  info-icon px-2 py-1">
                                                                    <i class="bi bi-info-circle text-info fa-fw"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mx-1 d-none">
                                                                <button  class="btn  edit-icon px-2 py-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                </button>
                                                            </div>
                                                            <div class="mx-1 text-nowrap d-none">
                                                                <form action="">
                                                                    <a href="" class="trash-icon px-2 py-1">
                                                                        <i class="bi bi-trash text-danger fa-fw"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="fs-6 text-center text-nowrap">
                                                            12-Apr-2022<br>
                                                            <small>3days ago</small>
                                                        </div>
                                                    </td>
                                                </tr>



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--                end content-->
        </div>
        <!--            end Nav-->
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<script src="../node_modules/bootstrap/dist/js/bootstrap.js "></script>
<!--<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js "></script>-->
<script src="../js/layout.js"></script>
<script src="../js/app.js"></script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['14-Dec-2022', '15-Dec-2022', '16-Dec-2022', '17-Dec-2022', '18-Dec-2022', '19-Dec-2022','20-Dec-2022','21-Dec-2022','22-Dec-2022','23-Dec-2022'],
            datasets: [{
                label: 'Total Visitor',
                data: [12, 15, 10, 5, 8, 3, 7, 5, 9, 11],
                backgroundColor: [
                    '#F5CC7A',
                ],
                borderColor: [
                    '#F5CC7A',
                ],
                borderWidth: 0,
                barPercentage:0.8,
                borderRadius:2,
                color:'#F5CC7A',

                fill:false


            }]
        },
        options: {
            plugins: {
                legend:{
                    display:false
                }
            },
            scales: {
                x:{
                    ticks:{
                        display:true,
                        color:'#F5CC7A',
                    },
                    grid:{
                        display:false,
                        drawOnChartArea:false,
                        // borderWidth:0,
                        drawBorder:false
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks:{
                        display:true,
                        color:'#F5CC7A',

                    },
                    grid:{
                        display:true,
                        drawOnChartArea:false,
                        drawBorder:false
                        // borderWidth:0,
                    }
                }
            }
        }
    });
</script>
<script>
    $(document).ready(function () {
        var t = $('#table_Project_In_Dashboard').DataTable({
            scrollX: true,
            responsive: true,
            paging: false,
            searching:false,
            ordering: true,
            info: false,
            order: [[1, 'asc']],
        });
    });
</script>

<script>
    //logoutt
    let logOut = document.querySelector('#logout');
    logOut.addEventListener('click',(e)=>{
        e.preventDefault();
        logout();
    })
</script>
</body>
</html>