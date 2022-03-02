@extends('layouts.general.generalMaster')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <style>
        .cart-hover:hover{
            background-color: #e9e9e9;
        }

    </style>
    <!-- ROW -->
    <div class="row col-lg-11 mx-auto" style="margin-bottom:20px;">
        <div class="col-12 ">
            <div class="card bg-dark shadow p-3 mb-3 bg-white rounded" style="background-image: url({{ url('assets/img/banner/b2.jpg') }}); background-size: 1000px 190px; height: 210px;">
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
                            <p class="card-text" style="font-size: 35px; color: #30e930;">{{ "[ ".$classroom->code." ]" }}
                        </div>
                    </div>
                    <br>
                    <div class="card border">
                        <div class="card-body">
                            <h5>Upcoming</h5>
                            <p class="card-text">Woohoo, no work due soon!</p>
                            <a class="float-right" href="!#">View all</a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">
                    <!-- ROW -->
                    <div class="row">
                        @if(auth()->user()->id == $classroom->created_by)
                        <div class="col-12 mb-2">
                            <div id = "clicked-post" class="card shadow-sm">
                                <div class="card-body">
                                    <img src="{{ asset('uploads/profiles/'.$classroom->user->image) }}" width="35" height="35" alt="..." class="rounded-circle mr-2 text-none">
                                    <a  class = "text-decoration-none" href="#!">Share something with your class</a>
                                </div>
                            </div>
                            <!-- TEXT AREA -->
                            <div id = "post-textarea" class="card shadow-sm d-none">
                                <form class="" method="post" action="/postSubmit" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea name="title" class="form-control bg-gray-200" id="exampleFormControlTextarea1" placeholder = "Share Something" rows="3"></textarea>
                                            <br>
                                            <img class="shadow-lg p-1 bg-white rounded" id="previewImage" width="120" height="80" style="overflow: hidden">
                                        </div>
                                        <div class="float-left">
                                            <div class="dropdown no-arrow ml-auto animated--grow-in">
                                                <a class="btn btn-circle dropdown-toggle" href="#" role="button"    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-paperclip text-primary" aria-hidden="true"></i>
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
                                    </div>
                                    <div>
                                        <input type="hidden" name="classroom" value="{{ $classroom->id }}">
                                        <button type="submit" class="btn btn-sm btn-primary m-1 pl-3 pr-3 float-right">
                                            Post
                                        </button>
                                        <button type="button" id = "cancel-post" class="btn btn-sm btn-outline-dark m-1 float-right">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- END TEXT AREA -->
                        </div>
                        <!-- END COL -->
                        @endif


                        @foreach ($classroom->post as $post)
                        <!-- COL -->
                        <div class="col-12 mb-2">
                            @if ($post->type=='general')
                                 <!---------------------------------------General CARD ------------------------------------->
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <img src="{{ asset('uploads/profiles/'.$classroom->user->image) }}" width="35" height="35" alt="..." class="rounded-circle mr-2 mb-2 float-left">
                                        <div class="dropdown no-arrow float-right">
                                            <a class="btn btn-circle dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Select an Option</div>
                                                <a class="dropdown-item" href="/edit/">Edit</a>
                                                <a class="dropdown-item" href="/delete/">Delete</a>
                                                <a class="dropdown-item" href="#">Copy Link</a>
                                            </div>
                                        </div>
                                        <!-- Container -->
                                        <div class="media-body mb-2">
                                            <p class="text-primary m-0">{{ $classroom->user->fname." ".$classroom->user->lname }}</p>
                                            <small><span><i class="icon ion-md-time"></i> {{ $post->created_at->format('M d') }}</span></small>
                                        </div>
                                        <!-- End Container -->
                                        <div class="media-body mb-2">
                                            <p class="">{{ $post->title }}</p>
                                        </div>
                                        @if ($post->attachment)
                                        <!-- CARD -->
                                        <div class="card mb-3 ml-2" style="max-width: 400px; max-height:100px;">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img  src="{{ asset('uploads/classrooms/attachments/'.$post->attachment->path) }}" style="width:100%;cursor:pointer"
                                                        onclick="onClick(this)" class="w3-hover-opacity">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title "><a href="{{ route('getfile', 'uploads/classrooms/attachments/'.$post->attachment->path) }}">{{ $post->attachment->path }}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END CARD -->
                                        @endif
                                    </div>
                                    <div class="input-group mb-3 mt-3">
                                        <img src="{{ asset('uploads/profiles/'.auth()->user()->image) }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                                        <input type="text" class="form-control rounded-pill" placeholder="Add a class comment..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            <button class=" btn btn-circle" type="button" id="button-addon2"><i class="fas fa-angle-double-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------ END General CARD ----------------------------------->
                            @elseif($post->type=='assignment')
                                <!--------------------- Assignment Card -------------------------------->
                                <div class="col-lg-12">
                                    <div class="row">
                                        <a href="">
                                            <div class="card cart-hover" style="width:100%;">
                                                <div class="card-body">
                                                    <img src="{{ asset('img/icon.png') }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                                                    <a class="text-decoration-none" href="/assignmentSubmitPage/{{ $post->id }}" style="font-size: 14px;">{{ $classroom->user->fname." ".$classroom->user->lname." has posted a new assignment: ".$post->assignment->title }}</a>
                                                    <div class="dropdown no-arrow float-right">
                                                        <a class="btn btn-circle d-inline dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                    <em class="text-muted d-inline float-right">
                                                            {{ $post->created_at->format('M d') }}
                                                    </em>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!------------------------------ end assignment card ----------------------------------------->
                            @endif
                        </div>
                        <!-- END COL -->
                        @endforeach
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
@endsection
