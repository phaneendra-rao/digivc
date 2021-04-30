@extends('web_layouts.master')
@section('content')
<!--Page Title-->
<section class="page-title" style="padding-bottom:20px;">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-12.png')}})"></div>
		<div class="pattern-layer-two"></div>
		<div class="pattern-layer-three"></div>
        <div class="auto-container">
			<h1>Login</h1>
			<ul class="bread-crumb clearfix">
				<li><a href="{{url('/')}}">Home</a></li>
				<li>Login</li>
			</ul>
        </div>
    </section>
    <!--End Page Title-->
<!-- Login Section -->
<section class="login-page-section" style="padding-top:50px;">
		<div class="auto-container">
			<div class="inner-container">
				
				<!--Login Form-->
				<div class="styled-form">
					<form action="{{url('/user_login')}}" method="POST">
						@csrf
						<div class="form-group">
							<label>Phone No <sup>*</sup></label>
							<input type="number" id="phone_no" name="phone_no" placeholder="Your Phone No" required>
						</div>
						<div class="form-group">
							<label>Password <sup>*</sup></label>
							<input type="password" name="password" placeholder="Your Password" required>
						</div>
						
						<button type="submit" class="theme-btn btn-style-two">Login Now</button>
						
						<div class="clearfix">
							<br>
							<div class="text-center">
								<a href="javascript:void(0);" id="forgot_password_btn" class="forgot">Forgot your password? </a>
							</div>
						</div>
						
						<!-- Or Box -->
						<div class="or-box">
							<span class="or">or</span>
						</div>
						
						<button type="button" onClick="redirect_to_signup()" class="account-btn">Create An Account</button>
						
					</form>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Login Page Section -->
@endsection

@section('page-css')

@stop

@section('page-scripts')
<script>
	function redirect_to_signup()
	{
		window.location.href = "{{url('/signup')}}";
	}

	$('#forgot_password_btn').click(()=>{
		if($('#phone_no').val().trim()!='')
		{
			$.ajax({
				url:"{{url('/forgot_password')}}",
				method:"POST",
				data:{phone_no:$('#phone_no').val()},
				beforeSend:()=>{
					$('#overlay').removeClass('d-none');
				},
				success:(data)=>{
					if(data.errors!=undefined)
					{
						if(data.errors.phone_no!=undefined)
						{
							toastr.error(data.errors.phone_no[0]);
						}
					}

					if(data.status=='Success')
					{
						swal.fire({
							type:'success',
							text:data.response,
							timer: 6000,
							allowOutsideClick: false,
						});
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
				complete:()=>{
					$('#overlay').addClass('d-none');
				}
			});
		}
		else
		{
			toastr.error('Please enter valid Phone no!');
		}
	});
</script>
@stop