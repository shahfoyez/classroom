@extends('layouts.general.generalMaster')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid mt-3">
        @if (session()->has('message'))
        <div x-data="{ show:true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="alert alert-success pb-0">
            <p>{{ session('message') }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                @if(auth()->user()->id == $classroom->created_by)
                <!-- start button -->
                <div class="btn-group pl-4 pt-2 ml-4">
                    <button type="button" class="btn btn-primary btn-lg rounded-pill mb-3" style="margin-left: 60px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-plus mr-1"></i>
                      Create
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item btn-lg"  href="/assignment/{{ $classroom->id }}"><i class="fas fa-clipboard-list pr-2"> Assignment</i></a>
                      <a class="dropdown-item btn-lg"  href="#"><i class="fas fa-clipboard-list pr-2"> Quiz</i></a>
                      <a class="dropdown-item btn-lg"  href="#"><i class="fas fa-clipboard-list pr-2"> Material</i></a>

                    </div>
                </div>
                <!-- end button -->
                @endif

                <!------------------- Cards -------------->
                <div class="accordion" id="accordionExample" >
                    <?php
                        $col=0;
                        $anum= 0;
                    ?>
                    @foreach ($classroom->post as $post)
                        <?php $col++ ?>
                            @if($assignment= $post->assignment)
                                @php
                                    $anum= 1;
                                @endphp
                                <!-- Card -->
                                <div class="col-lg-10" style="margin-left: 95px">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card ">
                                                <div class="" id="headingTwo">
                                                    <div class="card collapsed" type="card" data-toggle="collapse" data-target="#collapse{{ $col }}" aria-expanded="false" aria-controls="collapseTwo">
                                                        <div class="card-body">
                                                            <img src="{{ asset('img/icon.png') }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                                                            <a class="text-decoration-none" href="#">{{ $assignment->title }}</a>
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
                                                                @if($assignment->due_date && $assignment->due_time)
                                                                    @if(date('Y-m-d') > $assignment->due_date)
                                                                        {{ "Exceded ".Carbon\Carbon::parse($assignment->due_date)->format('M d, Y')}}
                                                                    @elseif(date('Y-m-d') == $assignment->due_date)
                                                                        @if (date("H:i:s") >= $assignment->due_date)
                                                                            {{ "Exceded ".Carbon\Carbon::parse($assignment->due_date)->format('M d, Y')}}
                                                                        @else
                                                                            {{ "Due Today ".Carbon\Carbon::parse($assignment->due_time)->format('g:i A')}}
                                                                        @endif
                                                                    @else
                                                                        {{ "Due ".Carbon\Carbon::parse($assignment->due_date)->format('D m').", ".Carbon\Carbon::parse($assignment->due_time)->format('g:i A') }}
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
                                                                {{ "Posted ".Carbon\Carbon::parse($assignment->created_at)->format('D m').", ".Carbon\Carbon::parse($assignment->created_at)->format('g:i A') }}
                                                            </h6>
                                                            <p>
                                                                {{ $assignment->instruction }}
                                                            </p>
                                                            @if($post->attachment)
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
                                                            @endif
                                                        </div>
                                                        <hr class="p-2">
                                                        <a href="/assignmentSubmitPage/{{ $post->id }}" class="card-link">View Assignment</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            @endif
                    @endforeach
                    @if ($anum == 0)
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert" style="margin-left:90px; margin-right: 90px;">
                            No Assignment has added!
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
