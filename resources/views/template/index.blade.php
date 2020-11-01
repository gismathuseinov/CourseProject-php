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

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{asset('template/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('template/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('template/images/icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('template/images/icon-114x114.png')}}">

</head>
<body>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav">
        <a class="navbar-brand" href="{{ route('site.index') }}">
            <img src="{{asset('template/images/logo.png')}}" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav">
                <li class="menu-item active"><a title="Home" href="{{route('site.index')}}">Ana Səhifə</a></li>
                <li class="menu-item"><a href="{{ route('site.complaints') }}">Şikayətlər</a></li>
                <li class="menu-item dropdown">
                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true"
                       aria-expanded="false">Əlaqə</a>
                    <ul class="dropdown-menu">
                        <li class="menu-item"><a href="{{route('site.about')}}">Haqqımızda</a></li>
                        <li class="menu-item"><a href="{{ route('site.how.work') }}">Şikayət prosesi</a></li>
                        <li class="menu-item"><a href="{{ route('site.contact') }}">Əlaqə</a></li>
                    </ul>
                </li>
                @auth()

            </ul>
            @guest()
                <ul class="navbar-nav ml-auto account-nav">
                    <li class="menu-item"><a href="{{route('login')}}">Login</a></li>
                    <li class="menu-item"><a href="{{route('register')}}l">Register</a></li>
                </ul>
            @endguest
        </div>
    </nav>
</header>
<!-- Header End -->


<!-- Banner -->
<div class="banner banner-1 banner-1-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content">
                    <h1>Şikayıtvar.com'a</h1>
                    <p> xoş gəlmisiniz</p>
                    <a href="{{ route('write.complaint')}}" class="button">Şikayət yaz</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Search and Filter -->
<div class="searchAndFilter-wrapper">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="searchAndFilter-block">
                    <div class="searchAndFilter">
                        <form action="#" class="search-form" style="display: flex;justify-content: center;">
                            <input type="text" placeholder="axtar">
                            <button class="button primary-bg"><i class="fas fa-search"></i>axtar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search and Filter End -->

<!-- Jobs -->
<div class="section-padding-bottom alice-bg">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs job-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="recent-tab" data-toggle="tab" href="#recent" role="tab"
                           aria-controls="recent" aria-selected="true">son paylasilan</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="recent" role="tabpanel"
                         aria-labelledby="recent-tab">
                        <div class="row">
                            @if(isset($complaints))
                                @foreach($complaints as $key => $complaint)
                                    <div class="col-lg-10" style="margin-left: 8%!important">
                                        <div class="job-list half-grid">
                                            <div class="body">
                                                <div class="content">
                                                    <h4><a>{{$complaint->complaint_title}}</a></h4>
                                                    <span>{{Illuminate\Support\Str::limit($complaint->complaint_body,80)}}</span>
                                                    <div class="info">
                                                        <span class="company"><a><i data-feather="user"></i>{{ $complaint->user->name }}</a></span>
                                                        <span class="office-location"><a><i
                                                                    data-feather="message-square"></i>{{$complaint->comments()->count()}}</a></span>
                                                        <span class="job-type temporary"><a><i
                                                                    data-feather="clock"></i>{{date('D-h:i', strtotime($complaint->created_at))}}</a></span>
                                                    </div>
                                                </div>
                                                <div class="more1">
                                                    <div class="buttons mt-5">
                                                        <a href="{{ route("post.view", ['id' => $complaint->id ]) }}"
                                                           class="button btn btn-lg btn-success">Keçid et</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="pagination-lg text-center" style="width:50%;margin-left: 40%;margin-top: 2vh;">
                        <nav class="navigation pagination">
                            <div class="nav-links">
                                {{ $complaints->links() }}
                            </div>
                        </nav>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- Jobs End -->

<!-- Top post -->
{{--<div class="section-padding-top padding-bottom-90">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                <div class="section-header">--}}
{{--                    <h2>Top post</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col">--}}
{{--                @if(isset($posts))--}}
{{--                    @foreach($posts as $key=>$post)--}}
{{--                        <div class="company-carousel owl-carousel">--}}
{{--                            <div class="company-wrap">--}}
{{--                                <div class="body">--}}
{{--                                    <h4><a>{{$post[$key][$key]}}</a></h4>--}}
{{--                                    <span>User</span>--}}
{{--                                    <a href="" class="button">go to post</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="padding-top-90 padding-bottom-60 fact-bg">
    <div class="container">
        <div class="row fact-items">
            <div class="col-md-6 col-sm-6">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="user"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="{{$userCount}}0"></span></p>
                    <p class="fact-name">User</p>
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="file-text"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="{{$postCount}}0"></span></p>
                    <p class="fact-name">post</p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="section-padding">
    <div class="container">
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-lg-8">
                <div class="call-to-action-box candidate-box">
                    <div class="icon">
                        <img src="{{asset('template/images/register-box/1.png')}}" alt="">
                    </div>
                    <span>Hər hansısa bir firmadan</span>
                    <h3>Şikayətçisiniz?</h3>
                    @auth()
                        @if(\Illuminate\Support\Facades\Auth::id()===1)
                            <a href="{{ route('admin.dashboard') }}">Qeydiyyatdan keçin<i
                                    class="fas fa-arrow-right"></i></a>
                        @endif
                    @else
                        <a href="{{ route('user.dashboard') }}">Qeydiyyatdan keçin<i
                                class="fas fa-arrow-right"></i></a>
                    @endauth
                    @guest()
                        <a href="{{ route('register') }}">Qeydiyyatdan keçin<i
                                class="fas fa-arrow-right"></i></a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer-bg">
    <div class="footer-top border-bottom section-padding-top padding-bottom-40">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-logo">
                        <a href="#">
                            <img src="{{asset('template/images/logo.png')}}"
                                 style="width: 164px!important;height: 50px!important" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-social">
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
    <div class="footer-widget-wrapper padding-bottom-60 padding-top-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="footer-widget widget-about">
                        <h4>About Us</h4>
                        <div class="widget-inner">
                            <p class="description">There are many variations of passages of Lorem Ipsum available, but
                                the majority have suffered alteration in some form, by injected humour.</p>
                            <span class="about-contact"><i data-feather="phone-forwarded"></i>+8 246-345-0698</span>
                            <span class="about-contact"><i data-feather="mail"></i>supportmail@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-sm-6">
                    <div class="footer-widget footer-shortcut-link">
                        <h4>Information</h4>
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget footer-shortcut-link">
                        <h4>Job Seekers</h4>
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#">Create Account</a></li>
                                <li><a href="#">Career Counseling</a></li>
                                <li><a href="#">My Oficiona</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Video Guides</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget footer-shortcut-link">
                        <h4>Employers</h4>
                        <div class="widget-inner">
                            <ul>
                                <li><a href="#">Create Account</a></li>
                                <li><a href="#">Products/Service</a></li>
                                <li><a href="#">Post a Job</a></li>
                                <li><a href="#">FAQ</a></li>
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
<!-- Footer End -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
