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
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-grid menu-icon"></i>
                <span class="menu-title">DASHBOARD</span>
            </a>
        </li>


 

        <li class="nav-item">
            <a class="nav-link" href="{{ route('roleIndex') }}">
                <i class="mdi mdi-account-plus menu-icon"></i>
                <span class="menu-title">Role management</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('userIndex') }}">
                <i class="mdi mdi-calculator menu-icon"></i>
                <span class="menu-title">User managment</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('permissionIndex') }}">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Permission managment</span>
            </a>
        </li>
    

       
    </ul>


  


