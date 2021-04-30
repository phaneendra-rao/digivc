@extends('web_layouts.master')
@section('content')
<!--Page Title-->
<section class="page-title" style="padding-bottom:20px;">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-12.png')}})"></div>
		<div class="pattern-layer-two"></div>
		<div class="pattern-layer-three"></div>
        <div class="auto-container">
			<h1>About Us</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">Home</a></li>
				<li>About Us</li>
			</ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- App Section Three -->
    <section class="app-section-three">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-4.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="{{asset('/web_sources/images/resource/app-5.png')}}" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<h2>Built the App that <br> <span>Everyone Love</span></h2>
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
	<!-- End App Section -->
	
	<!-- App Section Three -->
    <section class="app-section-three style-two">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<h2>Easy and perfact solution <br> <span>For your Apps.</span></h2>
						</div>
						<div class="text">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.Lorem Ipsum is simply.</p>
						</div>
						<a href="#" class="theme-btn btn-style-two">GET STARTED</a>
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="{{asset('/web_sources/images/resource/app-5.png')}}" alt="" />
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End App Section -->
	
@endsection

@section('page-css')

@stop

@section('page-scripts')

@stop