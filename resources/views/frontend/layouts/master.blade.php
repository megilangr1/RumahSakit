<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Metronic Frontend (with Top Bar)</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-">
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">

  <link href="{{ asset('') }}assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="{{ asset('') }}assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">

  <link href="{{ asset('') }}assets/global/css/components.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
  <link href="{{ asset('') }}assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="{{ asset('') }}assets/frontend/layout/css/custom.css" rel="stylesheet">
</head>

<body class="corporate">
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>0226-229207</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>rumahsakit@bhayangkara.com</span></li>
                    </ul>
                </div> 
            </div>
        </div>        
    </div>
    <div class="header">
      <div class="container">
        <a class="site-logo" href="index.html"><img src="{{ asset('') }}assets/frontend/layout/img/logos/logo-corp-red.png" alt="Metronic FrontEnd"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li><a href="{{ url('/') }}" target="_blank">Halaman Utama</a></li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Pelayanan  
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="#">Poli Gami !</a></li>
                
                <li class="dropdown-submenu">
                  <a href="index.html">Multi level <i class="fa fa-angle-right"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="index.html">Second Level Link</a></li>
                    <li><a href="index.html">Second Level Link</a></li>
                    <li class="dropdown-submenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Second Level Link 
                        <i class="fa fa-angle-right"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="index.html">Third Level Link</a></li>
                        <li><a href="index.html">Third Level Link</a></li>
                        <li><a href="index.html">Third Level Link</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li> 
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Blog  
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="blog.html">Blog Page</a></li>
                <li><a href="blog-item.html">Blog Item</a></li>
              </ul>
            </li>

            <li><a href="#">Masuk</a></li>
            <li><a href="#">Daftar</a></li>

            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="page-slider margin-bottom-40">
      <div class="fullwidthbanner-container revolution-slider">
        <div class="fullwidthabnner">
          <ul id="revolutionul">
            <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="{{ asset('') }}assets/frontend/pages/img/revolutionslider/thumbs/thumb2.jpg">
              <img src="{{ asset('') }}images/rs01.jpg" alt="">
            </li>    

            <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="{{ asset('') }}assets/frontend/pages/img/revolutionslider/thumbs/thumb2.jpg">
              <img src="{{ asset('') }}images/rs02.jpg" alt="">
            </li>  
          </ul>
          <div class="tp-bannertimer tp-bottom"></div>
          </div>
        </div>
    </div>

    <div class="main">
      <div class="container">
        <div class="row service-box margin-bottom-40">
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-location-arrow blue"></i></em>
              <span>Visi : </span>
            </div>
            <p>Mewujudkan impian orang sakit menjadi sehat serta tidak sakit-sakitan lagi. </p>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-check red"></i></em>
              <span>Misi : </span>
            </div>
            <p style="margin-bottom: 4px;">1. Menyediakan fasilitas terbaik untuk orang sakit.</p>
            <p style="margin-bottom: 4px;">2. Memberikan pelayanan yang baik dan bermutu serta berorientasi pada keselamatan pasien.</p>
            <p style="margin-bottom: 4px;">3. Mengembangkan SDM yg profesional serta sarana & prasarana yang berkualitas.</p>

          </div>
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <em><i class="fa fa-compress green"></i></em>
              <span>Rumah Sakit Bhayangkara</span>
            </div>
            <p>Disini kami menyembuhkan orang sakit, supaya tidak sakit-sakitan lagi. Kami akan menyediakan fasilitas kesehatan yang sangat terbaru dan memperioritaskan kesehatan pasien. Berobatlah di Rumah Sakit Bhayangkara</p>
          </div>
        </div>
      </div>
    </div>

    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Tentang Kami</h2>
            <p>Rumah Sakit Bhayangkara adalah Rumah Sakit.</p>
          </div>

          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
              Jl. Bhayangkara / Jl. Aminta Asmali Trip 59 - A 166 <br>
              43112 Sukabumi <br>
              West Java - Indonesia <br> 
            </address> 
          </div>

        </div>
      </div>
    </div>

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 padding-top-10">
            2020 © Rumah Sakit Bhayangkara <a href="javascript:;">Privacy Policy</a> | <a href="javascript:;">Terms of Service</a>
          </div>
          <div class="col-md-6 col-sm-6">
            
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('') }}assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="{{ asset('') }}assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>

    <script src="{{ asset('') }}assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="{{ asset('') }}assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <script src="{{ asset('') }}assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
    <script src="{{ asset('') }}assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
    <script src="{{ asset('') }}assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>

    <script src="{{ asset('') }}assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            RevosliderInit.initRevoSlider();
            Layout.initTwitter();
        });
    </script>
</body>
</html>