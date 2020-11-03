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
<header class="header-2 access-page-nav">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-top">
                    <div class="logo-area">
                        <a href="{{ route('site.index') }}"><img src="{{ asset('template/images/logo.png') }}" alt=""></a>
                    </div>
                    <div class="top-nav">
                        <a href="{{ route('login') }}" class="account-page-link">Daxil Ol</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="padding-top-90 padding-bottom-90 access-page-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="access-form">
                    <div class="form-header">
                        <h5><i data-feather="edit"></i>Register Account</h5>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <input type="text" placeholder="Ad" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email ünvanı" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Şifrə" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Təkrar Şifrə" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button class="button primary-bg btn-block" style="font-size: 15px;">Daxil ol</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
