<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('root')}}">
            <img class="w-100 img-fluid" src="{{asset('media/logo.png')}}" alt="">
    </a>

    <!-- Divider -->

    <hr class="sidebar-divider my-0">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-fw fa-tachometer-alt"></i>

        </div>
        <div class="sidebar-brand-text mx-3">Dashboard <sup></sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users Profile Setting
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-user"></i>
            <span>Users Information</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Dashboard:</h6>
                <a class="collapse-item" href="{{route('dashboard.index')}}">All Users</a>
{{--                <a class="collapse-item" data-toggle="modal" data-target="#addNewUser" href="">Add User</a>--}}
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pages Content Setting
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
           aria-expanded="true" aria-controls="collapsePages">
            <i class="fa fa-info-circle"></i>
            <span>Facility Information</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About Facilities</h6>
                <a class="collapse-item" href="{{route('facility-info.index')}}">Facility Name</a>
                <a class="collapse-item"  href="{{route('facility-location.index')}}">Facility Location</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#testdetails"
           aria-expanded="true" aria-controls="testdetails">
            <i class="fas fa-folder-plus"></i>
            <span>Test Details</span>
        </a>
        <div id="testdetails" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About Test Details</h6>
                <a class="collapse-item" href="{{route('test-names.index')}}">All Test Names</a>
                <a class="collapse-item" href="{{route('test-possibilities.index')}}">All Test Possibilities</a>
                <a class="collapse-item" href="{{route('test-devices.index')}}">All Test Devices</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#description"
           aria-expanded="true" aria-controls="description">
            <i class="fa fa-file-o"></i>
            <span>Report Details</span>
        </a>
        <div id="description" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About Test Details</h6>
{{--                <a class="collapse-item" href="{{route('report-descriptions.index')}}">Report Description</a>--}}
                <a class="collapse-item" href="{{route('report-footer-details.index')}}">Report Footer Details</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="text-white ml-3 my-2"><a class="text-white" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a></li>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>


    <hr class="sidebar-divider">

   <div class="p-3">
       <h5><a class="text-white font-weight-bold" href="{{route('root')}}">  <i class="fas fa-print"></i> Form Generation</a></h5>
   </div>

</ul>
<!-- End of Sidebar -->

