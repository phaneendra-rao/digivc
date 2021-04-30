@extends('web_layouts.master')
@section('content')
	<!--Page Title-->
	<section class="page-title" style="padding-bottom:20px;">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-12.png')}})"></div>
		<div class="pattern-layer-two"></div>
		<div class="pattern-layer-three"></div>
        <div class="auto-container">
			<h1>Features</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">Home</a></li>
				<li>Features</li>
			</ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Stunning Section -->
    <section class="stunnig-section">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-4.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<h2>This App Provide <br> <span>Stunning Features</span></h2>
						</div>
						<div class="text">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply.</p>
						</div>
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="{{asset('/web_sources/images/resource/stunning.png')}}" alt="" />
						</div>
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
	
	<!-- Time Section -->
    <section class="time-section">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-3.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="{{asset('/web_sources/images/resource/time.png')}}" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<h2>Why <span>PlayTime?</span></h2>
						</div>
						<div class="text">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply.</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Time Section -->
@endsection

@section('page-css')

@stop

@section('page-scripts')

@stop