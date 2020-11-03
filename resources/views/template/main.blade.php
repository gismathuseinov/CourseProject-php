<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Oficiona</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template/assets/css/bootstrap.min.css')}}">

    <!-- External Css -->
    <link rel="stylesheet" href="{{asset('template/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/css/themify-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/assets/css/et-line.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/assets/css/bootstrap-select.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/assets/css/plyr.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/assets/css/flag.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/assets/css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/assets/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('template/assets/css/jquery.nstSlider.min.css')}}"/>

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/comment.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/dashboard/css/dashboard.css')}}">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('template/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('template/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('template/images/icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('template/images/icon-114x114.png')}}">
    <script src="{{asset('template/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('template/assets/js/respond.min.js')}}"></script>

</head>
<body>
<header class="header-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-top">
                    <div class="logo-area">
                        <a href="{{ route('site.index') }}"><img src="{{asset('template/images/logo.png')}}" alt=""></a>
                    </div>
                    <div class="header-top-toggler">
                        <div class="header-top-toggler-button"></div>
                    </div>
                    @auth()
                    <div class="top-nav">
                        <div class="dropdown header-top-account">
                            <a href="" style="font-size: 20px;" class="account-button">Hesab</a>
                            <div class="account-card">
                                <div class="header-top-account-info">
                                    <div class="account-body">
                                        <h5><a>{{ auth()->user()->name }}</a></h5>
                                        <span class="mail">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                                <ul class="account-item-list">
                                    <li><a href="{{ route('user.dashboard') }}"><span class="ti-user"></span>Hesab</a>
                                    </li>
                                    @if(auth()->id()===1)
                                        <li><a href="{{ route('admin.dashboard') }}"><span class="ti-settings"></span>Admin
                                                Panel</a></li>
                                    @endif
                                    <li><a href="{{ route('logout') }}"><span class="ti-power-off"></span>Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
                <nav class="navbar navbar-expand-lg cp-nav-2">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="menu-item active"><a title="Home" href="{{ route('site.index') }}">Ana Səhifə</a>
                            </li>
                            <li class="menu-item active"><a title="Home" href="{{ route('site.complaints') }}">
                                    Şikayətlər</a></li>
                            <li class="menu-item"><a href="{{route('site.about')}}">Haqqımızda</a></li>
                            <li class="menu-item"><a href="{{ route('site.contact') }}">Əlaqə</a></li>
{{--                            </li>--}}
                            <li class="menu-item post-job"><a href="{{ route('write.complaint') }}"><i
                                        class="fas fa-plus"></i>Şikayət Yaz</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


@yield('main')

<footer class="footer-bg">
    <div class="footer-widget-wrapper padding-top-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="footer-widget widget-about">
                        <h4>Haqqımızda</h4>
                        <div class="widget-inner">
                            <p class="description">Bu sayt Azərbaycanda müştəri, istehlakçı məmnuniyyəti və şikayətləri
                                əsasında ölkədə demək olar ki, bütün sahələr üzrə fəaliyyət göstərən şirkət və
                                markaların reytinqini təyin edə bilmək məqsədilə yaradılmış internet platformasıdır.</p>
                            <span class="about-contact"><i data-feather="phone-forwarded"></i>+994 50 500 55 50</span>
                            <span class="about-contact"><i data-feather="mail"></i>support@sikayetvar.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-sm-6">
                    <div class="footer-widget footer-shortcut-link">
                        <h4>İnformasiya</h4>
                        <div class="widget-inner">
                            <ul>
                                <li><a style="font-size: 15px" href="{{ route('site.about') }}">Haqqımızda</a></li>
                                <li><a style="font-size: 15px" href="{{ route('site.contact') }}">Əlaqə</a></li>
                                <li><a style="font-size: 15px" href="{{ route('login') }}">Daxil ol/Qeydiyyat</a></li>
                                <li><a style="font-size: 15px" href="{{ route('site.complaints') }}">Şikayətlər</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget footer-shortcut-link">
                        <h4>Bizi İzləyin</h4>
                        <div class="widget-inner">
                            <ul class="social-icons">
                                <li><a href="#"><i data-feather="facebook"></i></a></li>
                                <li><a href="#"><i data-feather="twitter"></i></a></li>
                                <li><a href="#"><i data-feather="linkedin"></i></a></li>
                                <li><a href="#"><i data-feather="instagram"></i></a></li>
                                <li><a href="#"><i data-feather="youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-bottom border-top">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 order-lg-2">

                            </div>
                            <div class="col-xl-4 col-lg-4 order-lg-1">
                                <p class="copyright-text">Copyright <a href="#">Oficiona</a> 2020, All right reserved
                                </p>
                            </div>
                            <div class="col-xl-4 col-lg-3 order-lg-3">
                                <div class="back-to-top">
                                    <a href="#">Back to top<i class="fas fa-angle-up"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('template/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('template/assets/js/popper.min.js')}}"></script>
<script src="{{asset('template/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/assets/js/feather.min.js')}}"></script>
<script src="{{asset('template/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('template/assets/js/jquery.nstSlider.min.js')}}"></script>
<script src="{{asset('template/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('template/assets/js/visible.js')}}"></script>
<script src="{{asset('template/assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset('template/assets/js/chart.js')}}"></script>
<script src="{{asset('template/assets/js/plyr.js')}}"></script>
<script src="{{asset('template/assets/js/tinymce.min.js')}}"></script>
<script src="{{asset('template/assets/js/slick.min.js')}}"></script>
<script src="{{asset('template/assets/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{asset('template/js/custom.js')}}"></script>
</body>
</html>
