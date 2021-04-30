@extends('web_layouts.master')
@section('content')
<!--Page Title-->
<section class="page-title" style="padding-bottom:20px;">
		<div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-12.png')}})"></div>
		<div class="pattern-layer-two"></div>
		<div class="pattern-layer-three"></div>
        <div class="auto-container">
			<h1>Reset New Password</h1>
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
					<form id="password_reset_form">
						@csrf
                        <input type="text" class="d-none" name="verification_code" id="verification_code" value="{{$verification_code}}" readonly>
						<div class="form-group">
							<label>New Password <sup>*</sup></label>
							<input type="password" name="password" placeholder="New Password" />
                        </div>
                        
                        <div class="form-group">
							<label>Confirm Password <sup>*</sup></label>
							<input type="password" name="password_confirmation" placeholder="Confirm Password" />
						</div>
						
						<button type="button" id="reset_password_btn" class="theme-btn btn-style-two">Reset Password</button>
						
						<div class="clearfix">
							<br>
							<div class="text-center">
								<a href="javascript:void(0);" onClick="redirect_to_login()" class="forgot">Login </a>
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

    function redirect_to_login()
	{
		window.location.href = "{{url('/login')}}";
	}

	$('#reset_password_btn').click(()=>{
		$.ajax({
			url:"{{url('/reset_new_password')}}",
			method:"POST",
			data:new FormData($('#password_reset_form')[0]),
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
					if(data.errors.password!=undefined)
					{
						toastr.error(data.errors.password[0]);
					}

					if(data.errors.verification_code!=undefined)
					{
						toastr.error(data.errors.verification_code[0]);
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

					setTimeout(() => {
						var url = "{{url('/login')}}";
						window.location.href = url; 
						// location.reload();
					}, 5000);
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
	});
</script>
@stop