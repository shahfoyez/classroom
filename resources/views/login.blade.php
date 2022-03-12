<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ACASTRY</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand mr-auto mt-2 mt-lg-0" href="#">ACASTRY CLASSROOM</a>
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        <a href="/register" class="btn btn-outline-success my-2 my-sm-0" type="submit">Register</a>
    </div>
  </nav>


  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    </div>
                    <form class="user" method="post" action="/session" enctype="multipart/form-data">
                        @csrf
                            @error('error')
                                <div class="alert alert-warning" role="alert">
                                    <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                                </div>
                            @enderror

                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" value="{{ old('firstname') }}" placeholder="Enter Email Address...">
                            @error('email')
                                <p class="error text-danger" style="font-size: 15px; margin-left:10px; margin-top:6px; margin-bottom:0px">{{ "*".$message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" value="{{ old('firstname') }}" placeholder="Password">
                            @error('password')
                                <p class="error text-danger" style="font-size: 15px; margin-left:10px; margin-top:6px; margin-bottom:0px">{{ "*".$message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            <span>LOG IN</span>
                        </button>
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="/register">Create an Account!</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
