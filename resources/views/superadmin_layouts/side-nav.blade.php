@if(Auth::check())
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-40 img-radius" src="{{asset('sources/assets/images/male_pic.png')}}" alt="User-Profile-Image">
                <div class="user-details">
                    <span>{{Auth()->user()->name}}</span>
                    <span id="more-details">Master<i class="ti-angle-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="{{url('/superadmin/account')}}"><i class="ti-user"></i>Account</a>
                        <a href="{{url('/superadmin/logout')}}"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">    
                <a href="{{url('/superadmin/dashboard')}}"> 
                        <span class="pcoded-micon"><i class="fa fa-home"></i><b>D</b></span>
                        <span class="pcoded-mtext">Dashboard</span>
                        <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="">    
                <a href="{{url('/superadmin/all-users')}}"> 
                        <span class="pcoded-micon"><i class="fa fa-users"></i><b>U</b></span>
                        <span class="pcoded-mtext">All Users</span>
                        <span class="pcoded-mcaret"></span>
                </a>
            </li>

            
            
            
        </ul>
        
    </div>
</nav>
@endif