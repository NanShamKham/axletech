<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Edit - SMT</title>
    <link rel="icon" href="../../images/smtlogo.png" type="image/png">


    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/category.css">
    <link rel="stylesheet" href="../../css/userProfile.css">

    <!--    sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</head>
<body>




<section id="app">
    <div class="row justify-content-start align-items-center g-0">
        <!--            backdrop-->
        <div class="w-100 vh-100 bg-black overflow-hidden bg-opacity-75 fixed-top d-none" id="backdrop"></div>
        <!-- backdrop-->
        <!--            start Aside-->
        <!--            col-4 col-md-3 col-lg-2-->
        <aside class="vh-100 bg-secondary aside-hide ">
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
                    <a class="side-link  w-100" href="../dashboard.html" >
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
                    <a class="side-link active  w-100" href="./setting.html" >
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
            <div class="content">
                <div class="row g-0 flex-column flex-md-row justify-content-center justify-content-md-start ">
                    <!-- breadcrumb -->
                    <div class="bg-secondary bg-opacity-50 px-2 py-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="./setting.html">setting</a></li>
                                <li class="breadcrumb-item active">Moderator Edit</li>
                                <!--                                <li class="breadcrumb-item active" aria-current="page">Data</li>-->
                            </ol>
                        </nav>
                    </div>
                    <!-- end breadcrumb -->
                    <div class="w-100 ">
                        <div class="py-3 px-3">
                            <div class="row create">
                                <div class="col-12">
                                    <h4 class="mb-3 text-primary header">Moderator Edit</h4>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 ">
                                    <form action="" id="moderator-form" class="create-form moderator-form">
                                        <div class="row gx-1 d-flex flex-column flex-lg-row justify-content-center align-items-start mx-auto py-5">
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center align-items-center justify-content-lg-start">
                                                <div class="user-img-div d-flex justify-content-center align-items-center rounded-circle border border-primary overflow-hidden " >
                                                    <input type="file" class="form-control d-none" id="user_input">
                                                    <img src="../../images/unaylintun.png" id="user-img" alt="" >
                                                    <!--                                                                <i class="bi bi-camera-fill fa-fw fa-3x text-secondary"></i>-->
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-10 col-lg-7">
                                                    <div class="row row-cols-1 row-cols-lg-2">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="userName" class="form-label">User Name :</label>
                                                                <input type="text" id="userName" name="" value="John Doe"  class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">
                                                                <div class="text-danger error-text error-text">
                                                                    Please fill user name!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="role" class="form-label">Role :</label>
                                                                <input id="role" name="" type="text" value="Moderator" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">
                                                                <div class="text-danger error-text">
                                                                    Please fill role!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email :</label>
                                                                <input id="email" name="" type="email" value="moderator@gmail.com" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="admin@gmail.com">
                                                                <div class="text-danger error-text">
                                                                    Please fill email!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="phone" class="form-label">Phone :</label>
                                                                <input id="phone" name="" type="number" value="0987656787" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">
                                                                <div class="text-danger error-text">
                                                                    Please fill phone number!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Password :</label>
                                                                <input id="password" name="" value="password" type="password" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">
                                                                <div class="text-danger error-text">
                                                                    Please fill password!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="confirmPassword" class="form-label">Confirm Password :</label>
                                                                <input id="confirmPassword" name="" value="password" type="password" class="create-input form-control form-control-lg rounded rounded-1  text-white mb-2 mb-md-0 fs-6" placeholder="Admin">
                                                                <div class="text-danger error-text">
                                                                    Don't match password!
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="my-3">
                                                                <div class="d-flex justify-content-end align-items-center">
                                                                    <button onclick="formReset()" class="form-reset-btn btn btn-lg text-white fw-light rounded rounded-1 me-3">Reset</button>
                                                                    <button class="form-create-btn btn btn-primary btn-lg text-white rounded rounded-1">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </form>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="../../node_modules/bootstrap/dist/js/bootstrap.js "></script>
<!--<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.js "></script>-->
<script src="{{asset('js/layout.js')}}"></script>
<script src="{{asset('js/appp.js')}}"></script>


<script>
    //<!--    FOR COVER IMAGE-->
    let userImage = document.getElementById('user-img');
    let userInput = document.getElementById('user_input');

    userImage.addEventListener('click',_=>userInput.click());

    userInput.addEventListener("change",_=>{
        let file = userInput.files[0];
        let reader = new FileReader();
        reader.onload = function (){
            userImage.src = reader.result;
        }
        reader.readAsDataURL(file);
    })

    function formReset(){
        let formEle = document.getElementById('moderator-form');
        formEle.reset();
    }


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