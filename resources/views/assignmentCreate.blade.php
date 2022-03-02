@include('shared.header')
<style>
    .form-control{
        background-color: #e3f3f9;
    }
</style>
<body>
    <form class="user" method="post" action="/assignmentCreate" enctype="multipart/form-data" style=" border-bottom: 1px solid #b7a9a9;">
        @csrf
        <nav class="navbar navbar-light bg-light" style="border-bottom: 1px solid black">
            <div class="navbar-brand">
                <a href="/classwork/{{ $classroom->id }}"><i class="fas fa-times"></i></a>
                <div class="pl-3 float-right">Assignment</div>
            </div>
            <div class="btn-group" >
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>
        </nav>

        <div class="container-fluid">
            @if (session()->has('message'))
                <div x-data="{ show:true }"
                    x-init="setTimeout(() => show = false, 4000)"
                    x-show="show"
                    class="alert alert-success pb-0">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <!-- Make -->
            <div class="row m-3" >
                <div class="col-lg-7 p-4 mt-sm-2">
                    <div class="form-group">
                        <label for="title"><i class="fas fa-clipboard"></i> Title</label>
                        <input name="title" class="form-control" type="" value="{{ old('title') }}" placeholder="Enter a title">
                    </div>
                    @error('title')
                        <div class="alert alert-warning" role="alert">
                            <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="form-group">
                        <label for="description"><i class="fas fa-pencil-ruler"></i> Instructions</label>
                        <textarea name="instruction" class="form-control" value="{{ old('instruction') }}" placeholder="Enter Instructions"></textarea>
                    </div>
                    @error('instruction')
                        <div class="alert alert-warning" role="alert">
                            <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="form-group">
                        <img class="shadow-lg p-1 bg-#e3f3f9; rounded" id="previewImage" width="250" height="130" style="overflow: hidden">
                    </div>
                    <div class="form-group">
                        <div class="dropdown no-arrow ml-auto animated--grow-in">
                            <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button"    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-paperclip text-primary" aria-hidden="true"></i>  Attachment
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">
                                    Select an Option
                                </div>
                                <input class="dropdown-item" type="file" name="image" id="fileToUpload" onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">

                                <a class="dropdown-item" href="#">
                                    Add Link
                                </a>
                                <a class="dropdown-item" href="#">
                                    Add Youtube Video
                                </a>
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <div class="alert alert-warning" role="alert">
                            <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <!-- The selection stuff -->
                <div class="col-lg-5 vl v p-4 mt-sm-2" style="height: 600px;">
                    <!-- For -->
                    <hr class='d-lg-none d-sm-block'>
                    <h6><i class="fas fa-clipboard"></i>  For</h6>
                    <div class="row">
                        <div class="col">
                            <select name="classroom" id="" class="form-control" name="">
                                <option selected value="{{ $classroom->id }}">{{ $classroom->name }}</option>

                                @foreach (auth()->user()->classroom as $authClassroom)
                                    @if($authClassroom->id != $classroom->id)
                                        <option value="{{ $authClassroom->id }}">{{ $authClassroom->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    @error('classroom')
                    <div class="alert alert-warning" role="alert">
                        <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                    </div>
                    @enderror
                    <!-- Points -->
                    <h6><i class="fas fa-clipboard"></i>  Points</h6>
                    <div class="row">
                        <div class="col-6">
                            <select name="points" class="form-control" name="">
                                <option value="100">100</option>
                                <option value="90">90</option>
                                <option value="80">80</option>
                                <option value="70">70</option>
                                <option value="60">60</option>
                                <option value="40">40</option>
                                <option value="30">30</option>
                                <option value="20">20</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    @error('points')
                    <div class="alert alert-warning" role="alert">
                        <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                    </div>
                    @enderror

                    <!-- Due Date-->
                    <h6><i class="fas fa-clipboard"></i>  Due Date</h5>
                    <div class="row">
                        <div class="col">
                            <input name="date" class="form-control" type="date" id="birthday" value="{{ old('date') }}">
                        </div>
                    </div>
                    <br>
                    @error('date')
                    <div class="alert alert-warning" role="alert">
                        <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                    </div>
                    @enderror

                    <!-- Due Time-->
                    <h6><i class="fas fa-clipboard"></i>  Due Time</h6>
                    <div class="row">
                        <div class="col">
                            <input name="time" class="form-control" type="time" id="appt" value="{{ old('time') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.container-fluid -->
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
