@include('shared.header')

<body id="page-top">
    <div id="wrapper">
        @if (!(request()->is('studentsWork/*') || request()->is('industryWork/*')))
        <!------------------- Sidebar -------------------->
        @include('shared.sidebar')
        <!------------------- Sidebar -------------------->
        @endif

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" style="background-color: #ffffff;">
                <!-- Topbar -->
                @include('navbars.navBar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!--------------- Footer ------------------->
            @include('shared.footer')
            <!---------------- Footer ------------------->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!----------------------------- Create class, Join Class, Logout Modal ------------------------->
    @include('modals.logout')
    @include('modals.joinClass')
    @include('modals.createClass')
    @include('modals.imageModal')

    <!---------------------------------Create class, Join Class, Logout Modal--------------------------->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "order": [[ 0, "desc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": [1, 4]}
                ]
            });
        } );
    </script>
    <script>
        function onClick(element) {
          document.getElementById("img01").src = element.src;
          document.getElementById("modal01").style.display = "block";
        }
    </script>
</body>
</html>
