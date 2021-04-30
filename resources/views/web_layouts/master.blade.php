<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="csrf_token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<meta charset="utf-8">
<!-- Stylesheets -->
<link href="{{asset('/web_sources/css/bootstrap.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="{{asset('/web_sources/css/main.css')}}" rel="stylesheet">
<link href="{{asset('/web_sources/css/responsive.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('sources/assets/sweetalert2/sweetalert2.min.css')}}">

<link rel="shortcut icon" href="{{asset('/web_sources/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('/web_sources/images/favicon.png')}}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
@yield('page-css')
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<style>
.datepicker {
    width: 260px;
  height:260px;    
}
.table-condensed {
  width: 250px;
  height:250px;
}

.table-condensed thead tr th {
    padding:6px 0px;
}

#toast-container>.toast-error, #toast-container>.toast-success, #toast-container>.toast-info, #toast-container>.toast-warning {
    font-weight: 600;
}

#overlay {
    background: grey;
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    bottom:0;
    right:0;
    z-index:100000;
    opacity: .5;
    }

#loading {
    -webkit-animation: rotation 5s infinite linear;
}

@-webkit-keyframes rotation {
    from {
            -webkit-transform: rotate(0deg);
    }
    to {
            -webkit-transform: rotate(359deg);
    }
}

sup
{
    color:red;
}
</style>
</head>

<body>
<div id="overlay" class="">
    <center>
        <div style="margin-top:50vh;height:60px;width:60px;border-radius:50%;">
            <img src="{{asset('/web_sources/images/dc/logo_circle.png')}}" id="loading" class="img img-responsive" style="background-color:white;border-radius:50%;height:60px;width:auto;position:absolute;" alt="">
            <img src="{{asset('/web_sources/images/dc/letter_d.png')}}" class="img img-responsive" style="border-radius:50%;height:60px;width:auto;position:absolute;" alt="">
        </div>
    </center>
</div>

<div class="page-wrapper"> 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('web_layouts.header')
    @yield('content')
    @include('web_layouts.footer')
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
    $(window).load(function() {
        $('#overlay').addClass('d-none');
    });
</script>

<script src="{{asset('/web_sources/js/jquery.js')}}"></script>
<script src="{{asset('/web_sources/js/popper.min.js')}}"></script>
<script src="{{asset('/web_sources/js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('/web_sources/js/bootstrap.min.js')}}"></script>

<script>
    $('form').on('focus', 'input[type=number]', function (e) {
        $(this).on('mousewheel.disableScroll', function (e) {
            e.preventDefault();
        });
    });

    $('form').on('blur', 'input[type=number]', function (e) {
        $(this).off('mousewheel.disableScroll');
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('sources/assets/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

@yield('page-scripts')
<script src="{{asset('/web_sources/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('/web_sources/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('/web_sources/js/appear.js')}}"></script>
<script src="{{asset('/web_sources/js/swiper.min.js')}}"></script>
<script src="{{asset('/web_sources/js/jquery.paroller.min.js')}}"></script>
<script src="{{asset('/web_sources/js/parallax.min.js')}}"></script>
<script src="{{asset('/web_sources/js/tilt.jquery.min.js')}}"></script>
<!--Master Slider-->
<script src="{{asset('/web_sources/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('/web_sources/js/owl.js')}}"></script>
<script src="{{asset('/web_sources/js/wow.js')}}"></script>
<script src="{{asset('/web_sources/js/jquery-ui.js')}}"></script>
<script src="{{asset('/web_sources/js/script.js')}}"></script>
<script>
    $('#footer_year').html(new Date().getFullYear()+' |');
</script>

@include('web_layouts.alerts')

</body>
</html>