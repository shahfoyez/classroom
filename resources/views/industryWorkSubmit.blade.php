@extends('layouts.general.generalMaster')

@section('content')
    @error('industryWork')
    <div class="alert alert-warning ml-5 mr-5" role="alert" >
        <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
    </div>
    @enderror
    @if (session()->has('message'))
        <div x-data="{ show:true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="alert alert-success pb-0 ml-5 mr-5">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <!-- Begin Page Content -->
    <div class="container mx-auto shadow-sm mb-5 pt-3 " style="min-height: 525px; margin-top: 30px">
        <div class="row m-2">
             <!-- Assignment Details -->
            <div class="{{ ($classroom->user->id == auth()->user()->id || $industryWork->user_id == auth()->user()->id) ? 'col-lg-10' : 'col-lg-8'}} " >
                <div class="row">
                    <h1 class="text-primary">
                        <i class="fas fa-clipboard-list"></i> {{ $industryWork->title }}
                    </h1>
                    <h6 class="ml-auto float-right font-weight-bold pt-2">
                        @foreach ($industryWork->industryWorkSubmission as $submission)
                            @if(auth()->user()->id == $submission->user_id && auth()->user()->id != $classroom->user->id)
                                @if($submission->industryGrade)
                                    @if ($submission->industryGrade->industry_points)
                                        <p>{{ $industryWork->user->fname." ".$industryWork->user->lname.": ".$submission->industryGrade->industry_points."/".$industryWork->points }}</p>
                                    @endif
                                    @if($submission->industryGrade->teacher_points)
                                        <p>{{ $classroom->user->fname." ".$classroom->user->lname.": ".$submission->industryGrade->teacher_points."/".$industryWork->points }}</p>
                                    @endif
                                @else
                                    {{ "Not Graded" }}
                                @endif
                            @endif
                        @endforeach
                    </h6>
                </div>
                <div class="row ml-4">
                    <p class="text-dark mr-3"><i class="fas fa-user-tie"></i> {{ $industryWork->user->fname." ".$industryWork->user->lname }}</p>
                    <p class="text-dark"> <i class="far fa-calendar-alt"></i> {{ " ".Carbon\Carbon::parse($industryWork->due_date)->format('M d, Y')}}</p>
                </div>
                <div class="row ml-4">
                    @if ($industryWork->points)
                        <p class="text-dark font-weight-bold">{{ $industryWork->points." Points" }}</p>
                    @else
                        <p class="text-dark font-weight-bold">{{ "No Points" }}</p>
                    @endif
                    @if($industryWork->due_date && $industryWork->due_time)
                        @if(date('Y-m-d') > $industryWork->due_date)
                        <p class="ml-auto text-dark font-weight-bold">{{ "Exceded ".Carbon\Carbon::parse($industryWork->due_date)->format('M d, Y')}}</p>
                        @elseif(date('Y-m-d') == $industryWork->due_date)
                            @if (date("H:i:s") >= $industryWork->due_date)
                            <p class="ml-auto text-dark font-weight-bold">{{ "Exceded ".Carbon\Carbon::parse($industryWork->due_date)->format('M d, Y')}}</p>
                            @else
                            <p class="ml-auto text-dark font-weight-bold">{{ "Due Today ".Carbon\Carbon::parse($industryWork->due_time)->format('g:i A')}}</p>
                            @endif
                        @else
                        <p class="ml-auto text-dark font-weight-bold">{{ "Due ".Carbon\Carbon::parse($industryWork->due_date)->format('D m').", ".Carbon\Carbon::parse($industryWork->due_time)->format('g:i A') }}</p>
                        @endif
                    @else
                        <p class="ml-auto text-dark font-weight-bold"> {{ "No due date" }}</p>
                    @endif
                </div>
                <div class="row ml-4">
                    <hr style=" border-top: 1px solid #4368d7; width: 100%; margin-top: -10px;">
                </div>

                <div class="row ml-4">
                    <p class="text-dark">
                        {{ $industryWork->instruction }}
                    </p>
                </div>


                @if($industryWork->image)
                <div class="card mb-3 ml-4 rounded" style="max-width: 700px; max-height:300px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img  src="{{ asset('uploads/classrooms/attachments/'.$industryWork->image) }}" style="width:100%;cursor:pointer"
                                onclick="onClick(this)" class="w3-hover-opacity rounded-left">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title mt-5"><a href="{{ route('getfile', 'uploads/classrooms/attachments/'.$industryWork->image) }}">{{ $industryWork->image }}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


            </div>
            <!-- Assignment Details End -->
            <!-- Submit cards -->
            @if($classroom->user->id != auth()->user()->id && $industryWork->user_id != auth()->user()->id )
            <div class="col-lg-4">
                <form class="user" method="post" action="/industryWorkSubmit/{{ $industryWork->id }}/{{ $classroom->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card p-4 ml-5 shadow-sm">
                        <div class="row">
                            <h4 class="text-primary pl-2">
                                Your Work
                            </h4>
                            {{-- <p class="ml-auto text-success pr-3">
                                Assigned
                            </p> --}}
                        </div>

                        <iframe src="" id="pdf-view" height="140" frameborder="0px" title="Preview" style="display: none; margin-bottom: 20px; border: 1px solid black;"></iframe>
                        <?php $submitted=0; ?>
                        @foreach ($industryWork->industryWorkSubmission as $submission)
                            @if(auth()->user()->id == $submission->user_id)
                                <?php $submitted=1;?>
                            @endif
                        @endforeach

                        @if($submitted==1)
                            <iframe src="{{ asset('uploads/classrooms/industryWork/'.$submission->attachment_path) }}" id="pdf-view" height="140" frameborder="0px" title="Preview" style="margin-bottom: 20px; border: 1px solid black;"></iframe>
                            <a href='/viewWorkPdf/{{ $submission->id }}' class="btn btn-outline-dark btn-block mb-3" >
                                <i class="fas fa-check"></i> View
                            </a>
                        @else
                            <a class="btn btn-outline-dark btn-block mb-3" href="#" role="button"    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add or create
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"     style="margin-left: 16px;
                                width: 248px;
                                background-color: #ccdaff;
                                padding-left: 10px;" aria-labelledby="dropdownMenuLink">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Select PDF Only</label>
                                    <input name="industryWork" onclick="myFunction()" type=file id="id_quotationFile">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        @endif

                    </div>
                </form>

                <div class="card p-2 ml-5 mt-3 shadow-sm">
                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3 mt-3">
                            <img src="{{ asset('uploads/profiles/'.auth()->user()->image) }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                            <input name='comment' type="text" class="form-control rounded-pill" placeholder="Add a class comment..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class=" btn btn-circle" type="submit" id="button-addon2"><i class="fas fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            <!-- Submit Cart End -->
        </div>

    </div>
    <!-- Container -->
    <script>
        $(function() {
            function readURL(input, target) {
                input = $(input).get(0);
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(target).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
                $(".details").html("Preview: '" + input.files[0].name + "' Type: " + input.files[0].type);
                }
            }
            $("#fileUpload").click(function() {
                $("#id_quotationFile").trigger("click");
            });
            $("#id_quotationFile").change(function() {
                readURL(this, $("#pdf-view"));
            });
        });

        function myFunction() {
        var x = document.getElementById("pdf-view");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        }
    </script>
@endsection
