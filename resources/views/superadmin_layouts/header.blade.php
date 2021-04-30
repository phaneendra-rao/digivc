<nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo" style="background-color:white;">
                        <a class="mobile-menu"  style="color:black;" id="mobile-collapse" href="#!">
                            <i class="ti-menu" style="color:black;"></i>
                        </a>
                        
                        <a href="{{url('/superadmin')}}">
                            <img class="img-fluid" src="{{asset('sources/assets/images/b2b_logo.png')}}" style="max-height:40px;" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options" style="color:black;">
                            <i style="color:black;" class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)" style="color:black;"><i style="color:black;" class="ti-menu"></i></a></div>
                            </li>
                            
                        </ul>
                        <ul class="nav-right">

                            <li class="header-notification">
                                <a href="#!">
                                    <!-- <i class="ti-bell"></i> -->
                                    <!-- <span class="badge bg-c-pink"></span> -->
                                </a>
                                <ul class="show-notification d-none">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center" src="{{asset('sources/assets/images/user.png')}}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center" src="{{asset('sources/assets/images/user.png')}}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img class="d-flex align-self-center" src="{{asset('sources/assets/images/user.png')}}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="{{asset('sources/assets/images/male_pic.png')}}" class="img-radius" alt="User-Profile-Image">
                                    <span>{{Auth()->user()->name}}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="{{url('/superadmin/account')}}">
                                            <i class="ti-user"></i> Account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/superadmin/logout')}}">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>