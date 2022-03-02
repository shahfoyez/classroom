@extends('layouts.general.dashboardGeneralMaster')
@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    {{-- Session flash message --}}
    @if (session()->has('message'))
    <div x-data="{ show:true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="alert alert-success pb-0">
        <p>{{ session('message') }}</p>
    </div>
    @endif
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Your Works</h1>
    <!--------------- ROW  ---------------->
    <div class="row">
        <!------------- COL --------------->
        @foreach ($classroomMember as $member)
            <div class="col-lg-3 col-md-4 col-sm-1">
                <!-------------- CARD ----------->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header" style="background-image:url({{url('uploads/class/back1.jpg')}}); background-size: 280px 103px;">
                        <a href="/classroom/{{ $member->classroom->id }}" style="color:white">
                            <h6 class="font-weight-bold" style="color:#f8f9fc;  font: 18px Arial, sans-serif;">{{\Illuminate\Support\Str::limit($member->classroom->name, 20)}}</h6>
                            <h6 style="color:#f8f9fc font: 14px Arial, sans-serif;">{{ $member->classroom->section }}</h6>
                        </a>
                        <a href="" style="color:white">
                            <h6 style="color:#f8f9fc; font: 14px Arial, sans-serif;">{{\Illuminate\Support\Str::limit($member->classroom->user->fname." ".$member->classroom->user->lname, 20)}}</h6>
                        </a>
                    </div>
                    <a href="">
                        <div class="card-body" style="padding-bottom:0px;">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                            </div>
                            <hr style="margin:0px;">
                            <div class="text-right"  >
                            <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Open Grades for {{ $member->classroom->name}}" >
                                    <a href="" style="color: black; text-decoration:none">
                                        <i class="fas fa-graduation-cap"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Google Drive for {{ $member->classroom->name}}">
                                    <a href="" style="color: black; margin-left:5px;">
                                        <i class="far fa-folder-open"></i>
                                    </a>
                                </button>
                                {{-- <a href="" style="color: black; margin-left:5px;">
                                    <i class="far fa-folder"></i>
                                </a> --}}
                            </div>
                        </div>
                    </a>
                </div>
                <!--------- END CARD --------------->
            </div>
        @endforeach
        <!--------- END COL --------------->
    </div>
    <!----------------------- END ROW ----------------------------->
</div>
<!-- /.container-fluid -->
@endsection
