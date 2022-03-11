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
    <h1 class="h3 mb-4 text-gray-800">
        @if(auth()->user()->role==3)
            <span style="margin-left: 30px;">Your Works</span>
        @else
            Classrooms
        @endif
    </h1>
    @if (auth()->user()->role!=3)
        <!--------------- ROW  ---------------->
        <div class="row">
            <!------------- COL --------------->
            @if($classroomMember->count()>0)
                @foreach ($classroomMember as $member)
                    <div class="col-lg-3 col-md-4 col-sm-1">
                        <!-------------- CARD ----------->
                        <div class="card border-bottom-primary shadow mb-4">
                            <div class="card-header" style="background-image:url({{url('uploads/class/back1.jpg')}}); background-size: 280px 103px;">
                                <a href="/classroom/{{ $member->classroom->id }}" style="color:white">
                                    <h6 class="font-weight-bold" style="color:#f8f9fc;  font: 18px Arial, sans-serif;">{{\Illuminate\Support\Str::limit($member->classroom->name, 20)}}</h6>
                                    <h6 style="color:#f8f9fc font: 14px Arial, sans-serif;">{{ strtoupper($member->classroom->section) }}</h6>
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
                                        {{-- @if (auth()->user()->id == $member->classroom->created_by) --}}
                                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Open Assignment for {{ $member->classroom->name}}" >
                                            <a href="/classwork/{{ $member->classroom->id }}" style="color: black; text-decoration:none">
                                                <i class="fas fa-graduation-cap"></i>
                                            </a>
                                        </button>
                                        {{-- @endif --}}
                                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Google Drive for {{ $member->classroom->name}}">
                                            <a href="" style="color: black; margin-left:5px;">
                                                <i class="far fa-folder-open"></i>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--------- END CARD --------------->
                    </div>
                @endforeach
                <!--------- END COL --------------->
            @else
                <div class="col-12">
                    <div class="alert alert-primary" role="alert" style="margin-left:0px; margin-right: 35px;">
                        You have not joined any classroom!
                    </div>
                </div>
            @endif
        </div>
        <!--------------- END ROW ------------->
    @else
        <div class="row">
            <div class="col-12">
                <!------------------- Cards -------------->
                <div class="accordion" id="accordionExample">
                    <?php $col=0 ?>
                    @if($industryWorks->count()>0)
                        @foreach ($industryWorks as $work)
                            <?php $col++ ?>
                            @if($work)

                            <!-- Card -->
                            <div class="col-lg-11" style="margin-left: 20px">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card ">
                                            <div class="" id="headingTwo">
                                                <div class="card collapsed" type="card" data-toggle="collapse" data-target="#collapse{{ $col }}" aria-expanded="false" aria-controls="collapseTwo">
                                                    <div class="card-body">
                                                        <img src="{{ asset('img/icon.png') }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                                                        <a class="text-decoration-none" href="#">{{ $work->title }}</a>
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
                                                            @if($work->due_date && $work->due_time)
                                                                @if(date('Y-m-d') > $work->due_date)
                                                                    {{ "Exceded ".Carbon\Carbon::parse($work->due_date)->format('M d, Y')}}
                                                                @elseif(date('Y-m-d') == $work->due_date)
                                                                    @if (date("H:i:s") >= $work->due_date)
                                                                        {{ "Exceded ".Carbon\Carbon::parse($work->due_date)->format('M d, Y')}}
                                                                    @else
                                                                        {{ "Due Today ".Carbon\Carbon::parse($work->due_time)->format('g:i A')}}
                                                                    @endif
                                                                @else
                                                                    {{ "Due ".Carbon\Carbon::parse($work->due_date)->format('D m').", ".Carbon\Carbon::parse($work->due_time)->format('g:i A') }}
                                                                @endif
                                                            @else
                                                                {{ "No due date" }}
                                                            @endif
                                                        </em>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="collapse{{ $col }}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="container-fluid">
                                                        <h6 style="font-size: 13px;">
                                                            {{ "Posted ".Carbon\Carbon::parse($work->created_at)->format('D m').", ".Carbon\Carbon::parse($work->created_at)->format('g:i A') }}
                                                        </h6>
                                                        <p>
                                                            {{ $work->instruction }}
                                                        </p>
                                                        @if($work->image)
                                                        <div class="card mb-3 ml-2" style="max-width: 400px; max-height:100px;">
                                                            <div class="row no-gutters">
                                                                <div class="col-md-4">
                                                                    <img  src="{{ asset('uploads/classrooms/attachments/'.$work->image) }}" style="width:100%; cursor:pointer"
                                                                        onclick="onClick(this)" class="w3-hover-opacity">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title "><a href="{{ route('getfile', 'uploads/classrooms/attachments/'.$work->image) }}">{{ $work->image }}</a>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <hr class="p-2">
                                                    <a href="/industryWorkSubmit/{{ $work->id }}" class="card-link">View Work</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            @endif
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-primary" role="alert" style="margin-left:15px; margin-right: 20px;">
                                You have not added any work!
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

</div>
<!-- /.container-fluid -->
@endsection
