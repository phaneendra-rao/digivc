@extends('web_layouts.master')
@section('content')
<!--Page Title-->
<section class="page-title" style="padding-bottom:20px;">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-12.png')}})"></div>
		<div class="pattern-layer-two"></div>
		<div class="pattern-layer-three"></div>
        <div class="auto-container">
			<h1>Contact Us</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">Home</a></li>
				<li>Contact Us</li>
			</ul>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Contact Page Section -->
    <section class="contact-page-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Form Column -->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Title Box -->
						<div class="title-box">
							<h3>Get in touch</h3>
							<div class="text">There are many variations of passages of Lorem Ipsum <br> but the majority have suffered.</div>
						</div>
						
						<!-- Contact Form -->
						<div class="contact-form">
							
							<!-- Contact Form -->
							<form id="contact_form">
								@csrf
								<div class="row clearfix">
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="name" placeholder="Your Name*" required>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="email" name="email" placeholder="Your Email" required>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="phone" placeholder="Your Phone Number*" required>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="subject" placeholder="Your Subject" required>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea class="" name="message" placeholder="Your Message"></textarea>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<button class="theme-btn btn-style-two" type="button" id="send_message">SEND MESSAGE</button>
									</div>
									
								</div>
							</form>
								
						</div>
						<!--End Comment Form -->
						
					</div>
				</div>
				
				<!-- Info Column -->
				<div class="info-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Title Box -->
						<div class="title-box">
							<h3>Contact Information</h3>
							<div class="text">There are many variations of passages of Lorem Ipsum <br> but the majority have suffered.</div>
						</div>
						
						<ul class="contact-info">
							<li>
								<span class="icon flaticon-telephone"></span> 
								<strong>Phone :</strong>
								+1 (123) 456-7890
							</li>

							<li>
								<span class="icon flaticon-email"></span>
								<strong>Email :</strong>
								<a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a>
							</li>

							<li>
								<span class="icon flaticon-placeholder-for-map"></span>
								<strong>Address :</strong> 
								Portfolio Technology 07, Capetown <br> 12 Road, Chicago, 2436, USA
							</li>
						</ul>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Contact Page Section -->
	
	<!-- Map Section -->
	<section class="map-section d-none">
		<!-- Map Outer -->
		<div class="map-outer">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6331292129!2d144.49266890254142!3d-37.97123689954809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1574408946759!5m2!1sen!2s" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</section>
	<!-- End Map Section -->	
@endsection

@section('page-css')

@stop

@section('page-scripts')
<script>
	$('#send_message').click(()=>{
		$.ajax({
			url:"{{asset('/contact_send_message')}}",
			method:"POST",
			data:new FormData($('#contact_form')[0]),
			dataType:'JSON',
			contentType: false,
			cache: false,
			processData: false,
			beforeSend:()=>{
				$('#overlay').removeClass('d-none');
			},
			success:(data)=>{

				if(data.errors!=undefined)
				{
				if(data.errors.name!=undefined)
				{
					toastr.error(data.errors.name[0]);
				}

				if(data.errors.phone!=undefined)
				{
					toastr.error(data.errors.phone[0]);
				}

				if(data.errors.message!=undefined)
				{
					toastr.error(data.errors.message[0]);
				}
				}

				if(data.status=='Success')
				{
					Swal.fire({
						text: data.response,
						type: 'success'
					});

				$('#contact_form')[0].reset();
				}
				else if(data.status=='Warning')
				{
				toastr.warning(data.response);
				}
				else if(data.status=='Error')
				{
				toastr.error(data.response);
				}

			},
			complete:(data)=>{
				$('#overlay').addClass('d-none');
			}
		});
	});
</script>
@stop