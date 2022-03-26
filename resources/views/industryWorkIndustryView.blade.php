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
            <div class="col-lg-8" >
                <div class="row">
                    <h1 class="text-primary">
                        <i class="fas fa-clipboard-list"></i> {{ $industryWork->title }}
                    </h1>
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
                            <img  src="{{ asset('uploads/classrooms/attachments/'.$industryWork->image) }}" style="width: 160px; height: 150px; border-radius: 4px; cursor:pointer"
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
