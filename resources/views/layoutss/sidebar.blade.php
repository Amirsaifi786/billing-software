    <style>
        .menu-icon {
            padding-bottom: 5px !important;
        }

        .mdi {
            padding-bottom: 0px !important;
        }

    </style>


    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{Route('dashboard')}}">
                <i class="mdi mdi-grid menu-icon"></i>
                <span class="menu-title">DASHBOARD</span>
            </a>
        </li>



        @can('User list')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('userIndex') }}">
                <i class="mdi mdi-cart-plus menu-icon"></i>
                <span class="menu-title">User managment</span>
            </a>
        </li>

        @endcan

        @can('Permission list')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('permissionIndex') }}">
                <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">Permission managment</span>
            </a>
        </li>

        @endcan

        @can('Role list')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roleIndex') }}">
                <i class="mdi mdi-calculator menu-icon"></i>
                <span class="menu-title">Role management</span>
            </a>
        </li>
        @endcan


        <li class="nav-item">
            <a class="nav-link btn_logout" href="#">
                <i class="ti-power-off menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
