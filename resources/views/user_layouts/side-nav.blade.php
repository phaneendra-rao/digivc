@if(Auth::check())
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                @if(auth()->user()->profile_pic!=null)
                <img class="img-40 img-radius" src="{{asset('sources/assets/images/users')}}/profile_pics/{{auth()->user()->profile_pic}}" style="border-radius:50%;" id="side_dp" alt="User-Profile-Image">
                @else
                @if(auth()->user()->gender=='m')
                <img class="img-40 img-radius" src="{{asset('sources/assets/images/users/profile_pics/male_pic.png')}}" style="border-radius:50%;" id="side_dp" alt="User-Profile-Image">
                @else
                <img class="img-40 img-radius" src="{{asset('sources/assets/images/users/profile_pics/female_pic.png')}}" style="border-radius:50%;" id="side_dp" alt="User-Profile-Image">
                @endif
                @endif
                <div class="user-details">
                    <span>{{ucfirst(Auth()->user()->full_name)}}</span>
                    <span id="more-details">{{ucfirst(auth()->user()->account_type)}}<i class="ti-angle-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="{{url('/')}}/{{auth()->user()->account_type}}/account"><i class="ti-user"></i>Account</a>
                        <a href="{{url('/logout')}}"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/dashboard">
                    <span class="pcoded-micon"><i class="icofont icofont-dashboard-web" style="font-size:1.3rem;"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            @if(auth()->user()->account_type=='master')
            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/all-users">
                    <span class="pcoded-micon"><i class="icofont icofont-users-alt-5" style="font-size:1.3rem;"></i><b>C</b></span>
                    <span class="pcoded-mtext">All Users</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/channel-partners">
                    <span class="pcoded-micon"><i class="icofont icofont-users-alt-2" style="font-size:1.3rem;"></i><b>C</b></span>
                    <span class="pcoded-mtext">Channel Partners</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/coupons">
                    <span class="pcoded-micon"><i class="icofont icofont-ticket" style="font-size:1.3rem;"></i><b>C</b></span>
                    <span class="pcoded-mtext">Coupons</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/all-cards">
                    <span class="pcoded-micon"><i class="icofont icofont-ui-v-card" style="font-size:1.3rem;"></i><b>C</b></span>
                    <span class="pcoded-mtext">All Cards</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @elseif(auth()->user()->account_type=='channel_partner')
            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/my-users">
                    <span class="pcoded-micon"><i class="icofont icofont-users-alt-5" style="font-size:1.3rem;"></i><b>C</b></span>
                    <span class="pcoded-mtext">My Users</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/my-wallet">
                    <span class="pcoded-micon"><i class="icofont icofont-wallet" style="font-size:1.3rem;"></i><b>W</b></span>
                    <span class="pcoded-mtext">My Wallet</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @elseif(auth()->user()->account_type=='customer')
            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/my-cards">
                    <span class="pcoded-micon"><i class="icofont icofont-ui-v-card" style="font-size:1.3rem;"></i><b>C</b></span>
                    <span class="pcoded-mtext">My Cards</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/my-wallet">
                    <span class="pcoded-micon"><i class="icofont icofont-wallet" style="font-size:1.3rem;"></i><b>W</b></span>
                    <span class="pcoded-mtext">My Wallet</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="">
                <a href="{{url('/')}}/{{auth()->user()->account_type}}/shop">
                    <span class="pcoded-micon"><i class="icofont icofont-grocery" style="font-size:1.3rem;"></i><b>S</b></span>
                    <span class="pcoded-mtext">Shop</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            @endif
        </ul>

    </div>
</nav>
@endif