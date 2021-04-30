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
    <link rel="icon" href="{{asset('sources/assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('sources/assets/images/favicon.ico')}}" type="image/x-icon">

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
    <!-- C3 chart -->
    <!-- <link rel="stylesheet" href="{{asset('sources/bower_components/c3/css/c3.css')}}" type="text/css" media="all"> -->
    <!-- Calender css -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/pages/widget/calender/pignose.calendar.min.css')}}"> -->
    <!-- flag icon framework css -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/pages/flag-icon/flag-icon.min.css')}}"> -->
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/pages/menu-search/css/component.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/css/style.css?v=1')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/css/jquery.mCustomScrollbar.css')}}">

    @yield('page-css')

    <!-- notify js Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/pnotify/css/pnotify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/pnotify/css/pnotify.brighttheme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/pnotify/css/pnotify.buttons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/pnotify/css/pnotify.history.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/pnotify/css/pnotify.mobile.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/pages/pnotify/notify.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('sources/bower_components/animate.css/css/animate.css')}}">

    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/pages/notification/notification.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/css/easy-autocomplete.min.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('sources/assets/summernote/summernote-bs4.css')}}">


    <script type="text/javascript" src="{{asset('sources/bower_components/jquery/js/jquery.min.js')}}"></script>

    <!-- <script type="text/javascript" src="{{asset('sources/assets/js/jquery.wheelcolorpicker.js')}}"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('sources/assets/css/wheelcolorpicker.css')}}" /> -->
   
    <script type="text/javascript" src="{{asset('sources/assets/js/bootstrap-multiselect.js')}}"></script>
    <link rel="stylesheet" href="{{asset('sources/assets/css/bootstrap-multiselect.css')}}" type="text/css"/>

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
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
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
        <!-- @include('superadmin_layouts.side-nav') -->
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @if(Auth::check())
                @include('superadmin_layouts.header')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @include('superadmin_layouts.side-nav')        
                    @yield('content')
                </div>
            </div>
            @endif

        </div>
    </div>

    @yield('login')



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

    <script src="{{asset('sources/assets/summernote/summernote-bs4.min.js')}}"></script>


    <script src="{{asset('sources/assets/sweetalert2/sweetalert2.all.min.js')}}"></script>

    <!-- data-table js -->
    <script src="{{asset('sources/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('sources/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('sources/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('sources/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- <script type="text/javascript" src="{{asset('sources/assets/js/jquery.freezeheader.js')}}"></script> -->

    <!-- <script type="text/javascript" src="{{asset('sources/assets/js/tablescroller.js')}}"></script> -->

<script>
function secondsToHms(d) {
    d = Number(d);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    var hDisplay = h > 0 ? h + (h == 1 ? " Hr, " : " Hrs, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " Min, " : " Mint's, ") : "";
    var sDisplay = s > 0 ? s + (s == 1 ? " Sec" : " Sec's") : "";
    return hDisplay + mDisplay + sDisplay; 
}
</script>

<script src="{{asset('sources/assets/js/croppie.js')}}"></script>
<script type="text/javascript" src="{{asset('sources/assets/js/jscolor.js')}}"></script>

    @yield('page-scripts')



    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{asset('sources/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('sources/assets/pages/dashboard/custom-dashboard.min.js')}}"></script> -->
    <!-- <script type="text/javascript" src="{{asset('sources/assets/js/SmoothScroll.js')}}"></script> -->

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

    <script type="text/javascript" src="{{asset('sources/assets/custom/jquery.easy-autocomplete.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/assets/custom/table-to-csv.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script type="text/javascript" src="{{asset('sources/assets/js/jquery.table2excel.js')}}"></script>

    <script>
        function export_csv(tableID,filename='')
        {
            // var table = document.getElementById(table_name);
            // var html = table.outerHTML;
            // var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
            // elem.setAttribute("href", url);
            // elem.setAttribute("download", "export.xls"); // Choose the file name
            // return false;

            // var downloadLink;
            // var dataType = 'application/vnd.ms-excel';
            // var tableSelect = document.getElementById(tableID);
            // var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
            
            // // Specify file name
            // filename = filename?filename+'.xls':'excel_data.xls';
            
            // // Create download link element
            // downloadLink = document.createElement("a");
            
            // document.body.appendChild(downloadLink);
            
            // if(navigator.msSaveOrOpenBlob){
            //     var blob = new Blob(['\ufeff', tableHTML], {
            //         type: dataType
            //     });
            //     navigator.msSaveOrOpenBlob( blob, filename);
            // }else{
            //     // Create a link to the file
            //     downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            
            //     // Setting the file name
            //     downloadLink.download = filename;
                
            //     //triggering the function
            //     downloadLink.click();
            // }

            $("#"+tableID).table2excel({
					exclude: ".noExl",
    				name: "Excel Document Name"
            }); 
                
            // var table = table_name;
            // $("#"+table+"").tableToCSV();
        }

    </script>

    @include('superadmin_layouts.alerts')
</body>