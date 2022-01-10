@include('shared.header')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('shared.sidebar')
        <!-- End of Sidebar -->

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
                    <!-- ROW -->
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card bg-dark shadow p-3 mb-3 bg-white rounded" style="background-image: url({{ url('assets/img/banner/b2.jpg') }}); background-size: 1200px 200px; height: 210px;">
                                {{-- <img src="{{ asset('assets/img/banner/b2.jpg') }}" height="175" class="card-img" alt="..."> --}}
                                <div class="card-img-overlay">
                                    <h1 class="card-title" style="color: #ffffff"><b>{{ $classroom->name }}</b></h1>
                                    <h3 style="color: #ffffff">{{ $classroom->section }}</h3>
                                    <p class="card-text" style="color: #ffffff">{{ $classroom->subject }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="card border">
                                        <div class="card-body">
                                            <h5>Upcoming</h5>
                                            <p class="card-text">Woohoo, no work due soon!</p>
                                            <a class="float-right" href="!#">View all</a>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="dropdown no-arrow float-right">
                                                <a class="btn btn-circle dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="#">Copy Code</a>
                                                        <a class="dropdown-item" href="#">Copy Class Link</a>
                                                </div>
                                            </div>
                                            <h5>Class Clode</h5>
                                            <p class="card-text" style="font-size: 40px; color: #30e930;">{{ "[ ".$classroom->code." ]" }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-9">
                                    <!-- ROW -->
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div id = "clicked-post" class="card shadow-sm">
                                                <div class="card-body">
                                                    <img src="{{ asset('img/image1.jpg') }}" width="35" height="35" alt="..." class="rounded-circle mr-2 text-none">
                                                    <a  class = "text-decoration-none" href="#!">Share something with your class</a>
                                                </div>
                                            </div>
                                            <!-- TEXT AREA -->
                                            <div id = "post-textarea" class="card shadow-sm d-none">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <textarea class="form-control bg-gray-200" id="exampleFormControlTextarea1" placeholder = "Share Something" rows="3"></textarea>
                                                    </div>
                                                    <div class="float-left">

                                                        <div class="dropdown no-arrow ml-auto animated--grow-in">
                                                        <a class="btn btn-circle dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-paperclip text-primary" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                            <div class="dropdown-header">Dropdown Header:</div>
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm btn-primary m-1 pl-3 pr-3 float-right">
                                                        Post
                                                    </button>
                                                    <button id = "cancel-post" class="btn btn-sm btn-outline-dark m-1 float-right">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- END TEXT AREA -->
                                        </div>
                                        <!-- END COL -->
                                        <!-- COL -->
                                        <div class="col-12">
                                            <!-- CARD -->
                                            <div class="card shadow-sm mt-3">
                                                <div class="card-body">
                                                    <img src="{{ asset('img/image1.jpg') }}" width="35" height="35" alt="..." class="rounded-circle mr-2 mb-2 float-left">
                                                    <div class="dropdown no-arrow float-right">
                                                        <a class="btn btn-circle dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                            <div class="dropdown-header">Dropdown Header:</div>
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </div>
                                                    <!-- Container -->
                                                    <div class="container">
                                                    <h4 class="text-primary">Keshav Mishra</h4>
                                                    <h6>Nov 6</h6>
                                                    </div>
                                                    <!-- End Container -->
                                                    <!-- CARD -->
                                                    <div class="card mb-3 ml-2" style="max-width: 400px; max-height:100px;">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">
                                                        <img src="{{ asset('img/undraw_posting_photo.svg') }}" class="card-img img-fluid d-none d-lg-block" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title "><a href="https://docs.google.com/forms/d/e/1FAIpQLSccgb82znneJJtvVPPMWOLtEwvIqbeyZyMtdpANa9_Bzh0uEA/viewform?usp=sf_link">Google Forms:sign in</a>
                                                            </h5>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <!-- END CARD -->
                                                </div>
                                                <div class="input-group mb-3 mt-3">
                                                <img src="{{ asset('img/image1.jpg') }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                                                <input type="text" class="form-control rounded-pill" placeholder="Add a class comment..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                                <div class="input-group-append">
                                                    <button class=" btn btn-circle" type="button" id="button-addon2"><i class="fas fa-angle-double-right"></i></button>
                                                </div>
                                                </div>
                                            </div>
                                            <!-- END CARD -->
                                        </div>
                                        <!-- END COL -->
                                        </div>
                                    </div>
                                    <!-- END ROW -->
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- ROW END -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; KOSAI<sup>3</sup> 2022</span>
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
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
