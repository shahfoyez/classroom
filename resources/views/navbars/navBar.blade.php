<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow-sm" style="height: 60px; margin-bottom: 10px;">
    <!------------------------ Sidebar Toggle (Topbar) ------------------------->
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <div style="min-width: 210px">
        @if(auth()->user()->role==3)
            <a href="/classroom/{{ $industryWork->id }}" style="text-decoration: none;"><h6 style="color:#3762e2; text-decoration: none; font: 14px Arial, sans-serif; padding-top: 5px;">{{ $industryWork->title }}</h6></a>
        @else
            <a href="/classroom/{{ $classroom->id }}" style="text-decoration: none;"><h6 style="color:#3762e2; text-decoration: none; font: 14px Arial, sans-serif; padding-top: 5px;">{{ $classroom->name." "."(".$classroom->section.")" }}</h6></a>
        @endif

    </div>


    @if ((request()->is('assignmentSubmitPage/*') || request()->is('studentsWork/*')) && auth()->user()->id==$classroom->created_by)
        <ul class="navbar-nav" style="
            @if(request()->is('assignmentSubmitPage/*'))
                {{ 'margin-left: 193px' }}
            @else
                {{ 'margin-left: 290px' }}
            @endif
            ">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" style="align:center" style="align:center">
                <div class="collapse navbar-collapse align-left" id="navbarNav" style="align:center">
                    <ul class="nav justify-content-center">
                        <li class="nav-item ">
                            <a class="nav-link" href="/assignmentSubmitPage/{{ $assignment->post->id }}" style="color:{{ request()->is('assignmentSubmitPage/*') ? 'blue' : 'black' }};"><b>Instructions</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/studentsWork/{{ $assignment->post->id }}" style="color:{{ request()->is('studentsWork/*') ? 'blue' : 'black' }}"><b>Student Submission</b></a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        @elseif (request()->is('industryWorkSubmit/*') || request()->is('industryWorkIndustryView/*') && (auth()->user()->id==$classroom->created_by || auth()->user()->id==$industryWork->user_id) || request()->is('industryWork/*'))
        <ul class="navbar-nav" style="
            @if(request()->is('industryWorkSubmit/*') || request()->is('industryWorkIndustryView/*'))
                {{ 'margin-left: 193px' }}
            @else
                {{ 'margin-left: 290px' }}
            @endif
            ">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" style="align:center" style="align:center">
                <div class="collapse navbar-collapse align-left" id="navbarNav" style="align:center">
                    <ul class="nav justify-content-center">
                        <li class="nav-item ">
                            <a class="nav-link" href="/assignmentSubmitPage/{{ $industryWork->id }}" style="color:{{ request()->is('industryWorkSubmit/*') || request()->is('industryWorkIndustryView/*') ? 'blue' : 'black' }};"><b>Instructions</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/industryWork/{{ $industryWork->id }}/{{$classroom->id}}" style="color:{{ request()->is('industryWorkSubmission/*') || request()->is('industryWork/*') ? 'blue' : 'black' }}"><b>Submissions</b></a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    @elseif ((request()->is('industryWorkView/*') && auth()->user()->id == $classroom->created_by) || request()->is('workAddToClass/*') || request()->is('relatedWorkView/*') || request()->is('industryWorkTeacherView/*'))
        @if (auth()->user()->id==$classroom->created_by)
            <ul class="navbar-nav" style="margin-left: 195px;">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow" style="align:center" style="align:center">
                    <div class="collapse navbar-collapse align-left" id="navbarNav" style="align:center">
                        <ul class="nav justify-content-center">
                            <li class="nav-item ">
                                <a class="nav-link" href="/industryWorkView/{{ $classroom->id }}" style="color:{{ request()->is('industryWorkView/*') ? 'blue' : 'black' }};"><b>Added Work</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/relatedWorkView/{{ $classroom->id }}" style="color:{{ request()->is('relatedWorkView/*') || request()->is('industryWorkTeacherView/*') ? 'blue' : 'black' }}"><b>Related Work</b></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        @endif
    @elseif (!request()->is('assignmentSubmitPage/*'))
        <ul class="navbar-nav" style="margin-left: 140px">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <div class="collapse navbar-collapse align-left" id="navbarNav">
                    <ul class="nav justify-content-center">
                        <li class="nav-item ">
                            <a class="nav-link" href="/classroom/{{ $classroom->id }}" style="color:{{ request()->is('classroom/*') ? 'blue' : 'black' }}"><b>Stream</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/classwork/{{ $classroom->id }}" style="color:{{ request()->is('classwork/*') ? 'blue' : 'black' }}"><b>Classwork</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/industryWorkView/{{ $classroom->id }}" style="color:{{request()->is('industryWorkSubmit/*') || (request()->is('industryWorkView/*') && auth()->user()->id != $classroom->user->id) ? 'blue' : 'black' }}"><b>IndustryWork</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/people/{{ $classroom->id }}" style="color:{{ request()->is('people/*') ? 'blue' : 'black' }}"><b>People</b></a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    @endif


    <ul class="navbar-nav ml-auto" style="align:center">
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth
                    <span class="mr-2 d-none d-lg-inline text-dark">{{ auth()->user()->fname." " }}{{ auth()->user()->lname }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('uploads/profiles/'.auth()->user()->image) }}">
                @endauth
                @guest
                        <button class="btn btn-primary" type="submit">Not an User</button>
                @endguest
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in m-0 p-0" aria-labelledby="userDropdown">
                <button class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </button>
                <button class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </button>
                <button class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </button>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->
