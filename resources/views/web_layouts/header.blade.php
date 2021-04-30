    <!-- Main Header-->
    <header class="main-header header-style-one">
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="{{url('/')}}"><img src="{{asset('/web_sources/images/logo.png')}}" alt="Digivc Logo" title="Digivc Logo"></a></div>
                    </div>
                   	
                   	<div class="nav-outer clearfix">
						<!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
						<!-- Main Menu -->
						<nav class="main-menu show navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/about')}}">About</a></li>
                                    <li><a href="{{url('/features')}}">Features</a></li>
                                    <li><a href="{{url('/pricing')}}">Pricing</a></li>
                                    <li><a href="{{url('/contact')}}">Contact</a></li>
                                    <li><a href="{{url('/login')}}">Login</a></li>
								</ul>
							</div>
							
						</nav>
						
						<div class="outer-box">
							<a href="{{url('/signup')}}" class="theme-btn btn-style-one"><span class="txt">Try now</span></a>
						</div>
						
					</div>
                   
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{url('/')}}"><img src="{{asset('/web_sources/images/logo.png')}}" alt="" title=""></a></div>
                <div class="menu-outer">
					<!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
				</div>
            </nav>
        </div><!-- End Mobile Menu -->
		
    </header>
    <!--End Main Header -->