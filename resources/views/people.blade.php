@include('shared.header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('shared.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" style="margin-bottom:40px;">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!------------------------ Sidebar Toggle (Topbar) ------------------------->
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <h6 style="color:#3762e2;  font: 14px Arial, sans-serif;">{{ $classroom->name }}</h6>
            <h6 style="color: #3762e2 font: 14px Arial, sans-serif;">{{ " (".$classroom->section.")" }}</h6>

            <ul class="navbar-nav ml-auto" style="align:center">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow" style="align:center" style="align:center">
                    <div class="collapse navbar-collapse align-left" id="navbarNav" style="align:center">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" style="color:blue">Stream</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color:black">Classwork</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color:black">Industry Work</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/people/{{ $classroom->id }}" style="color:black">People</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" style="align:center">
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                        </a>
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                        </a>
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="col-lg-8 mx-auto">

          <!-- Teachers -->
          <h3 class="text-primary font-weight-bold">Teachers</h3>
          <hr>
          <div class="row">
			<img width="25px" height="25px" class="img-profile rounded-circle" src="profile.png">
            <p class="text-dark">Aneesh Mokashi</p>
            <button class="ml-auto btn btn-secondary">mail</button>
          </div>
          <hr>
          <div class="row">
			<img width="25px" height="25px" class="img-profile rounded-circle" src="profile.png">
            <p class="text-dark">Keshob Mishra</p>
            <button class="ml-auto btn btn-secondary">mail</button>
          </div>
          <hr>
          <div class="row">
			<img width="25px" height="25px" class="img-profile rounded-circle" src="profile.png">
            <p class="text-dark">Jaideep More</p>
            <button class="ml-auto btn btn-secondary">mail</button>
          </div>


          <!-- Students -->
          <div class="row mt-4">
            <div class="col-lg-8">
              <h3 class="text-primary font-weight-bold">Students</h3>
            </div>
            <div class="col-lg-4 ">
              <p class="text-primary ml-auto float-right"> 3 Students</p>
            </div>
          </div>
          <hr>
          <div class="row">
			<img width="25px" height="25px" class="img-profile rounded-circle" src="profile.png">
            <p class="text-dark">Aneesh Mokashi</p>
            <button class="ml-auto btn btn-secondary">mail</button>
          </div>
          <hr>
          <div class="row">
			<img width="25px" height="25px" class="img-profile rounded-circle" src="profile.png">
            <p class="text-dark">Keshob Mishra</p>
            <button class="ml-auto btn btn-secondary">mail</button>
          </div>
          <hr>
          <div class="row">
			<img width="25px" height="25px" class="img-profile rounded-circle" src="profile.png">
            <p class="text-dark">Jaideep More</p>
            <button class="ml-auto btn btn-secondary">mail</button>
          </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
