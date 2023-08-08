<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow my-auto">

    <!-- Sidebar Toggle (Topbar) -->

    <!-- Topbar Search -->

    <h4 class="text-primary font-weight-bold"> Admin Dashboard | Covid Clinic </h4>


    <!-- Nav Item - Pages Collapse Menu -->



    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">


        <!-- Nav Item - Pages Collapse Menu -->

{{--        <!-- Nav Item - User Information -->--}}
{{--        <li class="nav-item dropdown no-arrow">--}}
{{--            <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="userDropdown" role="button"--}}
{{--               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                @if(!empty(auth()->user()->name))--}}
{{--                    <span class="mr-2 d-none d-lg-inline  text-gray-600 small" style="font-size: 16px;">Admin - {{ Auth::user()->name }}</span>--}}
{{--                @endif--}}
{{--            </a>--}}
{{--            <!-- Dropdown - User Information -->--}}
{{--        </li>--}}



    </ul>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#profile"
       aria-expanded="true" aria-controls="collapsePages">
        <i class="fa fa-user-circle"></i>
        @if(!empty(auth()->user()->name))
            <span class="mr-2 d-none d-lg-inline  text-gray-600 small" style="font-size: 16px;">{{ Auth::user()->name }}</span>
        @endif
    </a>
    <div id="profile" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>

</nav>
