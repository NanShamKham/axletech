<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <script type="text/javascript">
            $(document).ready(function() {
                $('.amenity').select2();
            });
          </script>
    <title>Admin Page</title>
</head>
<body>
    <div class="m-2 p-2"></div>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/image/smtlogo.png" alt="" style="width:50px;height:auto"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ url('/admin/project')}}">Project</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/category') }}">Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/amenity') }}">Amenity</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/citystate') }}">City</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/township') }}">Township</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/slider') }}">Slider</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/facebooklink') }}">FaceBooklink</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('admin/contact') }}">Contact</a>
                </li>
              </ul>

              <!-- mail notification -->
                <button type="button" class="btn btn-primary position-relative">
                    Mails <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">32<span class="visually-hidden">unread messages</span></span>
                </button>
              <!-- end mail notification -->

              <form class="d-flex" action="{{ url('/admin/logout') }}" method="POST">
                @csrf
                <input type="submit" value="Logout" style="background: #e60000;" class="text-white m-2 p-2">
              </form>
            </div>
          </div>
        </nav>
        <div class="card-header text-light text-center m-1 p-1" style="background: #009999;" ><h4>[ Hello Admin ]</h4></div>
        
    <div class="m-2 p-2"></div>
    @yield('content')
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

 