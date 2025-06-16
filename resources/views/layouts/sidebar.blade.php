 
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="active">
                                <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/icons/dashboard.svg')}}" alt="img"><span> Dashboard</span> </a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg')}}" alt="img"><span> Users</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="{{ route('userIndex') }}"> User</a></li>
                                    <li><a href="{{ route('roleIndex') }}">Role</a></li>
                                    <li><a href="{{ route('permissionIndex') }}">Permission</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        