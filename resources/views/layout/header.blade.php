<div class="content-wrapper">
    <div class="main-content">
<nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
    <div class="sidebar-toggle-icon" id="sidebarCollapse">
        sidebar toggle<span></span>
    </div>
    <!--/.sidebar toggle icon-->
    <div class="d-flex flex-grow-1">
        <ul class="navbar-nav flex-row align-items-center ml-auto">

            <!--/.dropdown-->

            <li class="nav-item dropdown user-menu">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <!--<img src="assets/dist/img/user2-160x160.png" alt="">-->
                                    <i class="typcn typcn-user-add-outline"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-header d-sm-none">
                                        <a href="#" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                                    </div>
                                    <div class="user-header">
                                     
                                        <!-- img-user -->
                                        <h6>{{Auth::User()->name;}}</h6>
                                        <span><a href="#" class="__cf_email__" data-cfemail="3a5f425b574a565f7a5d575b535614595557">{{Auth::user()->email;}}</a></span>
                                    </div>
                                    <!-- user-header -->
                                    <a href="#" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                                    <a href="#" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                                    <a href="{{ url('/logout') }}" class="dropdown-item"><i class="typcn typcn-key-outline"></i> Sign Out</a>
                                </div>
                                <!--/.dropdown-menu -->
                            </li>

        </ul>
        <!--/.navbar nav-->

        <!-- nav-clock -->
    </div>
</nav>
