@extends('layouts.general.generalMaster')

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
    <h1 class="h3 mb-4 text-gray-800 ml-2">
        <span style="margin-left: 30px;">Related Works</span>
    </h1>
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

                                                {{-- <div class="dropdown no-arrow float-right">
                                                    <a class="btn btn-circle d-inline dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-dark"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div> --}}

                                                {{-- <div class="float-right ml-4">
                                                    @php
                                                        $workExist=0;
                                                    @endphp
                                                    @foreach ($classroom->industryWork as $addedIndustryWork)
                                                        @if ($addedIndustryWork->id == $work->id)
                                                            @php
                                                                $workExist=1;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if ($workExist==1)
                                                        <i class="fa fa-check" aria-hidden="true" style="color: green;"></i>
                                                    @endif
                                                </div> --}}

                                                <div class="float-right ml-4">
                                                    @php
                                                        $workExist=0;
                                                    @endphp
                                                        @if ($work->classroom_id == $classroom->id)
                                                            @php
                                                                $workExist=1;
                                                            @endphp
                                                        @endif

                                                    @if ($workExist==1)
                                                        <i class="fa fa-check" aria-hidden="true" style="color: green;"></i>
                                                    @endif
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
                                            <a href="/workSubmitPage/{{ $work->id }}" class="card-link">View Work</a>
                                            @php
                                                $workExist=0;
                                            @endphp
                                            @if ($work->classroom_id == $classroom->id)
                                                @php
                                                    $workExist=1;
                                                @endphp
                                            @endif
                                            @if ($workExist==1)
                                                <a href="#" class="card-link" style="color: green;">Added</a>
                                            @else
                                                <a href="/workAddToClass/{{$classroom->id}}/{{$work->id}}" class="card-link">Add To Class</a>
                                            @endif
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
                    <div class="alert alert-primary" role="alert" style="margin-left: 35px; margin-right: 35px;">
                         No related work has found!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
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
