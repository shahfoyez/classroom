@extends('layouts.general.generalMaster')
@section('content')
    <!-- Begin Page Content -->
    <div class="container mx-auto shadow-sm mb-5 pt-3 " style="min-height: 525px; margin-top: 30px">
        <div class="row m-2">
             <!-- Assignment Details -->
            <div class="{{ $assignment->post->user->id == auth()->user()->id ? 'col-lg-10' : 'col-lg-8'}} ">
                <div class="row">
                    <h1 class="text-primary">
                        <i class="fas fa-clipboard-list"></i> {{ $assignment->title }}
                    </h1>
                </div>
                <div class="row ml-4">
                    <p class="text-muted mr-3"><i class="fas fa-user-tie"></i> {{ $assignment->post->user->fname." ".$assignment->post->user->lname }}</p>
                    <p class="text-muted"> <i class="far fa-calendar-alt"></i> {{ " ".Carbon\Carbon::parse($assignment->due_date)->format('M d, Y')}}</p>
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
                    <p>
                        {{ $assignment->instruction }}
                    </p>
                </div>
            </div>
            <!-- Assignment Details End -->
            <!-- Submit cards -->
            @if($assignment->post->user->id != auth()->user()->id)
            <div class="col-lg-4">
                <div class="card p-4 ml-5 shadow-sm">
                    <div class="row">
                        <h4 class="text-primary pl-2">
                            Your Work
                        </h4>
                        <p class="ml-auto text-success pr-3">
                            Assigned
                        </p>
                    </div>
                    <button class="btn btn-outline-dark btn-block">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add or create
                    </button>
                    <button class="btn btn-primary btn-block">Mark as done</button>
                </div>

                <div class="card p-2 ml-5 mt-3 shadow-sm">
                    <div class="input-group mb-3 mt-3">
                        <img src="{{ asset('uploads/profiles/'.auth()->user()->image) }}" width="35" height="35" alt="..." class="rounded-circle ml-2 mr-2">
                        <input type="text" class="form-control rounded-pill" placeholder="Add a class comment..." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class=" btn btn-circle" type="button" id="button-addon2"><i class="fas fa-angle-double-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- Submit Cart End -->
        </div>
    </div>
    <!-- Container -->
@endsection
