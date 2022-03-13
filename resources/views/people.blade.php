@extends('layouts.general.generalMaster')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-lg-8 mx-auto">
        <!-- Teachers -->
        <h3 class="text-primary">
            Teacher
        </h3>
        <hr style="border: 1px solid #4a6fdc;">
        @php
        $count=0;
        @endphp
        @foreach ($peoples as $people)
            @if ($people->is_teacher)
                <div class="row">
                    {{-- <img width="30px" height="30px" class="img-profile rounded-circle" src="{{ asset('uploads/profiles/'.$people->user->image) }}"> --}}
                    <img src = "{{ asset('uploads/profiles/'.$people->user->image) }}" class = "rounded-circle" alt = "Rounded Image" width = "30" height = "30">
                    <h6 class="text-dark" style="margin-left: 15px;">{{ $people->user->fname." ".$people->user->lname }}</h6>
                </div>
            @else
                @if ($count!=1)
                    <!-- Students -->
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <h3 class="text-primary">Students</h3>
                        </div>
                        <div class="col-lg-4 ">
                            <p class="text-primary ml-auto float-right">{{ ($peoples->count()-1)." Students" }}</p>
                        </div>
                    </div>
                    <hr style="border: 1px solid #4a6fdc;">
                @endif
                <div class="row" >
                    <img width="25px" height="25px" class="img-profile rounded-circle" src="{{ asset('uploads/profiles/'.$people->user->image) }}">
                    <h6 class="text-dark" style="margin-left: 15px; padding-top: 5px;">{{ $people->user->fname." ".$people->user->lname }}</h6>
                    <a class="ml-auto btn btn-warning" href="https://mail.google.com/mail/u/0/#inbox?compose=new"> Mail</a class="ml-auto btn btn-warning">
                </div>
                <hr  style="margin-top:8px;margin-bottom:10px;">
                @php
                    $count=1;
                @endphp

            @endif
        @endforeach
    </div>
</div>
  <!-- /.container-fluid -->
@endsection

