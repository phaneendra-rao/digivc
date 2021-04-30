@extends('web_layouts.master')
@section('content')
<!--Page Title-->
<section class="page-title" style="padding-bottom:20px;">
  <div class="pattern-layer" style="background-image: url({{asset('/web_sources/images/icons/pattern-12.png')}})"></div>
  <div class="pattern-layer-two"></div>
  <div class="pattern-layer-three"></div>
  <div class="auto-container">
    <h1>Signup</h1>
    <ul class="bread-crumb clearfix">
      <li><a href="{{url('/')}}">Home</a></li>
      <li>Signup</li>
    </ul>
  </div>
</section>
<!--End Page Title-->

<!-- Login Section -->
<section class="login-page-section signup-section" style="padding-top:50px;padding-bottom:50px;">
  <div class="auto-container">
    <div class="inner-container">
      <!--Login Form-->
      <div class="styled-form signup">
        <form id="signup_form" autocomplete="off">
          @csrf
            <div class="row clearfix">
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label>Full Name <sup>*</sup></label>
                <input type="text" name="full_name" placeholder="Full Name">
              </div>

              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Email ID">
              </div>

              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label>Phone No <sup>*</sup></label>
                <input type="tel" id="phone_no" name="phone_no">
                <input type="text" id="country_code" class="d-none" name="country_code" readonly>
                <input type="text" id="dail_code" class="d-none" name="dail_code" readonly>
                <input type="text" id="country_name" class="d-none" name="country_name" readonly>
                <!-- <input type="text" id="phone_no_main" class="d-none" name="phone_no_main"> -->
              </div>

              <div class="form-group col-lg-6 col-md-12 col-sm-12">
                <label>Gender <sup>*</sup></label>
                <div class="clearfix">
                  <div class="pull-left">
                    <div class="radio-box"><input type="radio" name="gender" value="m" id="account-option-2"> &ensp; <label for="account-option-2">&nbsp; Male</label></div>
                  </div>
                  <div class="pull-left">
                    <div class="radio-box"><input type="radio" name="gender" value="f" id="account-option-3"> &ensp; <label for="account-option-3">&nbsp; Female</label></div>
                  </div>
                </div>
              </div>

              <div class="form-group col-lg-6 col-md-12 col-sm-12">
                <label>Dob <sup>*</sup></label>
                <input type="text" class="dob" name="dob" placeholder="DOB (DD-MM-YYYY)">
              </div>

              <div class="form-group col-lg-6 col-md-12 col-sm-12">
                <label>Password <sup>*</sup></label>
                <input type="password" name="password" placeholder="Password">
              </div>

              <div class="form-group col-lg-6 col-md-12 col-sm-12">
                <label>Confirm Password <sup>*</sup></label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
              </div>

              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <div class="check-box"><input type="checkbox" name="terms_and_conditions" value="1" id="account-option"> &ensp; <label for="account-option">&nbsp; I agree the user agreement and <a href="#"><span class="terms">Terms & Condition</span></a></label></div>
              </div>

              <input type="text" name="referred_by" value="{{$referral_code}}" class="d-none" readonly>

              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <button type="button" id="create_account_btn" class="theme-btn btn-style-two">Create Account</button>
              </div>

            </div>
            <!-- Or Box -->
						<div class="or-box">
							<span class="or">or</span>
						</div>
						
            <button type="button" onClick="redirect_to_login()" class="account-btn">Login</button>
        </form>
      </div>

    </div>
  </div>
</section>
<!-- End Login Page Section -->
@endsection

@section('page-css')
<link rel="stylesheet" href="{{asset('/web_sources/tele/build/css/intlTelInput.css')}}">
<style>
  .iti {
    width: 100%;
  }
</style>
@stop

@section('page-scripts')
<script>
  function redirect_to_login()
  {
    window.location.href = "{{url('/login')}}";
  }

  $('.dob').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true,
    autoclose: true,
  });
</script>
<script src="{{asset('/web_sources/tele/build/js/intlTelInput.js')}}"></script>

<script>
  var input = document.querySelector("#phone_no");
  var iti = window.intlTelInput(input, {
    allowDropdown: true,
    autoHideDialCode: false,
    customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
      $('#country_code').val(selectedCountryData['iso2']);
      $('#country_name').val(selectedCountryData['name']);
      $('#dail_code').val(selectedCountryData['dialCode']);
      return "e.g. " + selectedCountryPlaceholder;
    },
    dropdownContainer: document.body,
    //   excludeCountries: [],
    formatOnDisplay: true,
    geoIpLookup: function(callback) {
      $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        callback(countryCode);
      });
    },
    initialCountry: "auto",
    //   localizedCountries: { 'de': 'Deutschland' },
    nationalMode: true,
    //   onlyCountries: [],
    placeholderNumberType: "MOBILE",
    //   preferredCountries: [],
    separateDialCode: true,
    utilsScript: "{{asset('/web_sources/tele/build/js/utils.js')}}",
  });

  // $('#phone_no').on('blur keyup change', function() {        
  //     $('#phone_no_main').val(iti.getNumber());
  // });

  $('#create_account_btn').click(() => {
    if (iti.isValidNumber()) {
      if (iti.getNumberType() === intlTelInputUtils.numberType.MOBILE) {
        $.ajax({
          url:"{{url('/register_user')}}",
          method:"POST",
          data:new FormData($('#signup_form')[0]),
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
                  if(data.errors.full_name!=undefined)
                  {
                      toastr.error(data.errors.full_name[0]);
                  }

                  if(data.errors.email!=undefined)
                  {
                      toastr.error(data.errors.email[0]);
                  }

                  if(data.errors.phone_no!=undefined)
                  {
                      toastr.error(data.errors.phone_no[0]);
                  }

                  if(data.errors.country_code!=undefined)
                  {
                      toastr.error(data.errors.country_code[0]);
                  }

                  if(data.errors.dail_code!=undefined)
                  {
                      toastr.error(data.errors.dail_code[0]);
                  }

                  if(data.errors.country_name!=undefined)
                  {
                      toastr.error(data.errors.country_name[0]);
                  }

                  if(data.errors.gender!=undefined)
                  {
                      toastr.error(data.errors.gender[0]);
                  }

                  if(data.errors.dob!=undefined)
                  {
                      toastr.error(data.errors.dob[0]);
                  }

                  if(data.errors.password!=undefined)
                  {
                      toastr.error(data.errors.password[0]);
                  }

                  if(data.errors.terms_and_conditions!=undefined)
                  {
                      toastr.error(data.errors.terms_and_conditions[0]);
                  }
              }

              if(data.status=='Success')
              {   
                  $('#signup_form')[0].reset();

                  swal.fire({
                      type:'success',
                      title:data.response.title,
                      text:data.response.text,
                      timer: 6000,
                      allowOutsideClick: false,
                      // showConfirmButton: false
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
          complete:(data)=>{
              $('#overlay').addClass('d-none');
          }
        });
      } else {
        toastr.error('Invalid Phone Number!');
      }
    } else {
      toastr.error('Invalid Phone Number!');
    }
  });
</script>
@stop