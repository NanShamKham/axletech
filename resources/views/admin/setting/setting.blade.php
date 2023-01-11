<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile - SMT</title>
    <link rel="icon" href="../../images/smtlogo.png" type="image/png">

    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../css/userProfile.css">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../../css/datatable.css">


    <!--    sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
<section id="app" class="">

    <div class="row justify-content-start align-items-center g-0">
        <!--            start Aside-->
        <!--            backdrop-->
        <div class="w-100 vh-100 bg-black overflow-hidden bg-opacity-50 fixed-top d-none" id="backdrop"></div>
        <!-- backdrop-->
        <!--            col-4 col-md-3 col-lg-2-->
        <aside class="vh-100 bg-secondary aside-hide shadow-lg ">
            <div class="d-flex justify-content-end">
                <button class="btn btn-link " id="close-aside">
                    <i class="bi bi-x-circle"></i>
                </button>
            </div>
            <div class="header justify-content-center align-items-center">
                <img src="../../images/smtlogo.png" alt="">
            </div>
            <div id="side"  class="bg-secondary w-100 my-3">
                <ul class="list-unstyled">
                    <a class="side-link   w-100" href="../dashboard.html" >
                        <li class="py-3 side-item px-3 ">
                            Dashboard
                        </li>
                    </a>
                    <a class="side-link  w-100" href="../contactUs/contact_us_empty_view.html" >
                        <li class="py-3 side-item px-3">
                            Contact Us
                        </li>
                    </a>
                    <a class="side-link  w-100" href="../project/project.html" >
                        <li class="py-3 side-item px-3">
                            Projects
                        </li>
                    </a>
                    <a class="side-link  w-100" href="../category/category.html" >
                        <li class="py-3 side-item px-3">
                            Cateogries
                        </li>
                    </a>
                    <a class="side-link  w-100" href="../amenities/amenities.html" >
                        <li class="py-3 side-item px-3">
                            Amenities
                        </li>
                    </a>
                    <a class="side-link  w-100" href="../address/address.html" >
                        <li class="py-3 side-item px-3">
                            Address
                        </li>
                    </a>
                    <a class="side-link  w-100" href="../facebookLink/facebookLink.html" >
                        <li class="py-3 side-item px-3">
                            Facebook Link
                        </li>
                    </a>
                    <a class="side-link  w-100" href="../sliderImage/sliderImage.html" >
                        <li class="py-3 side-item px-3">
                            Slider Images
                        </li>
                    </a>
                    <a class="side-link active w-100" href="setting.html" >
                        <li class="py-3 side-item px-3">
                            Setting
                        </li>
                    </a>
                </ul>


            </div>
        </aside>
        <!--            end Aside-->
        <!--            col-12 col-md-12 col-lg-10-->
        <div class=" min-vh-100 px-0 g-0 right">
            <!--                start Nav-->
            <nav class="navbar ">
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
                                    <img src="../../images/unaylintun.png" alt="" style="width: 100%;height: 100%;object-fit: cover">
                                </div>
                                <div class="dropdown-menu dropdown-menu-end bg-secondary text-primary py-0">
                                    <!--                                    profile hover card-->
                                    <div class="profile-hover-card">
                                        <div class="card bg-secondary text-primary px-2 py-2" style="max-width: 500px" >
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fw-light px-3"> SMT Admin Dashboard </span>
                                                <form action="">
                                                    <button class="btn btn-link fw-light" id="logout">Log out</button>
                                                </form>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center my-3 px-3">
                                                <div class="overflow-hidden rounded rounded-circle border border-primary " style="width:100px;height:100px">
                                                    <a href="">
                                                        <img src="../../images/unaylintun.png" alt="" style="width: 100%;height: 100%;object-fit: cover">
                                                    </a>
                                                </div>
                                                <div class="ps-3">
                                                    <span class="fs-5 fw-bold">Win Win Maw</span>
                                                    <span class="fw-light d-block mb-3">winwinmaw@gmail.com</span>
                                                    <a href="../user/userProfile.html" class="text-decoration-underline fw-light">View Detail</a>
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
            <div class="content ">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="py-3 px-3">
                        <!--                        Setting -->
                        <div class="row g-0">
                            <div class="col-12 mt-4 mb-3">
                                <h5 class="text-white-50">Setting</h5>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center rounded ps-0 pe-3 py-1">
                                    <div class="">
                                        <h5 class="text-primary">Admin/Moderator List</h5>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn mx-1 trash-icon px-2 py-1 position-relative " id="multiple_deletion_moderator">
                                            <i class="bi bi-trash text-danger fa-fw fs-4"></i>
                                            <span id="checkedCount" class="position-absolute rounded-circle bg-danger border border-secondary text-white d-flex justify-content-center align-items-center p-1" style="width: 15px;height: 15px;font-size: 12px;top: 50%;">0</span>
                                        </button>
                                        <a href="{{route('setting.create')}}" class="mx-1 create-btn px-2 py-1 rounded">
                                            <i class="bi bi-plus-circle"></i>
                                            Create Moderator
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mt-1 mb-3">
                                    <div class="card bg-secondary table-card">
                                        <div class="card-body">
                                            <div class="w-100">
                                                <table id="table_moderator" class="w-100 display nowrap row-border table table-bordered align-middle table-hover mb-0">
                                                    <thead class="">
                                                    <tr class="bg-primary text-secondary">
                                                        <th class="text-center" data-orderable="false">
                                                            <input type="checkbox" id="allSelectModerator" name="allSelectModerator" class="form-check-input border-secondary">
                                                        </th>
                                                        <th class="text-center">NO</th>
                                                        <th class="text-center" data-orderable="false">Photo</th>
                                                        <th class="">Name</th>
                                                        <th>Role</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th class="text-center" data-orderable="false">Action</th>
                                                        <th class="text-nowrap text-center">Modify Date</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody class="bg-secondary text-white">
                                                    @foreach($data as $data)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="chk[]" class="form-check-input checkboxModerator">
                                                        </td>
                                                        <th scope="row" class="text-center">{{$data->id}}</th>
                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <div class="user-photo">
                                                                <div class="border border-secondary rounded-circle"  style="width:50px;height: 50px;">
                                                                    <img src="{{asset('images/admin/'.$data->image)}}" alt="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-start text-nowrap text-capitalize">{{$data->name}}</td>
                                                        <td class="text-start text-nowrap text-capitalize">{{$data->role}}</td>
                                                        <td class="text-start text-nowrap ">{{$data->phone}}</td>
                                                        <td class="text-start text-nowrap ">{{$data->email}}</td>
                                                        <td >
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="mx-1">
                                                                    <a href="{{route('setting.edit',$data->id)}}"  class="btn edit-icon px-2 py-1" >

                                                                        <i class="bi bi-pencil-square text-primary fa-fw"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="mx-1 text-nowrap">
                                                                    <form action="route('setting.destroy',$data->id ??'')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" onclick="deleteConfirm(1)" class="btn trash-icon px-2 py-1">
                                                                            <i class="bi bi-trash text-danger fa-fw"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="fs-6 text-center text-nowrap">
                                                                {{$data->created_at->format('Y-m-d')}}<br>
                                                                <small>{{$data->created_at->diffForHumans()}}</small>
                                                            </div>
                                                        </td> 
                                                    </tr>
                                                    @endforeach
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
            </div>
            <!--                end content -->

        </div>



    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js "></script>
<!--    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js "></script>-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="{{asset('js/layout.js')}}"></script>
    <script src="{{asset('js/appp.js')}}"></script>
    <script>
        $(document).ready(function () {
            var t = $('#table_moderator').DataTable({
                scrollX: true,
                responsive: true,
                order: [[1, 'asc']],
            });
        });
    </script>

    <script>
        let allSelect = document.getElementById('allSelectModerator');
        let checkboxes = document.getElementsByClassName('checkboxModerator');
        let checkCount = document.getElementById('checkedCount');

        let count  = 0;

        //FOR All SELECT CHECKBOX COUNT
        allSelect.onclick = function (){
            count = 0;

            for(let checkbox of checkboxes){
                checkbox.checked = this.checked;
                if(checkbox.checked == true){
                    count++;
                    checkCount.innerHTML = count;
                }else{
                    count = 0;
                    checkCount.innerHTML = count;
                }
                multipleDeleteBtn(count);
            }
        }

        //FOR INDIVIDUAL SELECT CHECKBOX COUNT
        for(let i=0; i < checkboxes.length;i++){
            checkboxes[i].addEventListener('click',()=>{
                //make sure if checkbox is checked or not
                if(checkboxes[i].checked){
                    count++;
                }else{
                    count--;
                }

                multipleDeleteBtn(count);
                checkCount.innerHTML = count;

            })
        }

        //  multiple deletion
        let multipleDeletion = document.getElementById('multiple_deletion_moderator');
        function multipleDeleteBtn(count){
            if(count > 0){
                multipleDeletion.classList.remove('trash-icon-disable')
                checkCount.classList.remove('d-none')
                multipleDeletion.disabled = false;

            }else{
                multipleDeletion.classList.add('trash-icon-disable')
                checkCount.classList.add('d-none')
                multipleDeletion.setAttribute("disabled", "");

            }
        }
        multipleDeleteBtn(count);

        multipleDeletion.addEventListener('click',()=>{
            if(count>1){
                multipleDeleteConfirm();
            }else{
                alert(' please check at least minimum one row');
            }
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