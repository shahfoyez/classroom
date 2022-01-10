<!------------------- Sidebar -------------------->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
        <img style="height:60px; width:60px;" class="" src="{{ asset('/img/logo/logo6.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">KOSAI <sup>3</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Classer</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Teaching
    </div>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-money-check"></i>
            <span>To Review</span>
        </a>
    </li>
    @foreach ($classroomMember as $member)
        @if ($member->is_teacher)
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-copyright"></i>
                <span>{{\Illuminate\Support\Str::limit($member->classroom->name, 20)}}</span>
            </a>
        </li>
        @endif
    @endforeach
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Enrolled
    </div>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
        {{-- <i class="fas fa-fw fa-chart-area"></i> --}}
        <i class="fas fa-tasks"></i>
        <span>To Do</span></a>
    </li>
    @foreach ($classroomMember as $member)
        @if ($member->is_teacher==0)
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
            <i class="fas fa-copyright"></i>
            <span>{{\Illuminate\Support\Str::limit($member->classroom->name, 20)}}</span></a>
        </li>
        @endif
    @endforeach

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!------------------- End of Sidebar ------------------->
