<!------------------- Sidebar -------------------->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon ">
        <img style="height:60px; width:60px;" class="" src="{{ asset('/img/logo/logo1.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">ACASTRY</div>
    </a>
    @if(auth()->user()->role!=3)
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Classer</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Teaching
        </div>
        @php
            $teNum=0;
        @endphp
        @foreach ($classroomMember as $member)
            @if ($member->is_teacher)
                @php
                    $teNum=1;
                @endphp
                <li class="nav-item">
                    <a class="nav-link" href="/classroom/{{ $member->classroom->id }}">
                        <i class="fas fa-copyright"></i>
                        <span>{{\Illuminate\Support\Str::limit($member->classroom->name, 20)}}</span>
                    </a>
                </li>
            @endif
        @endforeach
        @if ($teNum==0)
            <li class="nav-item">
                <a class="nav-link" href="">
                <i class="fas fa-copyright"></i>
                <span>No Class</span></a>
            </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Enrolled
        </div>
        @php
            $enNum=0;
        @endphp
        @foreach ($classroomMember as $member)
            @if ($member->is_teacher==0)
                @php
                    $enNum=1;
                @endphp
                <li class="nav-item">
                    <a class="nav-link" href="/classroom/{{ $member->classroom->id }}">
                    <i class="fas fa-copyright"></i>
                    <span>{{\Illuminate\Support\Str::limit($member->classroom->name, 20)}}</span></a>
                </li>
            @endif
        @endforeach
        @if ($enNum==0)
            <li class="nav-item">
                <a class="nav-link" href="">>
                <i class="fas fa-copyright"></i>
                <span>No Class</span></a>
            </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @else
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Works</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
            <i class="fas fa-tasks"></i>
            <span>Your Works</span></a>
        </li>
        @php
            $iwNum=0;
        @endphp
        @foreach ($industryWorks as $work)
            @if ($work)
                @php
                    $iwNum=1;
                @endphp
                <li class="nav-item">
                    <a class="nav-link" href="/industryWorkIndustryView/{{ $work->id }}">
                        <i class="fas fa-copyright"></i>
                        <span>{{\Illuminate\Support\Str::limit($work->title, 20)}}</span>
                    </a>
                </li>
            @endif
        @endforeach
        @if ($iwNum==0)
            <li class="nav-item">
                <a class="nav-link" href="">
                <i class="fas fa-copyright"></i>
                <span>No Work</span></a>
            </li>
        @endif


        <!-- Divider -->
        <hr class="sidebar-divider">
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!------------------- End of Sidebar ------------------->
