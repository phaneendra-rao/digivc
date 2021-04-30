<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="author" content="#">

    <!-- Favicon icon -->
    <!-- <link rel="icon" href="{{asset('sources/assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('sources/assets/images/favicon.ico')}}" type="image/x-icon"> -->

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/icon/icofont/css/icofont.css')}}">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/icon/font-awesome/css/font-awesome.min.css')}}">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <script type="text/javascript" src="{{asset('sources/bower_components/jquery/js/jquery.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/sweetalert2/sweetalert2.min.css')}}">

    <link rel="stylesheet" href="{{asset('sources/assets/css/croppie.css')}}">

    <style>
        #overlay {
            background: grey;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index:10000;
            opacity: .5;
        }

        #side_overlay {
            background: grey;
            width: 100%;
            height: 100%;
            
            opacity: .5;
        }

        ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 5px;
            background-color: rgba(0,0,0,.5);
            -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5);
        }

        body
        {
            background:url('{{asset("sources/assets/images/bg_2.jpg")}}');
            background-position: center right;
            height: 100vh;
            background-size: cover;
        }

        input[type="text"], input[type="password"], input[type="number"], input[type="email"], input[type="date"],
        input[type="text"]:focus, input[type="password"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="date"]:focus
        {
            background-color: #fafafa;
            border-radius:0px;
            margin: 4px;;
            /* border:1px solid #fafafa; */
        }

        button
        {
            cursor: pointer;
        }

        
    </style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154564319-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154564319-1');
</script>
</head>
<body>

    <div id="overlay"></div>

    <div class="col-md-4" style="padding:0px;">
        <div class="card" style="height:100vh;">
            <div class="card-body">
                <div class="text-center">
                    <img src="{{asset('sources/assets/images/b2b_logo.png')}}" style="max-height:60px;" alt="logo.png">
                </div>  
                <div class="" id="signin_widget">
                        <form action="{{route('user_login')}}" method="POST">
                        @csrf

                            <div class="widget" style="padding-top:60px;">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center" style="margin-bottom:0px;font-size:1rem;">LOGIN TO YOUR ACCOUNT</h3>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>
                                <br>

                                <center>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" style="font-size:.800rem;" class="btn btn-primary btn-sm waves-effect text-center m-b-20">LOGIN NOW</button>
                                        </div>
                                        <div class="col-md-12">
                                            <a id="forgot_password_btn" style="cursor:pointer;text-decoration:underline;color:#adadad;"><small>Forgot password?</small></a>
                                        </div>
                                    </div>
                                </center>

                                <div class="row" style="margin-top:20px;">
                                    <div class="col-md-12">
                                        <p class="text-center">Don't have an account ? <b><a style="cursor:pointer;text-decoration:underline;" id="signup_open">Signup</a></b></p>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="d-none" id="signup_widget">
                        <form class="" id="signup_form">
                            @csrf
                            <!-- <div class="text-center">
                            <img src="{{asset('sources/assets/images/catfit_logo.png')}}" style="max-height:60px;" alt="logo.png">
                            </div> -->
                            <div class="widget" style="margin-top:60px;">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center" style="margin-bottom:0px;font-size:1rem;">SIGNUP</h3>
                                    </div>
                                </div>
                                <hr>
                                <div id="basic_form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group" style="margin-top:12px;">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <label for="male"><input type="radio" name="gender" id="male" value="male"> Male</label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                            <label for="female"><input type="radio" name="gender" id="female" value="female"> Female</label>
                                        </div>
                                    </div>
                                    <center>
                                        <small><b>DOB</b></small>
                                    </center>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="dob" placeholder="DOB">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="referred_by" placeholder="Referred By">
                                        <span class="md-line"></span>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:20px;">
                                            <center>
                                                <button type="button" id="signup_request_otp_btn" class="btn btn-primary btn-sm waves-effect text-center">Request OTP</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
    

                                <div id="verification_form" class="d-none">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="otp" placeholder="Enter OTP">
                                        <span class="md-line"></span>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:12px;">
                                            <center>
                                                <button type="button" id="signup_verify_otp_btn" class="btn btn-primary btn-sm waves-effect text-center m-b-20">Verify OTP</button>
                                                <br>
                                                <button type="button" id="signup_resend_otp_btn" class="btn btn-default btn-sm waves-effect text-center m-b-20">Resend OTP</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <center>
                                        <a id="signup_forgot_password_btn" style="cursor:pointer;text-decoration:underline;color:#adadad;"><small>Forgot password?</small></a>
                                    </center>
                                </div>

                                <hr/>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <p class="text-inverse text-left m-b-0">Already have an account ? <b><a style="cursor:pointer;" id="signup_signin_open">Log In</a></b></p>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="d-none" id="forgot_password_widget">
                        <form id="forgot_password_form">
                        @csrf

                            <div class="widget" style="padding-top:60px;">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center" style="margin-bottom:0px;font-size:1rem;">FORGOT PASSWORD</h3>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    <span class="md-line"></span>
                                </div>
                                
                                <div id="attach_otp_input"></div>
                                <div id="attach_password_inputs"></div>

                                <div class="row">
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <center>
                                            <button type="button" id="request_otp_btn" style="font-size:.800rem;" class="btn btn-primary btn-sm waves-effect text-center m-b-20">Request OTP</button>

                                            <button type="button" id="verify_otp_btn" style="font-size:.800rem;" class="btn btn-primary btn-sm waves-effect text-center m-b-20 d-none">Verify OTP</button>
                                            <button type="button" id="resend_otp_btn" style="font-size:.800rem;" class="btn btn-default btn-sm waves-effect text-center m-b-20 d-none">Resend OTP</button>

                                            <button type="button" id="reset_password_btn" style="font-size:.800rem;" class="btn btn-primary btn-sm waves-effect text-center m-b-20 d-none">Reset Password</button>
                                        </center>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <p class="text-inverse text-center">Already have an account ? <b><a style="cursor:pointer;text-decoration:underline;" id="signin_open">Log In</a></b></p>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
            </div>
        </div>
    </div>
    <div class="col-md-8" style="padding:0px;">
        <div id="side_overlay"></div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
     $(window).load(function() {
     // Animate loader off screen
     $('#overlay').addClass('d-none');
 });
</script>

    <script type="text/javascript" src="{{asset('sources/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/modernizr/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/modernizr/js/css-scrollbars.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });

        function ucwords(str)
        {
            if (str == null) { // test for null or undefined
                return "";
            }

            return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
        }
    </script>

    <script src="{{asset('sources/assets/sweetalert2/sweetalert2.all.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('sources/assets/custom/table-to-csv.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    @include('user_layouts.alerts')

    <script>
    $('#signup_open').click(()=>{
        $('#signin_widget').addClass('d-none');
        $('#forgot_password_widget').addClass('d-none');
        $('#signup_widget').removeClass('d-none');
    });

    $('#signin_open,#signup_signin_open').click(()=>{
        $('#signin_widget').removeClass('d-none');
        $('#signup_widget').addClass('d-none');
        $('#forgot_password_widget').addClass('d-none');
    });

    $('#forgot_password_btn,#signup_forgot_password_btn').click(()=>{

        $('#phone').removeAttr('readonly');

        $('#signin_widget').addClass('d-none');
        $('#signup_widget').addClass('d-none');

        $('#attach_otp_input').html('');
        $('#attach_password_inputs').html('');

        $('#request_otp_btn').removeClass('d-none');

        $('#verify_otp_btn').addClass('d-none');
        $('#resend_otp_btn').addClass('d-none');

        $('#reset_password_btn').addClass('d-none');

        $('#forgot_password_widget').removeClass('d-none');
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });

    $('#signup_request_otp_btn,#signup_resend_otp_btn').click(()=>{

        $.ajax({
            url:"{{url('/signup_send_otp')}}",
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
                    if(data.errors.name!=undefined)
                    {
                        toastr.error(data.errors.name[0]);
                    }

                    if(data.errors.email!=undefined)
                    {
                        toastr.error(data.errors.email[0]);
                    }

                    if(data.errors.gender!=undefined)
                    {
                        toastr.error(data.errors.gender[0]);
                    }

                    if(data.errors.phone!=undefined)
                    {
                        toastr.error(data.errors.phone[0]);
                    }

                    if(data.errors.dob!=undefined)
                    {
                        toastr.error(data.errors.dob[0]);
                    }

                    if(data.errors.password!=undefined)
                    {
                        toastr.error(data.errors.password[0]);
                    }
                }

                if(data.status=='Success')
                {
                    $('#basic_form').addClass('d-none');

                    $('#verification_form').removeClass('d-none');

                    toastr.success(data.response);
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

    $('#signup_verify_otp_btn').click(()=>{
        $.ajax({
            url:"{{url('/signup_verify_otp')}}",
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
                    if(data.errors.name!=undefined)
                    {
                        toastr.error(data.errors.name[0]);
                    }

                    if(data.errors.email!=undefined)
                    {
                        toastr.error(data.errors.email[0]);
                    }

                    if(data.errors.gender!=undefined)
                    {
                        toastr.error(data.errors.gender[0]);
                    }

                    if(data.errors.phone!=undefined)
                    {
                        toastr.error(data.errors.phone[0]);
                    }

                    if(data.errors.password!=undefined)
                    {
                        toastr.error(data.errors.password[0]);
                    }

                    if(data.errors.dob!=undefined)
                    {
                        toastr.error(data.errors.dob[0]);
                    }

                    if(data.errors.otp!=undefined)
                    {
                        toastr.error(data.errors.otp[0]);
                    }
                }

                if(data.status=='Success')
                {
                    $('#signup_form')[0].reset();
                    
                    $('#basic_form').removeClass('d-none');

                    $('#verification_form').addClass('d-none');

                    Swal.fire({
                        text: data.response,
                        type: 'success'
                    });

                    $('#signin_open').click();
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


    $('#request_otp_btn,#resend_otp_btn').click(()=>{

        var phone = $('#phone').val();

        $.ajax({
            url:"{{url('/forgot_password_send_otp')}}",
            method:"GET",
            data:{phone:phone},
            beforeSend:()=>{
                $('#overlay').removeClass('d-none');
            },
            success:(data)=>{

                if(data.errors!=undefined)
                {
                    if(data.errors.phone!=undefined)
                    {
                        toastr.error(data.errors.phone[0]);
                    }
                }

                if(data.status=='Success')
                {
                    toastr.success(data.response);

                    $('#phone').attr('readonly','readonly');

                    $('#attach_otp_input').html('');
                    $('#attach_password_inputs').html('');
                 
                    var item = '';

                    item = item.concat('<div class="input-group">');
                    item = item.concat('<input type="password" class="form-control" name="otp" placeholder="Enter OTP">');
                    item = item.concat('<span class="md-line"></span>');
                    item = item.concat('</div>');

                    $('#attach_otp_input').append(item);

                    $('#request_otp_btn').addClass('d-none');
                    
                    $('#verify_otp_btn').removeClass('d-none');
                    $('#resend_otp_btn').removeClass('d-none');
                    
                    $('#reset_password_btn').addClass('d-none');
                }
                else if(data.status=='Error')
                {
                    toastr.error(data.response);
                }
                else if(data.status=='Warning')
                {
                    toastr.warning(data.response);
                }
            },
            complete:(data)=>{
                $('#overlay').addClass('d-none');
            }
        });
    });


$('#verify_otp_btn').click(()=>{
    $.ajax({
        url:"{{url('/verify_otp')}}",
        method:"POST",
        data:new FormData($('#forgot_password_form')[0]),
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
                if(data.errors.phone!=undefined)
                {
                    toastr.error(data.errors.phone[0]);
                }

                if(data.errors.otp!=undefined)
                {
                    toastr.error(data.errors.otp[0]);
                }
            }

            if(data.status=='Success')
            {
                toastr.success(data.response);

                $('#attach_otp_input').addClass('d-none');
                $('#attach_password_inputs').html('');
                $('#phone').addClass('d-none');


                var item = '';

                item = item.concat('<div class="input-group">');
                item = item.concat('<input type="password" class="form-control" name="password" placeholder="New Password">');
                item = item.concat('<span class="md-line"></span>');
                item = item.concat('</div>');

                item = item.concat('<div class="input-group">');
                item = item.concat('<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password">');
                item = item.concat('<span class="md-line"></span>');
                item = item.concat('</div>');

                $('#attach_password_inputs').html(item);

                $('#verify_otp_btn').addClass('d-none');
                $('#resend_otp_btn').addClass('d-none');

                $('#reset_password_btn').removeClass('d-none');
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

$('#reset_password_btn').click(()=>{
    $.ajax({
        url:"{{url('/reset_password')}}",
        method:"POST",
        data:new FormData($('#forgot_password_form')[0]),
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
                if(data.errors.phone!=undefined)
                {
                    toastr.error(data.errors.phone[0]);
                }

                if(data.errors.otp!=undefined)
                {
                    toastr.error(data.errors.otp[0]);
                }

                if(data.errors.password!=undefined)
                {
                    toastr.error(data.errors.password[0]);
                }
            }

            if(data.status=='Success')
            {
                $('#attach_otp_input').html('');
                $('#attach_password_inputs').html('');

                $('#phone').val('');
                $('#phone').removeAttr('readonly');
                $('#phone').removeClass('d-none');
                $('#request_otp_btn').addClass('d-none');
                $('#verify_otp_btn').addClass('d-none');
                $('#resend_otp_btn').addClass('d-none');
                $('#reset_password_btn').addClass('d-none');
                

                Swal.fire({
                    text: data.response,
                    type: 'success'
                });

                $('#signin_open').click();
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


    $('#signup_submit_btn').click(()=>{
        $.ajax({
            url:"{{url('/user_signup')}}",
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
                    if(data.errors.name!=undefined)
                    {
                        toastr.error(data.errors.name[0]);
                    }

                    if(data.errors.phone!=undefined)
                    {
                        toastr.error(data.errors.phone[0]);
                    }

                    if(data.errors.email!=undefined)
                    {
                        toastr.error(data.errors.email[0]);
                    }

                    if(data.errors.password!=undefined)
                    {
                        toastr.error(data.errors.password[0]);
                    }
                }

                if(data.status=='Success')
                {
                    toastr.success(data.response);

                    $('#signup_form')[0].reset();

                    $('#signin_open').click();
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