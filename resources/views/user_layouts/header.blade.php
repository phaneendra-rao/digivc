<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo" style="background-color:white;">
            <a class="mobile-menu" style="color:black;" id="mobile-collapse" href="#!">
                <i class="ti-menu" style="color:black;"></i>
            </a>

            <a href="{{url('/')}}">
                <img class="img-fluid" src="{{asset('/web_sources/images/logo.png')}}" style="max-height:50px;" alt="Digivc Logo" />
            </a>
            <a class="mobile-options">
                <i class="ti-more" style="color:black;"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a style="color:black;" href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <a href="#!">
                        @if(auth()->user()->profile_pic!=null)
                            <img src="{{asset('sources/assets/images/users/profile_pics')}}/{{auth()->user()->profile_pic}}" id="header_dp" style="border-radius:50%;" class="img-radius" alt="User-Profile-Image">
                        @else
                            @if(auth()->user()->gender=='m')
                                <img src="{{asset('sources/assets/images/users/profile_pics/male_pic.png')}}" id="header_dp" class="img-radius" style="border-radius:50%;" alt="User-Profile-Image">
                            @else 
                                <img src="{{asset('sources/assets/images/users/profile_pics/female_pic.png')}}" id="header_dp" class="img-radius" style="border-radius:50%;" alt="User-Profile-Image">
                            @endif
                        @endif

                        <span>{{ucfirst(Auth()->user()->full_name)}}</span>
                        <i class="ti-angle-down"></i>
                    </a>
                    <ul class="show-notification profile-notification">
                        <li>
                            <a href="{{url('/')}}/{{auth()->user()->account_type}}/account">
                                <i class="ti-user"></i> Account
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/logout')}}">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>