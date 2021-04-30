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

        input[type="text"], input[type="password"],input[type="text"]:focus, input[type="password"]:focus
        {
            background-color: #fafafa;
            border-radius:0px;
            margin: 4px;;
            /* border:1px solid #fafafa; */
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

    <div class="container-fluid">
        <div class="col-md-6">
            <form action="{{route('superadmin.login')}}" method="POST">
                @csrf
                <center>
                    <div class="col-md-8 offset-md-2" style="padding-top:30vh;">
                        <div class="text-center">
                            <img src="{{asset('sources/assets/images/b2b_logo.png')}}" style="max-height:60px;" alt="logo.png">
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center">Sign In</h5>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="superadmin_id" placeholder="Super Admin ID">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <span class="md-line"></span>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </form>
        </div>
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

    @include('superadmin_layouts.alerts')
</body>