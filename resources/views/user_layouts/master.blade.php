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


    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/icon/icofont/css/icofont.css')}}">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/icon/font-awesome/css/font-awesome.min.css')}}">

    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/pages/menu-search/css/component.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/css/jquery.mCustomScrollbar.css')}}">

    @yield('page-css')

    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/animate.css/css/animate.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{asset('sources/assets/owl/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('sources/assets/owl/owl.theme.default.min.css')}}">

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
            z-index: 10000;
            opacity: .5;
        }

        sup {
            color: red;
        }

        #toast-container {
            z-index: 99999999999 !important;
        }
    </style>

</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="overlay" class="d-none">
        <center>
            <div style="margin-top:50vh;height:60px;width:60px;border-radius:50%;">

                <!-- <img src="{{url('/images/dc/logo_circle.png')}}" id="loading" class="img img-responsive" style="background-color:white;border-radius:50%;height:60px;width:auto;position:absolute;" alt="">

                <img src="{{url('/images/dc/letter_d.png')}}" class="img img-responsive" style="border-radius:50%;height:60px;width:auto;position:absolute;" alt=""> -->

            </div>
        </center>
    </div>

    <div id="pcoded" class="pcoded">

        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('user_layouts.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('user_layouts.side-nav')
                    @yield('content')
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="{{asset('sources/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/modernizr/js/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/modernizr/js/css-scrollbars.js')}}"></script>

    <script>
        $('form').on('focus', 'input[type=number]', function(e) {
            $(this).on('mousewheel.disableScroll', function(e) {
                e.preventDefault();
            });
        });

        $('form').on('blur', 'input[type=number]', function(e) {
            $(this).off('mousewheel.disableScroll');
        });

        $('input.number').keyup(function(event) {

            // skip for arrow keys
            if (event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        });

        function comma_separator(num) {
            var num_parts = num.toString().split(".");
            num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            return num_parts.join(".");
        }

        function copy_referral_link() {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val("{{url('/')}}/{{auth()->user()->referral_code}}/signup").select();
            document.execCommand("copy");
            $temp.remove();

            $('#copy_referral_link_btn').html('Copied!');

            setInterval(() => {
                $('#copy_referral_link_btn').html('Copy Referral Link!');
            }, 1500);
        }
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
    </script>

    <script>
        $('#copy_right_year').html((new Date()).getFullYear());

        function ucwords(str) {
            if (str == null) { // test for null or undefined
                return "";
            }

            return str.replace(/\w\S*/g, function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }

        function format_date(str) {
            return str.split("-").reverse().join("-");
        }


        function wallet_trans_type(transaction_no) {
            var trans_type = [
                'Signup Credits', // 1
                'Referral Credits', // 2
                'Top-up Credits', // 3
                'Card Purchased', // 4
                'SMS Purchased', // 5
                'Card Renewed', // 6
                'Coupon Applied', // 7
                'First Card Cashback', // 8
                'Card Upgrade' // 9
            ]

            return trans_type[transaction_no - 1]
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script src="{{asset('sources/assets/sweetalert2/sweetalert2.all.min.js')}}"></script>


    <script src="{{asset('sources/assets/summernote/summernote-bs4.min.js')}}"></script>


    <!-- <script src="{{asset('sources/assets/owl/jquery.min.js')}}"></script> -->
    <script src="{{asset('sources/assets/owl/owl.carousel.js')}}"></script>

    <!-- data-table js -->
    <script src="{{asset('sources/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('sources/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('sources/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('sources/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{asset('sources/assets/js/croppie.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/assets/js/jscolor.js')}}"></script>

    @yield('page-scripts')

    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('sources/assets/pages/dashboard/custom-dashboard.min.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('sources/assets/js/SmoothScroll.js')}}"></script>

    <script src="{{asset('sources/assets/js/pcoded.min.js')}}"></script>
    <script src="{{asset('sources/assets/js/demo-12.js')}}"></script>
    <script src="{{asset('sources/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/assets/js/script.js')}}"></script>

    <!-- pnotify js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.desktop.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.buttons.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.confirm.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.callbacks.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.animate.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.history.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.mobile.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/pnotify/js/pnotify.nonblock.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/assets/pages/pnotify/notify.js')}}"></script>


    <!-- notification js -->
    <script type="text/javascript" src="{{asset('sources/assets/js/bootstrap-growl.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/assets/pages/notification/notification.js?v=1.1')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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

        function YouTubeGetID(url) {
            var ID = '';
            url = url.replace(/(>|<)/gi, '').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
            if (url[2] !== undefined) {
                ID = url[2].split(/[^0-9a-z_\-]/i);
                ID = ID[0];
            } else {
                ID = url;
            }
            return ID;
        }
    </script>

    @include('user_layouts.alerts')
</body>