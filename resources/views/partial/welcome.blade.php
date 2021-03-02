
<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/allfood/menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Feb 2021 14:40:12 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Obiami restauration | @yield('title') </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="site.html">
<link rel="shortcut icon" type="image/x-icon" href="/public/frontend/img/logo/obiami.png">

<link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/slicknav.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/flaticon.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/gijgo.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/animate.min.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/magnific-popup.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/fontawesome-all.min.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/themify-icons.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/slick.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/nice-select.css">
<link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
</head>
<body>

<div id="preloader-active">
<div class="preloader d-flex align-items-center justify-content-center">
<div class="preloader-inner position-relative">
<div class="preloader-circle"></div>
<div class="preloader-img pere-text">
<img src="{{asset('frontend/img/logo/obiami.png')}}" alt="">
</div>
</div>
</div>
</div>

<header>

<div class="header-area">
<div class="main-header  header-sticky">
<div class="container-fluid">
<div class="row align-items-center">

<div class="col-xl-2 col-lg-2 col-md-1">
<div class="logo">
<a href="{{route('welcome')}}"><img src="/public/frontend/img/logo/obiami.png" alt="" width="60%;" height="60%;"></a>
</div>
</div>
<div class="col-xl-10 col-lg-10 col-md-10">
<div class="menu-main d-flex align-items-center justify-content-end">

<div class="main-menu f-right d-none d-lg-block">
<nav>
<ul id="navigation">
<li><a href="#">Accueil</a></li>
{{-- <li><a href="#">Nos Menu</a></li> --}}
<li><a href="#">Nos Menu</a>
<ul class="submenu">
<li><a href="{{route('menu.special')}}">Special</a></li>
<li><a href="{{route('menu.lunch')}}">Lunch</a></li>
<li><a href="{{route('menu.brakefast')}}">Brakefirst</a></li>
<li><a href="{{route('menu.dinner')}}">Dinner</a></li>
</ul>
</li>
<li><a href="#">Nos Contact</a></li>
<li><a href="#">A propos</a></li>
</ul>
</nav>
</div>
<div class="header-right-btn f-right d-none d-lg-block ml-20">
<a href="#" class="border-btn header-btn">Commander un plat</a>
@if ( isset($count) && $count>0)
<a href="#" class="border-btn header-btn">Vos reservations</a>
@endif

</div>
</div>
</div>

<div class="col-12">
<div class="mobile_menu d-block d-lg-none"></div>
</div>
</div>
</div>
</div>
</div>

</header>
<main>

@yield('content')

</main>
<footer>

<div class="footer-area section-bg" data-background="{{asset('frontend')}}/img/gallery/section_bg02.png">
<div class="container">
<div class="footer-top footer-padding">
<div class="row d-flex justify-content-between">
<div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
<div class="single-footer-caption mb-50">

<div class="footer-logo">
<a href="#"><img src="{{asset('frontend')}}/img/logo/Obiami2.png" alt="" width="60%;" height="60%;"></a>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-5 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Navigation</h4>
<ul>
<li><a href="#">Accueil</a></li>
<li><a href="#">A propos</a></li>
<li><a href="#">Nos Menu</a></li>
<li><a href="#">Nos Contacts</a></li>
<li><a href="#">Commander un plat</a></li>
</ul>
</div>
</div>
</div>
<div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Nos Contacts</h4>
<ul>
<li><img src="{{asset('frontend')}}/img/logo/home.png" width="8%;" height="8%;"  style="filter: invert(34%) sepia(33%) saturate(5416%) hue-rotate(8deg) brightness(109%) contrast(103%);" width="8%;" height="8%;"> <a href="#"> France, Paris</a></li>
<li><img src="{{asset('frontend')}}/img/logo/phone.png" width="8%;" height="8%;" style="filter: invert(34%) sepia(33%) saturate(5416%) hue-rotate(8deg) brightness(109%) contrast(103%);" width="8%;" height="8%;"> <a href="#"> +33 6703 2391 09</a></li>
<li><img src="{{asset('frontend')}}/img/logo/message.png" width="8%;" height="8%;" style="filter: invert(34%) sepia(33%) saturate(5416%) hue-rotate(8deg) brightness(109%) contrast(103%); text-transform: lowercase !important;" width="8%;" height="8%;"> <a href="#"> retau-obiami@gmail.com</a></li>
<li><img src="{{asset('frontend')}}/img/logo/placeholder.png" width="8%;" height="8%;" style="filter: invert(34%) sepia(33%) saturate(5416%) hue-rotate(8deg) brightness(109%) contrast(103%);" width="8%;" height="8%;"> <a href="#">TL9:34:09</a></li>
</ul>
</div>
</div>
</div>

<div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Quelques plats favoris</h4>
</div>
<div class="instagram-gellay">
<ul class="insta-feed">
<li><a href="#"><img src="{{asset('frontend')}}/img/gallery/instagram1.png" alt=""></a></li>
<li><a href="#"><img src="{{asset('frontend')}}/img/gallery/instagram2.png" alt=""></a></li>
<li><a href="#"><img src="{{asset('frontend')}}/img/gallery/instagram3.png" alt=""></a></li>
<li><a href="#"><img src="{{asset('frontend')}}/img/gallery/instagram4.png" alt=""></a></li>
<li><a href="#"><img src="{{asset('frontend')}}/img/gallery/instagram5.png" alt=""></a></li>
<li><a href="#"><img src="{{asset('frontend')}}/img/gallery/instagram6.png" alt=""></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="footer-bottom">
<div class="row d-flex justify-content-between align-items-center">
<div class="col-xl-9 col-lg-8">
<div class="footer-copy-right">
<p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="#">MobenSoft</a> | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
</p>
</div>
</div>
<div class="col-xl-3 col-lg-4">

<div class="footer-social f-right d-flex">
<h5 style="color: white;">Suivez-nous - </h5>
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fas fa-globe"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
</div>
</div>
</div>
</div>
</div>
</div>

</footer>

<div id="back-top">
<a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<script src="{{asset('frontend')}}/js/vendor/modernizr-3.5.0.min.js"></script>

<script src="{{asset('frontend')}}/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{asset('frontend')}}/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>

<script src="{{asset('frontend')}}/js/jquery.slicknav.min.js"></script>

<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/slick.min.js"></script>

<script src="{{asset('frontend')}}/js/wow.min.js"></script>
<script src="{{asset('frontend')}}/js/animated.headline.js"></script>
<script src="{{asset('frontend')}}/js/jquery.magnific-popup.js"></script>

<script src="{{asset('frontend')}}/js/gijgo.min.js"></script>

<script src="{{asset('frontend')}}/js/jquery.nice-select.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.sticky.js"></script>

<script src="{{asset('frontend')}}/js/contact.js"></script>
<script src="{{asset('frontend')}}/js/jquery.form.js"></script>
<script src="{{asset('frontend')}}/js/jquery.validate.min.js"></script>
<script src="{{asset('frontend')}}/js/mail-script.js"></script>
<script src="{{asset('frontend')}}/js/jquery.ajaxchimp.min.js"></script>

<script src="{{asset('frontend')}}/js/plugins.js"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
