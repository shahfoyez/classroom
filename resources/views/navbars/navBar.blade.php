<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow-sm" style="height: 60px; margin-bottom: 10px;">
    <!------------------------ Sidebar Toggle (Topbar) ------------------------->
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    @if ((!request()->is('industryWorkView/*')) || (!request()->is('addedWorkView/*')))
        <h6 style="color:#3762e2;  font: 14px Arial, sans-serif;">{{ $classroom->name }}</h6>
        <h6 style="color: #3762e2 font: 14px Arial, sans-serif;">{{ " (".$classroom->section.")" }}</h6>
    @endif

    @if ((request()->is('assignmentSubmitPage/*') || request()->is('studentsWork/*')) && auth()->user()->id==$classroom->created_by)
        <ul class="navbar-nav" style=" margin-left: 210px;">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" style="align:center" style="align:center">
                <div class="collapse navbar-collapse align-left" id="navbarNav" style="align:center">
                    <ul class="nav justify-content-center">
                        <li class="nav-item ">
                            <a class="nav-link" href="/assignmentSubmitPage/{{ $assignment->post->id }}" style="color:{{ request()->is('assignmentSubmitPage/*') ? 'blue' : 'black' }};"><b>Instructions</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/studentsWork/{{ $assignment->post->id }}" style="color:{{ request()->is('studentsWork/*') ? 'blue' : 'black' }}"><b>Student Work</b></a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    @elseif (request()->is('industryWorkView/*') || request()->is('workAddToClass/*') || request()->is('addedWorkView/*'))
        @if (auth()->user()->id==$classroom->created_by)
            <ul class="navbar-nav" style="margin-left: 430px;">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow" style="align:center" style="align:center">
                    <div class="collapse navbar-collapse align-left" id="navbarNav" style="align:center">
                        <ul class="nav justify-content-center">
                            <li class="nav-item ">
                                <a class="nav-link" href="/industryWorkView/{{ $classroom->id }}" style="color:{{ request()->is('industryWorkView/*') ? 'blue' : 'black' }};"><b>Added Work</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/addedWorkView/{{ $classroom->id }}" style="color:{{ request()->is('addedWorkView/*') ? 'blue' : 'black' }}"><b>Related Work</b></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        @endif
    @elseif (!request()->is('assignmentSubmitPage/*'))
        <ul class="navbar-nav ml-auto" style="align:center">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" style="align:center" style="align:center">
                <div class="collapse navbar-collapse align-left" id="navbarNav" style="align:center">
                    <ul class="nav justify-content-center">
                        <li class="nav-item ">
                            <a class="nav-link" href="/classroom/{{ $classroom->id }}" style="color:{{ request()->is('classroom/*') ? 'blue' : 'black' }}"><b>Stream</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/classwork/{{ $classroom->id }}" style="color:{{ request()->is('classwork/*') ? 'blue' : 'black' }}"><b>Classwork</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/industryWorkView/{{ $classroom->id }}" style="color:{{ request()->is('industruWork/*') ? 'blue' : 'black' }}"><b>IndustryWork</b></a>
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
