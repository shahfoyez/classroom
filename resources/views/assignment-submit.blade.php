@extends('layouts.general.generalMaster')

@section('content')
    @error('assignment')
    <div class="alert alert-warning ml-5 mr-5 mt-3" role="alert" >
        <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
    </div>
    @enderror
    @if (session()->has('message'))
        <div x-data="{ show:true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="alert alert-success pb-0 ml-5 mr-5 mt-3">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <!-- Begin Page Content -->
    <div class="container mx-auto shadow-sm mb-4 pt-4" style="min-height: 525px; margin-top: 30px; background-color: #e9e9e912">
        <div class="row m-2">
             <!-- Assignment Details -->
            <div class="{{ $assignment->post->user->id == auth()->user()->id ? 'col-lg-10' : 'col-lg-8'}} ">
                <div class="row">
                    <h1 class="text-primary">
                        <i class="fas fa-clipboard-list"></i> {{ $assignment->title }}
                    </h1>
                    <h6 class="ml-auto float-right font-weight-bold pt-2">
                        @foreach ($assignment->assignmentSubmission as $submission)
                            @if(auth()->user()->id == $submission->user_id)
                                @if($submission->grade)
                                    {{ "You Got ".$submission->grade->points."/".$assignment->points }}
                                @else
                                    {{ "Not Graded" }}
                                @endif
                            @endif
                        @endforeach
                    </h6>
                </div>
                <div class="row ml-4">
                    <p class="text-dark mr-3"><i class="fas fa-user-tie"></i> {{ $assignment->post->user->fname." ".$assignment->post->user->lname }}</p>
                    <p class="text-dark"> <i class="far fa-calendar-alt"></i> {{ " ".Carbon\Carbon::parse($assignment->due_date)->format('M d, Y')}}</p>
                </div>
                <div class="row ml-4">
                    @if ($assignment->points)
                        <p class="text-dark font-weight-bold">{{ $assignment->points." Points" }}</p>
                    @else
                        <p class="text-dark font-weight-bold">{{ "No Points" }}</p>
                    @endif
                    @if($assignment->due_date && $assignment->due_time)
                        @if(date('Y-m-d') > $assignment->due_date)
                        <p class="ml-auto text-dark font-weight-bold">{{ "Exceded ".Carbon\Carbon::parse($assignment->due_date)->format('M d, Y')}}</p>
                        @elseif(date('Y-m-d') == $assignment->due_date)
                            @if (date("H:i:s") >= $assignment->due_date)
                            <p class="ml-auto text-dark font-weight-bold">{{ "Exceded ".Carbon\Carbon::parse($assignment->due_date)->format('M d, Y')}}</p>
                            @else
                            <p class="ml-auto text-dark font-weight-bold">{{ "Due Today ".Carbon\Carbon::parse($assignment->due_time)->format('g:i A')}}</p>
                            @endif
                        @else
                        <p class="ml-auto text-dark font-weight-bold">{{ "Due ".Carbon\Carbon::parse($assignment->due_date)->format('D m').", ".Carbon\Carbon::parse($assignment->due_time)->format('g:i A') }}</p>
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
                        {{ $assignment->instruction }}
                    </p>
                </div>


                @if($assignment->post->attachment)
                <div class="card mb-3 ml-4 rounded" style="max-width: 700px; max-height:300px; box-shadow: 0 .125rem .25rem 0 rgba(58,59,69,.2)!important;">
                    <div class="row no-gutters mb-0">
                        <div class="col-md-4">
                            <img  src="{{ asset('uploads/classrooms/attachments/'.$assignment->post->attachment->path) }}" style="width: 225px; height: 200px;cursor:pointer;"
                                onclick="onClick(this)" class="w3-hover-opacity rounded-left">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title" style="padding: 44px 40px 44px 40px;"><a href="{{ route('getfile', 'uploads/classrooms/attachments/'.$assignment->post->attachment->path) }}">{{ $assignment->post->attachment->path }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- Assignment Details End -->
            <!-- Submit cards -->
            @if($assignment->post->user->id != auth()->user()->id)
            <div class="col-lg-4">
                <form class="user" method="post" action="/assignmentSubmit/{{ $assignment->id }}" enctype="multipart/form-data">
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

                        <iframe src="" id="pdf-view" height="80" frameborder="0px" title="Preview" style="display: none; margin-bottom: 20px; border: 1px solid black;"></iframe>
                        <?php $submitted=0; ?>
                        @foreach ($assignment->assignmentSubmission as $submission)
                            @if(auth()->user()->id == $submission->user_id)
                                <?php $submitted=1;?>
                            @endif
                        @endforeach

                        @if($submitted==1)
                            <iframe src="{{ asset('uploads/classrooms/assignments/'.$submission->assignmentAttachment->path) }}" id="pdf-view" height="140" frameborder="0px" title="Preview" style="margin-bottom: 20px; border: 1px solid black;"></iframe>
                            <a href='/viewPdf/{{ $submission->id }}' class="btn btn-outline-dark btn-block mb-3" >
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
                                    <input name="assignment" onclick="myFunction()" type=file id="id_quotationFile">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        @endif

                    </div>
                </form>
                <form method="post" action="/assignmentComment/{{ $assignment->id }}/{{ $classroom->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card p-2 ml-5 mt-3 shadow-sm">
                        <div class="input-group mb-3 mt-3">
                            <img src="{{ asset('uploads/profiles/'.auth()->user()->image) }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                            <input name="comment" type="text" class="form-control rounded-pill" placeholder="Add a class comment..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-circle" type="submit" id="button-addon2"><i class="fas fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
            <!-- Submit Cart End -->
        </div>
    </div>
    <!-- Container -->
     <!-- Comment Start -->
      <div class="container mx-auto shadow-sm mb-2 mt-4 pt-3 pb-4 mb-5" style="background-color: #e9e9e912">
        <div class="row col-md-12">
            <div class="col-md-12">
                <div>
                    <div class="card-body">
                        <h4 class="card-title" > Comments {{ "(".$assignment->comments->count().")" }}</h4>
                    </div>
                    @foreach ($assignment->comments as $comment)
                        {{-- @if($comment->user->id== auth()->user()->id || auth()->user()->id == $classroom->user->id) --}}
                            <div class="comment-widgets m-b-20">
                                <div class="d-flex flex-row comment-row">
                                    <div class="pr-3"><span class="round"><img src="{{ asset('uploads/profiles/'.$comment->user->image) }}" alt="user" width="50" height="50"></span></div>
                                    <div class="comment-text w-100">
                                        <h5 class="{{ $comment->user->id== $classroom->user->id ? 'font-weight-bold' : '' }}" style="color:#8aa7e9;">{{ $comment->user->id == $classroom->user->id ?  $comment->user->fname." ".$comment->user->lname." (Teacher)" : $comment->user->fname." ".$comment->user->lname}}</h5>
                                        <div class="comment-footer">
                                            <span class="date">{{ $comment->created_at->diffForHumans(); }}</span>
                                        </div>
                                        <p class="m-b-5 mt-3 font-weight-bold">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        {{-- @endif --}}
                    @endforeach

                </div>
                @if(auth()->user()->id==$classroom->user->id)
                    <form method="post" action="/assignmentComment/{{ $assignment->id }}/{{ $classroom->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card p-2">
                            <div class="input-group mb-3 mt-3">
                                <img src="{{ asset('uploads/profiles/'.auth()->user()->image) }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                                <input name="comment" type="text" class="form-control rounded-pill" placeholder="Add a class comment..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-circle" type="submit" id="button-addon2"><i class="fas fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
      </div>
       </div>
    <!-- Comment End -->
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
