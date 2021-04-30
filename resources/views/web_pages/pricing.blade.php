@extends('web_layouts.master')
@section('content')
<!--Page Title-->
<section class="page-title" style="padding-bottom:20px;">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-12.png')}})"></div>
		<div class="pattern-layer-two"></div>
		<div class="pattern-layer-three"></div>
        <div class="auto-container">
			<h1>Pricing</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">Home</a></li>
				<li>Pricing</li>
			</ul>
        </div>
    </section>
    <!--End Page Title-->
	
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
@endsection

@section('page-css')

@stop

@section('page-scripts')

@stop