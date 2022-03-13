@extends('layouts.general.generalMaster')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid" style="border-top: 1px solid rgb(217 217 217); padding-left: 40px; padding-right: 40px">
        <div class="row">
             <!-- Left -->
            <div class="col-lg-4 pl-2" style="margin-top: 20px; padding-right: 0px;">
                <div class="col-lg-12">
                    @error('points')
                    <div class="alert alert-warning" role="alert">
                        <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                    </div>
                    @enderror
                    @if (session()->has('message'))
                    <div x-data="{ show:true }"
                        x-init="setTimeout(() => show = false, 10000)"
                        x-show="show"
                        class="alert alert-success pb-0">
                        <p>{{ session('message') }}</p>
                    </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <h3><i class="fa fa-users" aria-hidden="true"></i> Submitted By</h3>
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table">
                    <thead>
                      <tr>
                        <th width="45%" scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">{{ $industryWork->user->fname }}</th>
                      </tr>
                    </thead>
                    @php
                        $totalLate=0;
                        $totalGraded=0;
                    @endphp
                    @if ($industryWork->industryWorkSubmission->count()>0)
                        {{-- Submissions against a assignment --}}
                        @foreach ($industryWork->industryWorkSubmission as $submission)
                            @if(($submission->user->id == $classroom->user->id) && auth()->user()->role!=3)
                                @continue
                            @endif
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset('uploads/profiles/'.$submission->user->image) }}" width="30" height="30" alt="..." class="rounded-circle mr-2 mb-2 float-left">
                                        {{ $submission->user->fname." ".$submission->user->lname }}
                                    </td>
                                    <td>
                                        @if(auth()->user()->id==$classroom->user->id)
                                            {{-- Check if assignment as submission --}}
                                           {{-- {{ dd($submission->industryGrade->teacher_points);}} --}}
                                            @if ($submission->industryGrade)
                                                @if ($submission->industryGrade->teacher_points)
                                                    @php
                                                        $totalGraded++;
                                                    @endphp
                                                @endif
                                            @endif
                                            @if ($submission->created_at->format('Y-m-d') > $industryWork->due_date)
                                                @php
                                                    $totalLate++;
                                                @endphp
                                                <h6 style="color: rgb(218, 205, 27);">Late</h6>
                                            {{-- Note: One submission has one grade --}}
                                            @elseif($submission->industryGrade)
                                                @if ($submission->industryGrade->teacher_points)
                                                    <h6 class="graded" style="color: rgb(58, 66, 175);">Graded</h6>
                                                @endif
                                            @else
                                                <h6 style="color: green;">Assigned</h6>
                                            @endif
                                        @elseif(auth()->user()->id==$industryWork->user->id)
                                            @if ($submission->industryGrade)
                                                @if ($submission->industryGrade->industry_points)
                                                    @php
                                                        $totalGraded++;
                                                    @endphp
                                                @endif
                                            @endif
                                            @if ($submission->created_at->format('Y-m-d') > $industryWork->due_date)
                                                @php
                                                    $totalLate++;
                                                @endphp
                                                <h6 style="color: rgb(218, 205, 27);">Late</h6>
                                            {{-- Note: One submission has one grade --}}
                                            @elseif($submission->industryGrade)
                                                @if ($submission->industryGrade->industry_points)
                                                    <h6 class="graded" style="color: rgb(58, 66, 175);">Graded</h6>
                                                @endif
                                            @else
                                                <h6 style="color: green;">Assigned</h6>
                                            @endif
                                        @endif

                                    </td>
                                    <form method="post" action="/industryGradeSubmit/{{ $submission->id }}" enctype="multipart/form-data">
                                        @csrf
                                        @if (auth()->user()->id==$classroom->user->id)
                                            <td>
                                                <input name="points" type="number"
                                                    {{-- Current list member Submission has been graded? --}}
                                                    @if ($submission->IndustryGrade)
                                                        @if ($submission->IndustryGrade->teacher_points)
                                                            value="{{ $submission->industryGrade->teacher_points }}"
                                                        @else
                                                            placeholder="{{ '/'.$industryWork->points }}"
                                                        @endif
                                                        {{-- @endforeach --}}
                                                    @else
                                                        placeholder="{{ '/'.$industryWork->points }}"
                                                    @endif
                                                >
                                            </td>
                                            <td>
                                                <h6>
                                                    @if ($submission->IndustryGrade)
                                                        @if ($submission->IndustryGrade->industry_points)
                                                            {{ $submission->industryGrade->industry_points }}
                                                        @else
                                                        {{ '/'.$industryWork->points }}
                                                    @endif
                                                    @else
                                                        {{ '/'.$industryWork->points }}
                                                    @endif
                                                </h6>
                                            </td>
                                        @elseif (auth()->user()->id==$industryWork->user->id)
                                            <td>
                                                <h6>
                                                    @if ($submission->IndustryGrade)
                                                        @if ($submission->IndustryGrade->teacher_points)
                                                            {{ $submission->industryGrade->teacher_points }}
                                                        @else
                                                        {{ '/'.$industryWork->points }}
                                                    @endif
                                                    @else
                                                        {{ '/'.$industryWork->points }}
                                                    @endif
                                                </h6>
                                            </td>
                                            <td>
                                                <input name="points" type="number"
                                                    {{-- Current list member Submission has been graded? --}}
                                                    @if ($submission->IndustryGrade)
                                                        @if ($submission->IndustryGrade->industry_points)
                                                            value="{{ $submission->industryGrade->industry_points }}"
                                                        @else
                                                            placeholder="{{ '/'.$industryWork->points }}"
                                                        @endif
                                                        {{-- @endforeach --}}
                                                    @else
                                                        placeholder="{{ '/'.$industryWork->points }}"
                                                    @endif
                                                >
                                            </td>
                                        @endif
                                    </form>
                                </tr>
                            </tbody>
                            {{-- @php
                                $totalSub= $industryWork->industryWorkSubmission->count();
                            @endphp --}}
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-primary" role="alert" style="margin-left:0px; margin-right: 0px;">
                                No submission found!
                            </div>
                        </div>
                    @endif
                </table>
                </div>
            </div>
            <!-- Left -->
             <!-- Right -->
             <div class="col-lg-8 vl v p-4 mt-sm-2" style="height: 600px;">
                <div class="col-lg-12">
                    <h3><i class="fa fa-book" aria-hidden="true"></i> {{ $industryWork->title }}</h3>
                </div>
                <div class="col">
                    <ul class="navbar-nav">
                        <div class="row">
                            <li class="nav-item ml-2 submitted">
                                <h1>{{ $industryWork->industryWorkSubmission->count(); }}</h1>
                                <h6>Assigned</h6>
                            </li>
                            <li class="nav-item ml-4 late">
                                <h1> {{ $totalLate }}</h1>
                                <h6>Late</h6>
                            </li>
                            <li class="nav-item ml-4 graded">
                                <h1>{{ $totalGraded }}</h1>
                                <h6>Graded</h6>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col-6">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Assigned
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #ebebeb; padding:0px">
                                <a class="dropdown-item graded pt-0 pb-0" href="#"><h6>All</h6></a>
                                <a class="dropdown-item submitted pt-0 pb-0" href="#"><h6>Assigned</h6></a>
                                <a class="dropdown-item missing pt-0 pb-0" href="#"><h6>Missing</h6> </a>
                                <a class="dropdown-item late pt-0 pb-0" href="#"><h6>Late</h6> </a>
                                <a class="dropdown-item graded pt-0 pb-0" href="#"><h6>Graded</h6> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($industryWork->industryWorkSubmission->count()>0)
                        @foreach ($industryWork->industryWorkSubmission as $submission)
                            <!-- Submission Card-->
                            <div class="col-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- {{ dd($submission); }} --}}
                                        <img src="{{ asset('uploads/profiles/'.$submission->user->image) }}" width="35" height="35" alt="..." class="rounded-circle mr-2 mb-2 float-left">
                                        <p class="card-text">{{ $submission->user->fname." ".$submission->user->lname }}</p>

                                        <iframe src="{{ asset('uploads/classrooms/industryWork/'.$submission->attachment_path) }}" id="pdf-view" height="130" width="215px" frameborder="0px" title="Preview"  style="border:1px solid black;"></iframe>
                                        <a href='/viewWorkPdf/{{ $submission->id }}' class="card-link">View Submission</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Submission Card-->
                        @endforeach
                    @else
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert" style="margin-left:0px; margin-right: 35px;">
                            No submission found!
                        </div>
                    </div>
                    @endif
                </div>
            </div>
             <!-- Right -->
        </div>
       <!-- Row -->
    </div>
    <!-- Container -->
@endsection
