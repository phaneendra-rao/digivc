@extends('web_layouts.master')
@section('content')
    	<!-- Banner Section -->
        <section class="banner-section">
		<!-- Layers Box -->
		<div class="layers-box">
			<div class="layer-one"></div>
			<div class="layer-two"></div>
			<div class="layer-three" style="background-image: url({{asset('/web_sources/images/icons/pattern-1.png')}})"></div>
			<div class="layer-four" style="background-image: url({{asset('/web_sources/images/icons/pattern-3.png')}})"></div>
			<div class="layer-five" style="background-image: url({{asset('/web_sources/images/icons/pattern-1.png')}})"></div>
			<div class="layer-six" style="background-image: url({{asset('/web_sources/images/icons/pattern-2.png')}})"></div>
		</div>
		<div class="auto-container">
			<div class="row clearfix">
			
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<h1>Best way to <br> showcase your <br> <span>Modern App!</span></h1>
						<div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply dummy text of the printing</div>
						<a href="#" class="theme-btn btn-style-two">discover now</a>
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<img src="{{asset('/web_sources/images/resource/mobile.png')}}" alt="" />
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!--End Banner Section-->
	
	<!-- App Section -->
    <section class="app-section">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-4.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Welcome Column -->
				<div class="welcome-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Welcome Box -->
						<div class="welcome-box">
							<div class="inner-box">
								
								<!-- Title Box -->
								<div class="title-box">
									<div class="image">
										<img src="{{asset('/web_sources/images/icons/diamond.png')}}" alt="" />
									</div>
									<h3>Welcome</h3>
									<div class="home">your homescreen app</div>
								</div>
								
								<!-- Login Form -->
								<div class="login-form">
									<form>
										
										<div class="form-group">
											<span class="icon flaticon-user-3"></span>
											<input type="text" name="username" value="" placeholder="Username" autocomplete="off" required readonly>
										</div>
										
										<div class="form-group">
											<span class="icon flaticon-lock"></span>
											<input type="password" name="password" value="" placeholder="Password" autocomplete="off" required readonly>
										</div>
										
										<div class="form-group">
											<button type="button" class="theme-btn btn-style-three"><span class="txt">Login</span></button>
										</div>
										
									</form>
								</div>
								<!-- End Login Form -->
								
							</div>							
						</div>
						<div class="image-two wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<img src="{{asset('/web_sources/images/resource/mobile-1.png')}}" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<h2>The App for getting your <br> <span>Life Together</span></h2>
						</div>
						<div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</div>
						<a href="#" class="theme-btn btn-style-two"><span class="icon fa fa-apple"></span>discover now</a>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End App Section -->
	
	<!-- Features Section -->
	<section class="features-section">
		<div class="layer-one"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>This App Provide Stunning <br> <span>Features</span></h2>
			</div>
			
			<div class="row clearfix">
				
				<!-- Featured Block -->
				<div class="featured-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="side-lines"></div>
						<div class="icon-outer">
							<span class="icon flaticon-drawing"></span>
						</div>
						<h4>Unique and <br> Custom options</h4>
						<div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</div>
					</div>
				</div>
				
				<!-- Featured Block -->
				<div class="featured-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="side-lines"></div>
						<div class="icon-outer">
							<span class="icon flaticon-lock-1"></span>
						</div>
						<h4>Secure <br> Integration</h4>
						<div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been </div>
					</div>
				</div>
				
				<!-- Featured Block -->
				<div class="featured-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="side-lines"></div>
						<div class="icon-outer">
							<span class="icon flaticon-content"></span>
						</div>
						<h4>Always <br> Up-to-date</h4>
						<div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Features Section -->
	
	<!-- App Section Two -->
    <section class="app-section-two">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-6.png')}})"></div>
		<div class="pattern-layer-two" style="background-image: url({{asset('/web_sources/images/icons/pattern-3.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<h2>Available this App <br> <span>Iphone & Android</span></h2>
						</div>
						<div class="text">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply.</p>
							<p>Dummy text of the printing Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
						</div>
						<div class="btn-box">
							<a href="#" class="theme-btn btn-style-two"><span class="icon fa fa-apple"></span>discover now</a>
							<a href="#" class="theme-btn btn-style-four"><span class="icon fa fa-android"></span>get the app</a>
						</div>
					</div>
				</div>
				
				<!-- Account Column -->
				<div class="account-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Account Box -->
						<div class="account-box">
							<div class="inner-box">
								
								<!-- Upload Box -->
								<div class="upload-box">
									<div class="image">
										<!-- <img src="images/icons/diamond.png" alt="" /> -->
									</div>
									<div class="upload-text">tap to upload</div>
								</div>
								
								<!-- Signup Form-->
								<div class="signup-form">
									<form>
										
										<div class="form-group">
											<span class="icon flaticon-user-3"></span>
											<input type="text" name="username" value="" placeholder="John Snow" autocomplete="off" required readonly>
										</div>
										
										<div class="form-group">
											<span class="icon flaticon-lock"></span>
											<input type="password" name="password" value="" placeholder="........" autocomplete="off" required readonly>
										</div>
										
										<div class="form-group">
											<span class="icon fa fa-envelope"></span>
											<input type="email" name="email" value="" placeholder="johnsnow@mail.com" autocomplete="off" required readonly>
										</div>
										
										<div class="form-group">
											<span class="icon fa fa-mobile-phone"></span>
											<input type="text" name="phone" value="" placeholder="+001-234-56-789" autocomplete="off" required readonly>
										</div>
										
										<div class="form-group">
											<button type="button" class="theme-btn btn-style-three"><span class="txt">Creat Account</span></button>
										</div>
										
									</form>
								</div>
								<!-- End Signup Form-->
								
							</div>							
						</div>
						<div class="image-two wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<img src="{{asset('/web_sources/images/resource/mobile-2.png')}}" alt="" />
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End App Section Two -->
	
	<!-- Screenshots Section -->
    <section class="screenshots-section">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-3.png')}})"></div>
		<div class="auto-container">
			<div class="sec-title centered">
				<h2>Our Awesome App <br> <span>Screenshots</span></h2>
			</div>
		</div>
		
		<div class="carousel-container">
            <div class="carousel-outer">
                <!-- Carousel -->
                <div class="screenshots-carousel owl-carousel owl-theme">
                    <!--Slide-->
                    <div class="slide"><figure class="image"><img src="{{asset('/web_sources/images/resource/app-screen-one.jpg')}}" alt=""></figure></div>
                    <!--Slide-->
                    <div class="slide"><figure class="image"><img src="{{asset('/web_sources/images/resource/app-screen-two.jpg')}}" alt=""></figure></div>
                    <!--Slide-->
                    <div class="slide"><figure class="image"><img src="{{asset('/web_sources/images/resource/app-screen-three.jpg')}}" alt=""></figure></div>
                    <!--Slide-->
                    <div class="slide"><figure class="image"><img src="{{asset('/web_sources/images/resource/app-screen-four.jpg')}}" alt=""></figure></div>
					<!--Slide-->
                    <div class="slide"><figure class="image"><img src="{{asset('/web_sources/images/resource/app-screen-five.jpg')}}" alt=""></figure></div>
                </div>
                
                <!--Mockup Layer-->
                <div class="mockup-layer"></div>
            </div>
        </div>
		
	</section>
    <!-- End Screenshots Section -->
    
    	<!-- Price Section -->
        <section class="pricing-section">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-3.png')}})"></div>
		<div class="auto-container">
			<div class="sec-title centered">
				<h2>Choose your best <br> <span>Plan & Pricing</span></h2>
			</div>
			
			<div class="row clearfix">
				
				<!-- Price Block -->
				<div class="price-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="side-lines"></div>
						<div class="title">Basic</div>
						<h2>$15.00</h2>
						<ul class="price-list">
							<li>Single License</li>
							<li>0 Team Members</li>
							<li>99 mb of Storage</li>
							<li>1.00 Project</li>
						</ul>
						<a href="#" class="theme-btn btn-style-four">get started</a>
					</div>
				</div>
				
				<!-- Price Block -->
				<div class="price-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
						<div class="side-lines"></div>
						<div class="title">Standard</div>
						<h2>$25.00</h2>
						<ul class="price-list">
							<li>Single License</li>
							<li>7 Team Members</li>
							<li>1 GB of Storage</li>
							<li>3.00 Project</li>
						</ul>
						<a href="#" class="theme-btn btn-style-four">get started</a>
					</div>
				</div>
				
				<!-- Price Block -->
				<div class="price-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
						<div class="side-lines"></div>
						<div class="title">Premium</div>
						<h2>$35.00</h2>
						<ul class="price-list">
							<li>Single License</li>
							<li>10 Team Members</li>
							<li>1 TB of Storage</li>
							<li>10.00 Project</li>
						</ul>
						<a href="#" class="theme-btn btn-style-four">get started</a>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</section>
    <!-- End Price Section -->
    
    <!-- Testimonial Section -->
    <section class="testimonial-section">
		<div class="section-layer-one"></div>
		<div class="pattern-layer-two" style="background-image:url({{asset('/web_sources/images/icons/pattern-3.png')}})"></div>
		<div class="auto-container">
			<div class="sec-title centered">
				<h2>What people are <br> <span>Saying</span></h2>
			</div>
			<div class="inner-container">
				<div class="testimonial-carousel owl-carousel owl-theme">
					
					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="image">
								<img src="{{asset('/web_sources/images/resource/author-1.jpg')}}" alt="" />
							</div>
							<div class="text">Dummy text of the printing Lorem Ipsum is simply dummy text of the <br> printing and typesetting industry. Lorem Ipsum has been the industry's  <br> standard dummy text ever.</div>
							<div class="author">Samira Deshmuk</div>
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<div class="quote-icon flaticon-quote-2"></div>
						</div>
					</div>
					
					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="image">
								<img src="{{asset('/web_sources/images/resource/author-1.jpg')}}" alt="" />
							</div>
							<div class="text">Dummy text of the printing Lorem Ipsum is simply dummy text of the <br> printing and typesetting industry. Lorem Ipsum has been the industry's  <br> standard dummy text ever.</div>
							<div class="author">Samira Deshmuk</div>
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<div class="quote-icon flaticon-quote-2"></div>
						</div>
					</div>
					
					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="image">
								<img src="{{asset('/web_sources/images/resource/author-1.jpg')}}" alt="" />
							</div>
							<div class="text">Dummy text of the printing Lorem Ipsum is simply dummy text of the <br> printing and typesetting industry. Lorem Ipsum has been the industry's  <br> standard dummy text ever.</div>
							<div class="author">Samira Deshmuk</div>
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<div class="quote-icon flaticon-quote-2"></div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->	
@endsection

@section('page-css')

@stop

@section('page-scripts')

@stop