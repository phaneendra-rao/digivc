
<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <title>{{$my_card->company_name}}</title>

    @if($my_card->contact_profile_pic!=null)
    <meta name="image" content="{{asset('sources/assets/images/user_card/contact_profile_pic')}}/{{$my_card->contact_profile_pic}}">
    <meta property="og:image" content="{{asset('sources/assets/images/user_card/contact_profile_pic')}}/{{$my_card->contact_profile_pic}}">
    <meta name="twitter:image:src" content="{{asset('sources/assets/images/user_card/contact_profile_pic')}}/{{$my_card->contact_profile_pic}}">
    <link rel="shortcut icon" href="{{asset('sources/assets/images/user_card/contact_profile_pic')}}/{{$my_card->contact_profile_pic}}">
    @elseif($my_card->company_logo!=null)
    <meta name="image" content="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}">
    <meta property="og:image" content="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}">
    <meta name="twitter:image:src" content="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}">
    <link rel="shortcut icon" href="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}">
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="{{$my_card->company_about}}" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <link rel="stylesheet" href="{{asset('/sources/template_one/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/sources/template_one/css/normalize.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/sources/template_one/css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/sources/template_one/css/transition-animations.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/sources/template_one/css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/sources/template_one/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/sources/template_one/css/main-green.css')}}" type="text/css">
    <!-- <link rel="stylesheet" href="{{asset('/sources/assets/css/nanogallery2.woff.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('/sources/assets/css/nanogallery2.min.css')}}" type="text/css"> -->

    <link rel="stylesheet" href="{{asset('/sources/assets/lightbox/css/simple-lightbox.css')}}" type="text/css">

    <script src="{{asset('/sources/template_one/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('/sources/template_one/js/modernizr.custom.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('sources/assets/sweetalert2/sweetalert2.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Poppins&display=swap" rel="stylesheet">



    <style>
#button {
  background-color: #004A7F;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: .800rem;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 10px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 10px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 10px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 10px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
    body
    {
      font-family: 'Open Sans', sans-serif !important;
    }
    .social-links .trigger
    {
      margin-left:10px !important;
      margin-right:10px !important;
    }

    .pt-trigger small
    {
      background-color:white;padding:2px;border-radius:2px;text-align:center;
    }

    .about-me ul  {
      list-style: none;
      padding: 0;
    }
    .about-me ul li {
      padding-left: 1.3em;
    }
    .about-me ul li:before {
      content: "\f00c"; /* FontAwesome Unicode */
      font-family: FontAwesome;
      display: inline-block;
      margin-left: -1.3em; /* same as padding-left set on li */
      width: 1.3em; /* same as padding-left set on li */
    }

    .start-page-content .page-header
    {
      background-color: #{{$my_card->primary_color}} !important;
    }

    .btn
    {
      background-color: #{{$my_card->primary_color}} !important;
    }

    #digi
    {
      color: #{{$my_card->primary_color}} !important;
    }

    .social-links .links
    {
      box-shadow:none !important;
    } 

    .social-links .links:hover
    {
      display: inline-block !important;
      width: 36px !important;
      height: 36px !important;
      border-radius: 24px !important;
      background-color: #fff !important;
      margin: 0 1px !important;
      color: #9e9e9e !important;
      text-align: center !important;
      -webkit-box-shadow: 0px 3px 8px 0px rgba(0,0,0,0.1) !important;
      -moz-box-shadow: 0px 3px 8px 0px rgba(0,0,0,0.1) !important;
      box-shadow: 0px 3px 8px 0px rgba(0,0,0,0.1) !important;
    }

    .container .gallery a img {
            float: left;
            width: 25%;
            height: auto;
            border: 2px solid #fff;
            -webkit-transition: -webkit-transform .15s ease;
            -moz-transition: -moz-transform .15s ease;
            -o-transition: -o-transform .15s ease;
            -ms-transition: -ms-transform .15s ease;
            transition: transform .15s ease;
            position: relative;
        }

        .clear {
            clear: both;
        }

        .youtube_video {
          width:250px;
          height:160px
        }

        @media screen and (max-width: 350px) {
          .youtube_video {
            width:220px;
            height:130px
          }
        }

    </style>

  </head>

  <body class="material-template" id="page">
    <!-- Loading animation -->
    <div class="preloader">
      <div class="preloader-animation">
        <div class="preloader-spinner">
        </div>
      </div>
    </div>
    <!-- /Loading animation -->

    <div id="page" class="page" style="margin-top:0px;padding-top:0px;">
      <!-- Header -->
      <header id="site_header" class="header hidden mobile-menu-hide" style="margin-top:0px;padding-top:0px;height:0px;">
        <div class="header-content" style="margin-top:0px;padding-top:0px;height:0px;">
          <div class="site-title-block mobile-hidden" style="margin-top:0px;padding-top:0px;height:0px;">
            <div class="site-title" style="margin-top:0px;padding-top:0px;height:0px;"></div>
          </div>

          <div class="site-nav" style="margin-top:0px;padding-top:0px;height:0px;">

            <ul id="nav" class="site-main-menu" style="margin-top:0px;padding-top:0px;height:0px;">
              <li>
                <a class="pt-trigger" href="#home">Home</a>
              </li>
              <li>
                <a class="pt-trigger" href="#user">User</a>
              </li>
              @if($products!=null)
              <li>
                <a class="pt-trigger" href="#products">Products</a>
              </li>
              @endif
              <li>
                <a class="pt-trigger" href="#contact">Contact</a>
              </li>
              <li>
                <a class="pt-trigger" href="#payment">Payment</a>
              </li>
              <li>
                <a class="pt-trigger" href="#company_map">Map</a>
              </li>
              <li>
                <a class="pt-trigger" href="#share">Share</a>
              </li>
            </ul>

          </div>

        </div>
      </header>
      <!-- /Header -->

      <!-- Main Content -->
      <div id="main" class="site-main" style="top:0px;">
        <!-- Page changer wrapper -->
        <div class="pt-wrapper">
          <!-- Subpages -->
          <div class="subpages">

            <!-- Home Subpage -->
            <section class="pt-page" data-id="home" style="margin-top:0px;padding-top:0px;">
              <div class="section-inner start-page-content" style="margin-top:0px;padding-top:0px;">

                <div class="page-header" >
                  <div class="row">
                    <div class="social-links">
                      <a class="pt-trigger pull-left" style="margin-top:-60px;margin-right:-6px;" href="#home"><i class="fa fa-home"></i></a>
                      <a class="pt-trigger pull-right" style="margin-top:-60px;margin-right:-6px;" href="#share"><i class="fa fa-share-alt"></i></a>
                    </div>
                    
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      @if($my_card['contact_profile_pic']!=null)
                        @if($my_card['logo_shape']=='round')
                        <div class="photo" style="border-radius:50%;">
                          <img src="{{asset('sources/assets/images/user_card/contact_profile_pic')}}/{{$my_card->contact_profile_pic}}" class="img img-circle" alt="">
                        </div>
                        @elseif($my_card['logo_shape']=='square')
                        <div class="photo" style="border-radius:0%;">
                          <img src="{{asset('sources/assets/images/user_card/contact_profile_pic')}}/{{$my_card->contact_profile_pic}}" class="img img-responsive" alt="">
                        </div>
                        @endif
                      @elseif($my_card['company_logo']!=null)
                        @if($my_card['logo_shape']=='round')
                        <div class="photo" style="border-radius:50%;">
                          <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" class="img img-circle" alt="">
                        </div>
                        @elseif($my_card['logo_shape']=='square')
                        <div class="photo" style="border-radius:0%;">
                          <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" class="img img-responsive" alt="">
                        </div>
                        @endif
                      @endif
                    </div>

                    <div class="col-sm-8 col-md-8 col-lg-8">
                      <div class="title-block">
                        <!-- <div class="owl-carousel text-rotation">                                    
                          <div class="item">
                            <div class="sp-subtitle">Web Designer</div>
                          </div>
                          <div class="item">
                            <div class="sp-subtitle">Frontend-developer</div>
                          </div>
                        </div> -->
                      </div>

                      <div class="social-links" style="margin-bottom:-90px;">
                        <a class="pt-trigger trigger" href="#user"><i class="fa fa-info-circle"></i> <small style="color:black;">About</small></a>
                        <a class="pt-trigger trigger" href="#payment"><i class="fa fa-money"></i> <small style="color:black;">Payment</small></a>
                        <a class="pt-trigger trigger" href="#contact"><i class="fa fa-envelope-open"></i> <small style="color:black;">Enquiry</small></a>
                        <a class="pt-trigger trigger" href="#company_map"><i class="fa fa-map-marker"></i> <small style="color:black;">Location</small></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:50px;padding-bottom:10px;">

                    <h1 style="font-size:1.5rem;text-align:center;">{{$my_card->contact_person_name}}</h1>

                    @if($my_card->contact_person_designation!=null)
                      <p style="color:black;text-align:center;">{{$my_card->contact_person_designation}}</p>
                    @endif
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12">
                  @if($my_card->company_phone!=null)
                    <hr style="margin-bottom:8px;margin-top:8px;">
                    <a style="color:black;" href="tel:{{$my_card->company_phone}}"><i style="font-size:1.8rem;margin-right:20px;" class="fa fa-mobile"></i> {{$my_card->company_phone}}</a>
                  @endif
                  @if($my_card->company_whatsapp_no!=null)
                    <hr style="margin-bottom:8px;margin-top:8px;">
                    <a  style="color:black;" href="https://api.whatsapp.com/send?phone={{$my_card->company_whatsapp_no}}"><i style="font-size:1.5rem;margin-right:13px;" class="fa fa-whatsapp"></i> {{$my_card->company_whatsapp_no}}</a>
                  @endif
                  @if($my_card->company_email!=null)
                    <hr style="margin-bottom:8px;margin-top:8px;">
                    <a style="color:black;" href="mailto:{{$my_card->company_email}}"><i style="font-size:1.3rem;margin-right:13px;" class="fa fa-envelope-o"></i> {{$my_card->company_email}}</a>
                  @endif
                  @if($my_card->company_website!=null)
                    <hr style="margin-bottom:8px;margin-top:8px;">
                    <a  style="color:black;" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.5rem;margin-right:13px;" class="fa fa-globe"></i> {{$my_card->company_website}}</a>
                  @endif
                  @if($my_card->company_offer!=null)
                    <hr style="margin-bottom:8px;margin-top:8px;">
                    <div class="row">
                      <div class="col-xs-4" style="padding:0px;">
                        <p style="background-color:red;color:white;padding:5px 10px;text-align:center;font-size:.800rem;">Offer</p>
                      </div>
                      <div class="col-xs-8" style="padding:0px;">
                        <p style="background-color:white;color:red;padding:1px 0px;border:1px solid red;font-size:.800rem;"><marquee behavior="scroll" direction="left">{{$my_card->company_offer}}</marquee></p>
                      </div>
                    </div>
                  @endif
                </div>
                
                <div class="col-md-12">
                <div class="social-links row" style="margin-bottom:-60px;">
                    @if($my_card->contact_person_phone!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="tel:+{{$my_card->contact_person_phone}}"><center><i style="font-size:1.8rem;color:black;" class="fa fa-mobile"></i></center><small>Call</small></a>
                    </div>
                    @endif
                    @if($my_card->contact_person_whatsapp_no!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone={{$my_card->contact_person_whatsapp_no}}"><center><i style="font-size:1.3rem;color:#25D366;" class="fa fa-whatsapp"></i></center> <small>WhatsApp</small></a>
                    </div>
                    @endif
                    @if($my_card->company_email!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="mailto:{{$my_card->company_email}}"><center><i style="font-size:1.3rem;color:#D44638;" class="fa fa-envelope-o"></i></center> <small>Mail</small></a>
                    </div>
                    @endif
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="{{url('/')}}/{{$my_card->id}}/save-vcard"><center><i style="font-size:1.3rem;color:#4B5558;" class="fa fa-id-card-o"></i></center><small>SaveDVC</small></a>
                    </div>
                  </div>
                  <hr style="margin-bottom:0px;">
                  <br><br>
                  @if($card_shareable_links!=null)
                        <p class="social-links" style="padding-bottom:10px;">
                          @foreach($card_shareable_links as $link)
                            @if($link->name=='facebook' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#3b5998;font-size:1.3rem;" class="fa fa-facebook-square"></i></a>
                            @elseif($link->name=='googleplus' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#DD4B39;font-size:1.3rem;" class="fa fa-google-plus-square"></i></a>
                            @elseif($link->name=='twitter' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#00ACEE;font-size:1.3rem;" class="fa fa-twitter-square"></i></a>
                            @elseif($link->name=='linked_in' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#0e76a8;font-size:1.3rem;" class="fa fa-linkedin-square"></i></a>
                            @elseif($link->name=='instagram' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#3f729b;font-size:1.3rem;" class="fa fa-instagram"></i></a>
                            @elseif($link->name=='youtube' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:red;font-size:1.3rem;" class="fa fa-youtube"></i></a>
                            @endif
                          @endforeach
                          @if($my_card->company_website!=null)
                            <a class="links" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.3rem;" class="fa fa-globe"></i></a>
                          @endif
                        </p>  
                    @endif
                </div>

              </div>

            </section>
            <!-- End of Home Subpage -->

            <!-- Personal Subpage -->
            <section class="pt-page" data-id="user">
              <div class="section-inner start-page-content">
                <div class="page-header color-1">
                <div class="row">
                  <div class="social-links">
                    <a class="pt-trigger pull-left" style="margin-top:-60px;margin-right:-6px;" href="#home"><i class="fa fa-home"></i></a>
                    <a class="pt-trigger pull-right" style="margin-top:-60px;margin-right:-6px;" href="#share"><i class="fa fa-share-alt"></i></a>
                  </div>
                </div>
                <center>
                @if($my_card['logo_shape']=='round')
                  <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:50%;" class="img img-fluid" alt="">
                @elseif($my_card['logo_shape']=='square')
                  <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:0px;" class="img img-fluid" alt="">
                @endif
                </center>
                   <div class="row">
                        <div class="title-block">
                            <h1 style="font-size:1.5rem;font-family: 'Poppins', sans-serif;">{{$my_card->company_name}}</h1>
                            @if($my_card['tag_line']!=null)
                              <p style="font-size:1rem;font-family: 'Poppins', sans-serif;color:white;">{{$my_card->tag_line}}</p>
                            @endif
                        </div>
                        <div class="social-links" style="margin-bottom:-90px;">
                        <a class="pt-trigger trigger" href="#user"><i class="fa fa-info-circle"></i> <small style="color:black;">About</small></a>
                        <a class="pt-trigger trigger" href="#payment"><i class="fa fa-money"></i> <small style="color:black;">Payment</small></a>
                        <a class="pt-trigger trigger" href="#contact"><i class="fa fa-envelope-open"></i> <small style="color:black;">Enquiry</small></a>
                        <a class="pt-trigger trigger" href="#company_map"><i class="fa fa-map-marker"></i> <small style="color:black;">Location</small></a>
                        </div>
                   </div>
                </div>
                        
                <div class="col-md-12" style="margin-top:60px;">

                      <div class="about-me">
                        @if($products!=null)
                            <center>
                            <div class="social-links">
                              <a class="pt-trigger trigger" style="width:120px !important;height:30px !important;color:black;text-decoration:none !important;border:1px solid grey;border-radius:5px !important;" href="#products">Our Products</a>
                            </div>
                            </center>
                            <br>
                        @endif
                        @if($my_card->company_about!=null)
                          <div class="panel panel-default" style="padding:14px;">
                              <h5 style="text-align:center;margin-top:-23px;"><span style="background-color:white;padding:5px;">About</span></h5>
                              {!!nl2br($my_card->company_about)!!}
                          </div>
                        @endif
                        @if($card_services!=null)
                        <div class="panel panel-default" style="padding:14px;">
                              <h5 style="text-align:center;margin-top:-23px;"><span style="background-color:white;padding:5px;">Products/Services</span></h5>
                              <ul>
                                @foreach($card_services as $service)
                                  <li>{{$service->service}}</li>
                                @endforeach
                              </ul>
                        </div>
                        @endif
                        @if($videos!=null)
                        <div class="panel panel-default" style="padding:14px;">
                          <h5 style="text-align:center;margin-top:-23px;"><span style="background-color:white;padding:5px;">Videos</span></h5>
                          @foreach($videos as $video)
                            @php
                              preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->link, $match);
                              $youtube_id = $match[1];
                            @endphp
                            <div class="col-md-4">
                              <div class="video" style="margin-top:20px;">
                                <center>
                                 <iframe class="youtube_video" frameborder="0" src="https://www.youtube.com/embed/{{$youtube_id}}"></iframe>
                                </center>
                              </div>
                            </div>
                          @endforeach
                        </div>
                        @endif
                        @if($images!=null)
                        <div class="panel panel-default" style="padding:14px;">
                          <h5 style="text-align:center;margin-top:-23px;"><span style="background-color:white;padding:5px;">Gallery</span></h5>
                            <div class="gallery">
                              <div class="row">
                                @foreach($images as $img)
                                  <div class="col-md-4" style="margin:5px;">
                                    <a href="{{asset('/sources/assets/images/user_card/company_gallery_images/')}}/{{$img->image}}">
                                      <img src="{{asset('/sources/assets/images/user_card/company_gallery_images/')}}/{{$img->image}}" alt="" title="{{$img->title}}" />
                                    </a>
                                  </div>
                                @endforeach
                                <div class="clear"></div>
                              </div> 
                            </div> 
                        </div>
                        @endif
                        @if($clients!=null)
                        <div class="panel panel-default" style="padding:14px;">
                          <h5 style="text-align:center;margin-top:-23px;"><span style="background-color:white;padding:5px;">Our Clients</span></h5>
                          <ul>
                            @foreach($clients as $client)
                              <li>{{$client->client_name}}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif
                        @if($attachments!=null)
                        <div class="panel panel-default" style="padding:14px;">
                          <h5 style="text-align:center;margin-top:-23px;"><span style="background-color:white;padding:5px;">Downloadable Content</span></h5>
                          
                            @foreach($attachments as $attach)
                              <div style="margin-bottom:20px;">
                                <center>
                                  <a href="{{asset('sources/assets/user_card/company_dcs')}}/{{$attach->brochure}}" class="btn-default btn" style="color:white;" target="_blank">{{$attach->title}}</a>
                                </center>
                                <center><small>{{ucfirst($attach->type)}}</small></center>
                              </div>
                            @endforeach
                          
                        </div>
                        @endif
                      </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
                @if($my_card->company_phone!=null)
                  <hr style="margin-bottom:8px;margin-top:8px;">
                  <a style="color:black;" href="tel:{{$my_card->company_phone}}"><i style="font-size:1.8rem;margin-right:20px;" class="fa fa-mobile"></i> {{$my_card->company_phone}}</a>
                @endif
                @if($my_card->company_whatsapp_no!=null)
                  <hr style="margin-bottom:8px;margin-top:8px;">
                  <a  style="color:black;" href="https://api.whatsapp.com/send?phone={{$my_card->company_whatsapp_no}}"><i style="font-size:1.5rem;margin-right:13px;" class="fa fa-whatsapp"></i> {{$my_card->company_whatsapp_no}}</a>
                @endif
                @if($my_card->company_email!=null)
                  <hr style="margin-bottom:8px;margin-top:8px;">
                  <a style="color:black;" href="mailto:{{$my_card->company_email}}"><i style="font-size:1.3rem;margin-right:13px;" class="fa fa-envelope-o"></i> {{$my_card->company_email}}</a>
                @endif
                @if($my_card->company_website!=null)
                    <hr style="margin-bottom:8px;margin-top:8px;">
                    <a  style="color:black;" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.5rem;margin-right:13px;" class="fa fa-globe"></i> {{$my_card->company_website}}</a>
                  @endif
              </div>

              <div class="col-md-12">
              <div class="social-links row" style="margin-bottom:-60px;">
                    @if($my_card->contact_person_phone!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="tel:{{$my_card->contact_person_phone}}"><center><i style="font-size:1.8rem;color:black;" class="fa fa-mobile"></i></center><small>Call</small></a>
                    </div>
                    @endif
                    @if($my_card->contact_person_whatsapp_no!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone={{$my_card->contact_person_whatsapp_no}}"><center><i style="font-size:1.3rem;color:#25D366;" class="fa fa-whatsapp"></i></center> <small>WhatsApp</small></a>
                    </div>
                    @endif
                    @if($my_card->company_email!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="mailto:{{$my_card->company_email}}"><center><i style="font-size:1.3rem;color:#D44638;" class="fa fa-envelope-o"></i></center> <small>Mail</small></a>
                    </div>
                    @endif
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="{{url('/')}}/{{$my_card->id}}/save-vcard"><center><i style="font-size:1.3rem;color:#4B5558;" class="fa fa-id-card-o"></i></center><small>SaveDVC</small></a>
                    </div>
                  </div>
                  <hr style="margin-bottom:0px;">
                  <br><br>
                  @if($card_shareable_links!=null)
                        <p class="social-links" style="padding-bottom:10px;">
                          @foreach($card_shareable_links as $link)
                            @if($link->name=='facebook' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#3b5998;font-size:1.3rem;" class="fa fa-facebook-square"></i></a>
                            @elseif($link->name=='googleplus' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#DD4B39;font-size:1.3rem;" class="fa fa-google-plus-square"></i></a>
                            @elseif($link->name=='twitter' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#00ACEE;font-size:1.3rem;" class="fa fa-twitter-square"></i></a>
                            @elseif($link->name=='linked_in' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#0e76a8;font-size:1.3rem;" class="fa fa-linkedin-square"></i></a>
                            @elseif($link->name=='instagram' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#3f729b;font-size:1.3rem;" class="fa fa-instagram"></i></a>
                            @elseif($link->name=='youtube' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:red;font-size:1.3rem;" class="fa fa-youtube"></i></a>
                            @endif
                          @endforeach
                          @if($my_card->company_website!=null)
                            <a class="links" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.3rem;" class="fa fa-globe"></i></a>
                          @endif
                        </p>  
                    @endif
                </div>
              </div>
            </section>
            <!-- End of Personal Subpage -->

            @if($products!=null)
            <section class="pt-page" data-id="products">
              <div class="section-inner start-page-content">
                <div class="page-header color-1">
                    <div class="row">
                      <div class="social-links">
                        <a class="pt-trigger pull-left" style="margin-top:-60px;margin-right:-6px;" href="#home"><i class="fa fa-home"></i></a>
                        <a class="pt-trigger pull-right" style="margin-top:-60px;margin-right:-6px;" href="#share"><i class="fa fa-share-alt"></i></a>
                      </div>
                    </div>
                    <center>
                    @if($my_card['logo_shape']=='round')
                      <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:50%;" class="img img-fluid" alt="">
                    @elseif($my_card['logo_shape']=='square')
                      <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:0px;" class="img img-fluid" alt="">
                    @endif
                    </center>
                   <div class="row">
                        <div class="title-block">
                            <h1 style="font-size:1.5rem;font-family: 'Poppins', sans-serif;">Our Products</h1>
                        </div>
                        <div class="social-links" style="margin-bottom:-90px;">
                        <a class="pt-trigger trigger" href="#user"><i class="fa fa-info-circle"></i> <small style="color:black;">About</small></a>
                        <a class="pt-trigger trigger" href="#payment"><i class="fa fa-money"></i> <small style="color:black;">Payment</small></a>
                        <a class="pt-trigger trigger" href="#contact"><i class="fa fa-envelope-open"></i> <small style="color:black;">Enquiry</small></a>
                        <a class="pt-trigger trigger" href="#company_map"><i class="fa fa-map-marker"></i> <small style="color:black;">Location</small></a>
                        </div>
                   </div>
                </div>
                <div class="col-md-12" style="margin-top:60px;">
                @foreach($products as $index => $product)
                
                <div class="panel panel-default" style="padding:14px;">
                    <h5 style="text-align:center;margin-top:-23px;"><span style="background-color:white;padding:5px;">{{$product->name}}</span></h5>
                    <img src="{{asset('/sources/assets/images/user_card/company_product_images')}}/{{$product->image}}" class="img img-responsive" alt="{{$product->name}}">
                    @if($product->description!=null)
                      <hr style="margin-bottom:8px;margin-top:8px;">
                      <p style="color:black;">{{$product->description}}</p>
                    @endif
                    @if($product->price!=null)
                      <hr style="margin-bottom:8px;margin-top:8px;">
                      <a style="color:black;pointer:none;"><i style="font-size:1.2rem;margin-right:20px;" class="fa fa-money"></i> Rs: {{$product->price}}</a>
                    @endif
                    @if($product->payment_link!=null)
                      <hr style="margin-bottom:8px;margin-top:8px;">
                      <a style="color:black;" href="{{$product->payment_link}}" target="_blank"> <i style="font-size:1.2rem;margin-right:20px;" class="fa fa-shopping-cart"></i> Buy Now</a>
                    @endif

                </div>
                @endforeach
                </div>                

                <div class="col-sm-12 col-md-12 col-lg-12">
                @if($my_card->company_phone!=null)
                  <hr style="margin-bottom:8px;margin-top:8px;">
                  <a style="color:black;" href="tel:{{$my_card->company_phone}}"><i style="font-size:1.8rem;margin-right:20px;" class="fa fa-mobile"></i> {{$my_card->company_phone}}</a>
                @endif
                @if($my_card->company_whatsapp_no!=null)
                  <hr style="margin-bottom:8px;margin-top:8px;">
                  <a  style="color:black;" href="https://api.whatsapp.com/send?phone={{$my_card->company_whatsapp_no}}"><i style="font-size:1.5rem;margin-right:13px;" class="fa fa-whatsapp"></i> {{$my_card->company_whatsapp_no}}</a>
                @endif
                @if($my_card->company_email!=null)
                  <hr style="margin-bottom:8px;margin-top:8px;">
                  <a style="color:black;" href="mailto:{{$my_card->company_email}}"><i style="font-size:1.3rem;margin-right:13px;" class="fa fa-envelope-o"></i> {{$my_card->company_email}}</a>
                @endif
                @if($my_card->company_website!=null)
                    <hr style="margin-bottom:8px;margin-top:8px;">
                    <a  style="color:black;" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.5rem;margin-right:13px;" class="fa fa-globe"></i> {{$my_card->company_website}}</a>
                  @endif
              </div>

              <div class="col-md-12">
              <div class="social-links row" style="margin-bottom:-60px;">
                    @if($my_card->contact_person_phone!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="tel:{{$my_card->contact_person_phone}}"><center><i style="font-size:1.8rem;color:black;" class="fa fa-mobile"></i></center><small>Call</small></a>
                    </div>
                    @endif
                    @if($my_card->contact_person_whatsapp_no!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone={{$my_card->contact_person_whatsapp_no}}"><center><i style="font-size:1.3rem;color:#25D366;" class="fa fa-whatsapp"></i></center> <small>WhatsApp</small></a>
                    </div>
                    @endif
                    @if($my_card->company_email!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="mailto:{{$my_card->company_email}}"><center><i style="font-size:1.3rem;color:#D44638;" class="fa fa-envelope-o"></i></center> <small>Mail</small></a>
                    </div>
                    @endif
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="{{url('/')}}/{{$my_card->id}}/save-vcard"><center><i style="font-size:1.3rem;color:#4B5558;" class="fa fa-id-card-o"></i></center><small>SaveDVC</small></a>
                    </div>
                  </div>
                  <hr style="margin-bottom:0px;">
                  <br><br>
                  @if($card_shareable_links!=null)
                        <p class="social-links" style="padding-bottom:10px;">
                          @foreach($card_shareable_links as $link)
                            @if($link->name=='facebook' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#3b5998;font-size:1.3rem;" class="fa fa-facebook-square"></i></a>
                            @elseif($link->name=='googleplus' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#DD4B39;font-size:1.3rem;" class="fa fa-google-plus-square"></i></a>
                            @elseif($link->name=='twitter' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#00ACEE;font-size:1.3rem;" class="fa fa-twitter-square"></i></a>
                            @elseif($link->name=='linked_in' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#0e76a8;font-size:1.3rem;" class="fa fa-linkedin-square"></i></a>
                            @elseif($link->name=='instagram' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#3f729b;font-size:1.3rem;" class="fa fa-instagram"></i></a>
                            @elseif($link->name=='youtube' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:red;font-size:1.3rem;" class="fa fa-youtube"></i></a>
                            @endif
                          @endforeach
                          @if($my_card->company_website!=null)
                            <a class="links" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.3rem;" class="fa fa-globe"></i></a>
                          @endif
                        </p>  
                    @endif
                </div>
              </div>
            </section>
            <!-- End of Personal Subpage -->

            @endif

            <!-- Contact Subpage -->
            <section class="pt-page" data-id="payment">
              <div class="section-inner start-page-content">
                <div class="page-header color-1" style="padding-top:10px;">
                 <div class="row">
                  <div class="social-links">
                    <a class="pt-trigger pull-left" style="margin-top:-20px;margin-right:-6px;" href="#home"><i class="fa fa-home"></i></a>
                    <a class="pt-trigger pull-right" style="margin-top:-20px;margin-right:-6px;" href="#share"><i class="fa fa-share-alt"></i></a>
                  </div>
                 </div>
                  <center>
                  @if($my_card['logo_shape']=='round')
                  <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:50%;" class="img img-fluid" alt="">
                  @elseif($my_card['logo_shape']=='square')
                    <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:0px;" class="img img-fluid" alt="">
                  @endif
                  </center>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="title-block">
                          <h1 style="color:white;font-size:1.5rem;font-family: 'Poppins', sans-serif;">Payment Options</h1>
                      </div>
                      <div class="social-links" style="margin-bottom:-90px;">
                      <a class="pt-trigger trigger" href="#user"><i class="fa fa-info-circle"></i> <small style="color:black;">About</small></a>
                        <a class="pt-trigger trigger" href="#payment"><i class="fa fa-money"></i> <small style="color:black;">Payment</small></a>
                        <a class="pt-trigger trigger" href="#contact"><i class="fa fa-envelope-open"></i> <small style="color:black;">Enquiry</small></a>
                        <a class="pt-trigger trigger" href="#company_map"><i class="fa fa-map-marker"></i> <small style="color:black;">Location</small></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="page-content" style="margin-bottom:0px;padding-bottom:0px;margin-top:30px;">


                </div>
                @if($card_gst_nos!=null)
                <div class="row">
                  <div class="col-md-12">

                      <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12" style="margin-bottom:10px;">
                          <div class="panel panel-default" style="padding-bottom:10px;">
                          <h5 style="padding:14px 14px 0px 14px;text-align:center;margin-top:-23px;"><span style="background-color:white;padding:5px;">GST No</span></h5>

                      @foreach($card_gst_nos as $index => $gst_no)
                        @if($index==0)

                            <h5 style="text-align:center;margin:0px;">{{$gst_no->company_name}}</h5>
                            <p style="text-align:center;margin:0px;">{{$gst_no->gst_no}}</p>
                        @endif
                       @endforeach
                       </div>
                        </div>

                  </div>
                </div>

                @endif
                <div class="row">
                  <div class="col-md-12">
                    @if($online_payments!=null)
                    @foreach($online_payments as $payment)
                      @if($payment->payment_type=='paytm' && $payment->number!=null)
                      <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12">
                        <div class="panel panel-default">
                          <h5 style="padding:14px 14px 0px 14px;text-align:center;margin-top:-40px;"><span ><img src="{{asset('/sources/assets/images/paytm.png')}}" style="max-height:50px;background-color:white;padding:5px;" alt=""></span></h5>
                          <p class="text-center">{{$payment->number}}</p>
                        </div>
                      </div>
                      @elseif($payment->payment_type=='phonepe' && $payment->number!=null)
                      <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12">
                        <div class="panel panel-default">
                        <h5 style="padding:14px 14px 0px 14px;text-align:center;margin-top:-35px;"><span ><img src="{{asset('/sources/assets/images/phonepe.png')}}" style="border-radius:50%;max-height:40px;background-color:white;padding:5px;" alt=""></span></h5>
                          <p class="text-center">{{$payment->number}}</p>
                        </div>
                      </div>
                      @elseif($payment->payment_type=='googlepay' && $payment->number!=null)
                      <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12" style="margin-top:6px;">
                        <div class="panel panel-default">
                        <h5 style="padding:14px 14px 0px 14px;text-align:center;margin-top:-40px;"><span ><img src="{{asset('/sources/assets/images/googlepay.jpg')}}" style="border-radius:50%;max-height:45px;background-color:white;" alt=""></span></h5>
                          <p class="text-center">{{$payment->number}}</p>
                        </div>
                      </div>
                      @elseif($payment->payment_type=='upi' && $payment->link!=null)
                      <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12">
                        <div class="panel panel-default">
                        <h5 style="padding:14px 14px 0px 14px;text-align:center;margin-top:-35px;"><span ><img src="{{asset('/sources/assets/images/upi.png')}}" style="max-height:50px;background-color:white;padding:5px;" alt=""></span></h5>
                          <p class="text-center">{{$payment->link}}</p>
                        </div>
                      </div>
                      @elseif($payment->payment_type=='paypal' && $payment->link!=null)
                      <div class="col-md-4 col-sm-12 col-lg-4 col-xs-12">
                        <div class="panel panel-default">
                        <h5 style="padding:14px 14px 0px 14px;text-align:center;margin-top:-35px;"><span ><img src="{{asset('/sources/assets/images/paypal.png')}}" style="max-height:35px;background-color:white;padding:5px;" alt=""></span></h5>
                          <p class="text-center">{{$payment->link}}</p>                          
                        </div>
                      </div>
                      @endif
                    @endforeach
                    @endif


                  </div>
                </div>
                <div class="col-md-12">
                <div class="social-links row" style="margin-bottom:-60px;">
                    @if($my_card->contact_person_phone!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="tel:{{$my_card->contact_person_phone}}"><center><i style="font-size:1.8rem;color:black;" class="fa fa-mobile"></i></center><small>Call</small></a>
                    </div>
                    @endif
                    @if($my_card->contact_person_whatsapp_no!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone={{$my_card->contact_person_whatsapp_no}}"><center><i style="font-size:1.3rem;color:#25D366;" class="fa fa-whatsapp"></i></center> <small>WhatsApp</small></a>
                    </div>
                    @endif
                    @if($my_card->company_email!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="mailto:{{$my_card->company_email}}"><center><i style="font-size:1.3rem;color:#D44638;" class="fa fa-envelope-o"></i></center> <small>Mail</small></a>
                    </div>
                    @endif
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="{{url('/')}}/{{$my_card->id}}/save-vcard"><center><i style="font-size:1.3rem;color:#4B5558;" class="fa fa-id-card-o"></i></center><small>SaveDVC</small></a>
                    </div>
                  </div>
                  <hr style="margin-bottom:0px;">
                  <br><br>
                  @if($card_shareable_links!=null)
                        <p class="social-links" style="padding-bottom:10px;">
                          @foreach($card_shareable_links as $link)
                            @if($link->name=='facebook' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#3b5998;font-size:1.3rem;" class="fa fa-facebook-square"></i></a>
                            @elseif($link->name=='googleplus' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#DD4B39;font-size:1.3rem;" class="fa fa-google-plus-square"></i></a>
                            @elseif($link->name=='twitter' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#00ACEE;font-size:1.3rem;" class="fa fa-twitter-square"></i></a>
                            @elseif($link->name=='linked_in' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#0e76a8;font-size:1.3rem;" class="fa fa-linkedin-square"></i></a>
                            @elseif($link->name=='instagram' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#3f729b;font-size:1.3rem;" class="fa fa-instagram"></i></a>
                            @elseif($link->name=='youtube' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:red;font-size:1.3rem;" class="fa fa-youtube"></i></a>
                            @endif
                          @endforeach
                          @if($my_card->company_website!=null)
                            <a class="links" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.3rem;" class="fa fa-globe"></i></a>
                          @endif
                        </p>  
                    @endif
                </div>
              </div>
            </section>
            <!-- End Contact Subpage -->

            <!-- Contact Subpage -->
            <section class="pt-page" data-id="contact">
              <div class="section-inner start-page-content">
                <div class="page-header color-1" style="padding-top:10px;">
                 <div class="row">
                  <div class="social-links">
                    <a class="pt-trigger pull-left" style="margin-top:-20px;margin-right:-6px;" href="#home"><i class="fa fa-home"></i></a>
                    <a class="pt-trigger pull-right" style="margin-top:-20px;margin-right:-6px;" href="#share"><i class="fa fa-share-alt"></i></a>
                  </div>
                 </div>
                  <center>
                  @if($my_card['logo_shape']=='round')
                  <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:50%;" class="img img-fluid" alt="">
                  @elseif($my_card['logo_shape']=='square')
                    <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:0px;" class="img img-fluid" alt="">
                  @endif
                  </center>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="title-block">
                          <h1 style="color:white;font-size:1.5rem;font-family: 'Poppins', sans-serif;">Contact Us</h1>
                      </div>
                      <div class="social-links" style="margin-bottom:-90px;">
                      <a class="pt-trigger trigger" href="#user"><i class="fa fa-info-circle"></i> <small style="color:black;">About</small></a>
                        <a class="pt-trigger trigger" href="#payment"><i class="fa fa-money"></i> <small style="color:black;">Payment</small></a>
                        <a class="pt-trigger trigger" href="#contact"><i class="fa fa-envelope-open"></i> <small style="color:black;">Enquiry</small></a>
                        <a class="pt-trigger trigger" href="#company_map"><i class="fa fa-map-marker"></i> <small style="color:black;">Location</small></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="page-content" style="margin-bottom:0px;padding-bottom:0px;margin-top:30px;">

                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <form id="contact_form">
                        @csrf
                          <input type="text" name="card_id" class="hidden" value="{{$my_card->id}}" readonly/>
                          <div class="form-group" style="width:100%;">
                            <input type="text" name="name" class="form-control" placeholder="Full Name">
                          </div>
                          <div class="form-group" style="width:100%;">
                            <input type="number" name="phone" class="form-control" placeholder="Phone">
                          </div>
                          <div class="form-group" style="width:100%;">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                          </div>
                          <div class="form-group" style="width:100%;">
                            <textarea name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                          </div>

                          <button type="button" id="send_message_btn" class="btn pull-right btn-send">Send</button>

                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                <div class="social-links row" style="margin-bottom:-60px;">
                    @if($my_card->contact_person_phone!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="tel:{{$my_card->contact_person_phone}}"><center><i style="font-size:1.8rem;color:black;" class="fa fa-mobile"></i></center><small>Call</small></a>
                    </div>
                    @endif
                    @if($my_card->contact_person_whatsapp_no!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone={{$my_card->contact_person_whatsapp_no}}"><center><i style="font-size:1.3rem;color:#25D366;" class="fa fa-whatsapp"></i></center> <small>WhatsApp</small></a>
                    </div>
                    @endif
                    @if($my_card->company_email!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="mailto:{{$my_card->company_email}}"><center><i style="font-size:1.3rem;color:#D44638;" class="fa fa-envelope-o"></i></center> <small>Mail</small></a>
                    </div>
                    @endif
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="{{url('/')}}/{{$my_card->id}}/save-vcard"><center><i style="font-size:1.3rem;color:#4B5558;" class="fa fa-id-card-o"></i></center><small>SaveDVC</small></a>
                    </div>
                  </div>
                  <hr style="margin-bottom:0px;">
                  <br><br>
                  @if($card_shareable_links!=null)
                        <p class="social-links" style="padding-bottom:10px;">
                          @foreach($card_shareable_links as $link)
                            @if($link->name=='facebook' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#3b5998;font-size:1.3rem;" class="fa fa-facebook-square"></i></a>
                            @elseif($link->name=='googleplus' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#DD4B39;font-size:1.3rem;" class="fa fa-google-plus-square"></i></a>
                            @elseif($link->name=='twitter' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#00ACEE;font-size:1.3rem;" class="fa fa-twitter-square"></i></a>
                            @elseif($link->name=='linked_in' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#0e76a8;font-size:1.3rem;" class="fa fa-linkedin-square"></i></a>
                            @elseif($link->name=='instagram' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#3f729b;font-size:1.3rem;" class="fa fa-instagram"></i></a>
                            @elseif($link->name=='youtube' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:red;font-size:1.3rem;" class="fa fa-youtube"></i></a>
                            @endif
                          @endforeach
                          @if($my_card->company_website!=null)
                            <a class="links" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.3rem;" class="fa fa-globe"></i></a>
                          @endif
                        </p>  
                    @endif
                </div>
              </div>
            </section>
            <!-- End Contact Subpage -->

            <!-- Location Subpage -->
            <section class="pt-page" data-id="company_map">
              <div class="section-inner start-page-content">
                <div class="page-header color-1" style="padding-top:10px;">
                <div class="row">
                  <div class="social-links">
                    <a class="pt-trigger pull-left" style="margin-top:-20px;margin-right:-6px;" href="#home"><i class="fa fa-home"></i></a>
                    <a class="pt-trigger pull-right" style="margin-top:-20px;margin-right:-6px;" href="#share"><i class="fa fa-share-alt"></i></a>
                  </div>
                 </div>
                <center>
                @if($my_card['logo_shape']=='round')
                  <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:50%;" class="img img-fluid" alt="">
                  @elseif($my_card['logo_shape']=='square')
                    <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:0px;" class="img img-fluid" alt="">
                  @endif
                  </center>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="title-block">
                          <h1 style="color:white;font-size:1.5rem;font-family: 'Poppins', sans-serif;">Our Location</h1>
                      </div>
                      <div class="social-links" style="margin-bottom:-90px;">
                      <a class="pt-trigger trigger" href="#user"><i class="fa fa-info-circle"></i> <small style="color:black;">About</small></a>
                        <a class="pt-trigger trigger" href="#payment"><i class="fa fa-money"></i> <small style="color:black;">Payment</small></a>
                        <a class="pt-trigger trigger" href="#contact"><i class="fa fa-envelope-open"></i> <small style="color:black;">Enquiry</small></a>
                        <a class="pt-trigger trigger" href="#company_map"><i class="fa fa-map-marker"></i> <small style="color:black;">Location</small></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="page-content" style="margin-bottom:0px;padding-bottom:0px;margin-top:30px;">
                    <!-- <input type="text" id="address-input" value="{{$my_card->company_location_map}}" name="company_location_map" class="form-control hidden map-input">
                    <input type="text" name="company_location_latitude" class="hidden" id="address-latitude" value="{{$my_card->company_location_latitude}}" />
                    <input type="text" name="company_location_longitude" class="hidden" id="address-longitude" value="{{$my_card->company_location_longitude}}" /> -->
                </div>


                  <div class="col-sm-12">
                    @if($card_addresses!=null)
                      @foreach($card_addresses as $index => $address)
                        @if($index==0)
                        <div class="panel panel-default" style="padding:0px;">
                          @if($address->branch_name!=null)
                          <h5 class="text-center" style="padding:5px 0px 0px 0px;">{{$address->branch_name}}</h5>
                          @endif
                          <p class="text-center" style="padding:10px;">{{$address->company_address}}</p>
                          @if($address->map_link!=null)
                            @php
                            preg_match('/src="([^"]+)"/', $address->map_link, $match);
                            $url = $match[1];
                            @endphp
                            <iframe src="{{$url}}" frameborder="0" width="100%" height="300" style="border:0;" allowfullscreen=""></iframe>
                          @endif
                        </div>
                        @endif
                      @endforeach
                    @endif
                  </div>


                <div class="col-md-12">
                <div class="social-links row" style="margin-bottom:-60px;">
                    @if($my_card->contact_person_phone!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="tel:+{{$my_card->contact_person_phone}}"><center><i style="font-size:1.8rem;color:black;" class="fa fa-mobile"></i></center><small>Call</small></a>
                    </div>
                    @endif
                    @if($my_card->contact_person_whatsapp_no!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone={{$my_card->contact_person_whatsapp_no}}"><center><i style="font-size:1.3rem;color:#25D366;" class="fa fa-whatsapp"></i></center> <small>WhatsApp</small></a>
                    </div>
                    @endif
                    @if($my_card->company_email!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="mailto:{{$my_card->company_email}}"><center><i style="font-size:1.3rem;color:#D44638;" class="fa fa-envelope-o"></i></center> <small>Mail</small></a>
                    </div>
                    @endif
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="{{url('/')}}/{{$my_card->id}}/save-vcard"><center><i style="font-size:1.3rem;color:#4B5558;" class="fa fa-id-card-o"></i></center><small>SaveDVC</small></a>
                    </div>
                  </div>
                  <hr style="margin-bottom:0px;">
                  <br><br>
                  @if($card_shareable_links!=null)
                        <p class="social-links" style="padding-bottom:10px;">
                          @foreach($card_shareable_links as $link)
                            @if($link->name=='facebook' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#3b5998;font-size:1.3rem;" class="fa fa-facebook-square"></i></a>
                            @elseif($link->name=='googleplus' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#DD4B39;font-size:1.3rem;" class="fa fa-google-plus-square"></i></a>
                            @elseif($link->name=='twitter' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#00ACEE;font-size:1.3rem;" class="fa fa-twitter-square"></i></a>
                            @elseif($link->name=='linked_in' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#0e76a8;font-size:1.3rem;" class="fa fa-linkedin-square"></i></a>
                            @elseif($link->name=='instagram' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#3f729b;font-size:1.3rem;" class="fa fa-instagram"></i></a>
                            @elseif($link->name=='youtube' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:red;font-size:1.3rem;" class="fa fa-youtube"></i></a>
                            @endif
                          @endforeach
                          @if($my_card->company_website!=null)
                            <a class="links" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.3rem;" class="fa fa-globe"></i></a>
                          @endif
                        </p>  
                    @endif
                </div>
              </div>
            </section>
            <!-- End Contact Subpage -->

            <!-- Location Subpage -->
            <section class="pt-page" data-id="share">
              <div class="section-inner start-page-content">
                <div class="page-header color-1" style="padding-top:10px;">
                <div class="row">
                  <div class="social-links">
                    <a class="pt-trigger pull-left" style="margin-top:-20px;margin-right:-6px;" href="#home"><i class="fa fa-home"></i></a>
                    <a class="pt-trigger pull-right" style="margin-top:-20px;margin-right:-6px;" href="#share"><i class="fa fa-share-alt"></i></a>
                  </div>
                 </div>
                  <center>
                  @if($my_card['logo_shape']=='round')
                  <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:50%;" class="img img-fluid" alt="">
                  @elseif($my_card['logo_shape']=='square')
                    <img src="{{asset('sources/assets/images/user_card/company_logo')}}/{{$my_card->company_logo}}" style="height:100px;width:auto;border-radius:0px;" class="img img-fluid" alt="">
                  @endif
                  </center>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="title-block">
                          <h1 style="color:white;font-size:1.5rem;font-family: 'Poppins', sans-serif;">Share us on :)</h1>
                      </div>
                      <div class="social-links" style="margin-bottom:-90px;">
                      <a class="pt-trigger trigger" href="#user"><i class="fa fa-info-circle"></i> <small style="color:black;">About</small></a>
                        <a class="pt-trigger trigger" href="#payment"><i class="fa fa-money"></i> <small style="color:black;">Payment</small></a>
                        <a class="pt-trigger trigger" href="#contact"><i class="fa fa-envelope-open"></i> <small style="color:black;">Enquiry</small></a>
                        <a class="pt-trigger trigger" href="#company_map"><i class="fa fa-map-marker"></i> <small style="color:black;">Location</small></a>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="row" style="margin-top:60px;">
                    <div class="col-md-12">
                      <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                        <a href="#" class="sms_pop_up_open">
                          <div class="panel panel-default">
                            <center>
                              <i style="color:#8db600;" class="fa fa-2x fa-commenting"></i>
                              <br>
                              <small style="color:black;">SMS</small>
                            </center>
                          </div>
                        </a>
                      </div>
                      <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                        <a href="mailto:?subject={{$my_card->company_name}} - Digital Business Card&body={{asset($my_card->slug)}}">
                          <div class="panel panel-default">
                            <center>
                              <i style="color:#DD4B39;" class="fa fa-2x fa-envelope"></i>                                  
                              <br>
                              <small style="color:black;">Mail</small>
                            </center>
                          </div>
                        </a>
                      </div>
                      <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                        <a href="whatsapp://send?text={{asset($my_card->slug)}}">
                          <div class="panel panel-default">
                            <center>
                              <i style="color:#25D366;" class="fa fa-2x fa-whatsapp"></i>
                              <br>
                              <small style="color:black;">WhatsApp</small>
                            </center>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{asset($my_card->slug)}}" target="_blank">
                          <div class="panel panel-default">
                            <center>
                              <i style="color:#3b5998;" class="fa fa-2x fa-facebook-square"></i>
                              <br>
                              <small style="color:black;">Facebook</small>
                            </center>
                          </div>
                        </a>
                      </div>
                      <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                        <a href="https://twitter.com/share?url={{asset($my_card->slug)}}" target="_blank">
                          <div class="panel panel-default">
                            <center>
                              <i style="color:#00ACEE;" class="fa fa-2x fa-twitter-square"></i>
                              <br>
                              <small style="color:black;">Twitter</small>
                            </center>
                          </div>
                        </a>
                      </div>
                      <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{asset($my_card->slug)}}" target="_blank">
                          <div class="panel panel-default">
                            <center>
                              <i style="color:#0e76a8" class="fa fa-2x fa-linkedin-square"></i>
                              <br>
                              <small style="color:black;">LinkedIn</small>
                            </center>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <h4 class="text-center">Click QR Code to download</h4>
                      <center>
                        <a href="data:image/png;base64, {!! base64_encode(\QrCode::format('png')->size(300)->generate(ASSET($my_card->slug))) !!}" download><img alt="QR Code" class="img img-responsive" src="data:image/png;base64, {!! base64_encode(\QrCode::format('png')->size(280)->generate(ASSET($my_card->slug))) !!}" ></a>
                      </center>
                    </div>
                  </div>

                  <div class="col-md-12">
                  <div class="social-links row" style="margin-bottom:-60px;">
                    @if($my_card->contact_person_phone!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="tel:+{{$my_card->contact_person_phone}}"><center><i style="font-size:1.8rem;color:black;" class="fa fa-mobile"></i></center><small>Call</small></a>
                    </div>
                    @endif
                    @if($my_card->contact_person_whatsapp_no!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="https://api.whatsapp.com/send?phone={{$my_card->contact_person_whatsapp_no}}"><center><i style="font-size:1.3rem;color:#25D366;" class="fa fa-whatsapp"></i></center> <small>WhatsApp</small></a>
                    </div>
                    @endif
                    @if($my_card->company_email!=null)
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="mailto:{{$my_card->company_email}}"><center><i style="font-size:1.3rem;color:#D44638;" class="fa fa-envelope-o"></i></center> <small>Mail</small></a>
                    </div>
                    @endif
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                      <a target="_blank" href="{{url('/')}}/{{$my_card->id}}/save-vcard"><center><i style="font-size:1.3rem;color:#4B5558;" class="fa fa-id-card-o"></i></center><small>SaveDVC</small></a>
                    </div>
                  </div>
                  <hr style="margin-bottom:0px;">
                  <br><br>
                  @if($card_shareable_links!=null)
                        <p class="social-links" style="padding-bottom:10px;">
                          @foreach($card_shareable_links as $link)
                            @if($link->name=='facebook' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#3b5998;font-size:1.3rem;" class="fa fa-facebook-square"></i></a>
                            @elseif($link->name=='googleplus' && $link->link!=null)
                                <a class="links"  target="_blank" href="{{$link->link}}"><i style="color:#DD4B39;font-size:1.3rem;" class="fa fa-google-plus-square"></i></a>
                            @elseif($link->name=='twitter' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#00ACEE;font-size:1.3rem;" class="fa fa-twitter-square"></i></a>
                            @elseif($link->name=='linked_in' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#0e76a8;font-size:1.3rem;" class="fa fa-linkedin-square"></i></a>
                            @elseif($link->name=='instagram' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:#3f729b;font-size:1.3rem;" class="fa fa-instagram"></i></a>
                            @elseif($link->name=='youtube' && $link->link!=null)
                                <a class="links" target="_blank" href="{{$link->link}}"><i style="color:red;font-size:1.3rem;" class="fa fa-youtube"></i></a>
                            @endif
                          @endforeach
                          @if($my_card->company_website!=null)
                            <a class="links" target="_blank" href="{{$my_card->company_website}}"><i style="font-size:1.3rem;" class="fa fa-globe"></i></a>
                          @endif
                        </p>  
                    @endif
                </div>
              </div>
            </section>
            <!-- End Contact Subpage -->
          



            </div>
        </div>
        <!-- /Page changer wrapper -->
        <center>
        <a href="https://digivc.in" target="_blank" id="button" >Get your own Digivc</a>
        </center>
        <!-- <div class="copyrights text-center" style="position:relative;">© <span id="copyright_year"></span> All rights reserved. Designed & Developed by <a href="https://digitalconnect.in" id="digi" target="_blank" >Digital Connect</a></div> -->
        <div class="copyrights text-center" style="position:relative;"> Developed by <a href="https://digitalconnect.in" id="digi" target="_blank" >Digital Connect</a></div>


      </div>
      <!-- /Main Content -->

    </div>


 <!-- Add content to the popup -->
 <div id="sms_pop_up" style="width:350px;">
    <div class="container">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <h5 class="text-center">Share Card via SMS</h5>
            <form id="send_sms_form">
              @csrf
              <input type="text" name="name" id="send_sms_name" class="form-control" placeholder="Enter Name"/>
              <input type="text" name="phone_number" id="send_sms_number" class="form-control" placeholder="Enter Phone Number"/>
              <input type="text" name="card_id" value="{{$my_card->id}}" class="hidden"/>
              <center>
                <button type="button" id="send_sms" class="btn btn-sm btn-primary" style="margin-top:8px;padding:0px 10px;">Share</button>
              </center>
            </form>
          </div>  
        </div>
      </div>
    </div>
</div>

    <script type="text/javascript" src="{{asset('sources/template_one/js/pages-switcher.js?v=1.6')}}"></script>
    <script type="text/javascript" src="{{asset('sources/template_one/js/imagesloaded.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/template_one/js/validator.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/template_one/js/jquery.shuffle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/template_one/js/masonry.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/template_one/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/template_one/js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sources/template_one/js/jquery.hoverdir.js')}}"></script>

    <script type="text/javascript" src="{{asset('sources/template_one/js/main.js?v=1.1')}}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- <script type="text/javascript" src="{{asset('sources/assets/js/jquery.nanogallery2.js?v=1.2')}}"></script> -->
    <script type="text/javascript" src="{{asset('/sources/assets/lightbox/js/simple-lightbox.js')}}"></script>

    <script>
        (function() {
          var $gallery = new SimpleLightbox('.gallery a', {});
      })();
    </script>
    

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });
    </script>

<script src="https://cdn.jsdelivr.net/gh/vast-engineering/jquery-popup-overlay@2/jquery.popupoverlay.min.js"></script>
<script src="{{asset('sources/assets/sweetalert2/sweetalert2.all.min.js')}}"></script>

    <script>
        $('#copyright_year').html((new Date()).getFullYear());

        function ucwords(str)
        {
            if (str == null) { // test for null or undefined
                return "";
            }

            return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
        }

      $('#sms_pop_up').popup({
        absolute: true,
        background: true,
        blur: true,
        horizontal: 'center',
      });

      $.fn.popup.defaults.pagecontainer = '#page'

    </script>
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

      $('#send_message_btn').click(()=>{
        $.ajax({
          url:"{{asset('/send_message')}}",
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

              if(data.errors.card_id!=undefined)
              {
                  toastr.error(data.errors.card_id[0]);
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

      $('#send_sms').click(()=>{
        var sms_name = $('#send_sms_name').val();
        var sms_number = $('#send_sms_number').val();

        if(sms_number.length<10 || sms_name.length<1)
        {
          toastr.error('Invalid name or phone number');
        }
        else
        {
          $.ajax({
            url:"{{asset('/share_card')}}",
            method:"POST",
            data:new FormData($('#send_sms_form')[0]),
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

                if(data.errors.phone_number!=undefined)
                {
                    toastr.error(data.errors.phone_number[0]);
                }

                if(data.errors.card_id!=undefined)
                {
                    toastr.error(data.errors.card_id[0]);
                }
              }


              if(data.status=='Success')
              {
                toastr.success(data.response);

                $('#send_sms_form')[0].reset();
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
        }
      });
    </script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


  </body>
</html>
