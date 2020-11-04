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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('template/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('template/images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('template/images/icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('template/images/icon-114x114.png')}}">

</head>
<body>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav"
         style="margin-top:-10px;">
        <a class="navbar-brand" href="{{ route('site.index') }}">
            <img src="{{asset('template/images/logo.png')}}" style="width: 261px; height: 81px;margin-top:10px;"
                 class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav">
                <li class="menu-item active"><a title="Home" href="{{route('site.index')}}">Ana Səhifə</a></li>
                <li class="menu-item"><a href="{{route('site.about')}}">Haqqımızda</a></li>
                <li class="menu-item"><a href="{{ route('site.complaints') }}">Şikayətlər</a></li>
                <li class="menu-item"><a href="{{ route('site.contact') }}">Əlaqə</a></li>
                @auth()
                    @if(auth()->id()!==1)
                        <li class="menu-item"><a href="{{route('user.dashboard')}}">İstifadəçi Paneli</a></li>
                    @endif
                    @if(auth()->id()===1)
                            <li class="menu-item dropdown">
                                <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Admin</a>
                                <ul  class="dropdown-menu">
                                    <li class="menu-item"><a href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                                    <li class="menu-item"><a href="{{ route('logout') }}">Çıxış</a></li>
                                </ul>
                            </li>
                    @endif
                @endauth
                @guest()
                    <ul class="navbar-nav ml-auto account-nav">
                        <li class="menu-item"><a href="{{route('login')}}">Giriş</a></li>
                    </ul>
                @endguest
                <li class="menu-item post-job"><a title="Title" href="{{ route('write.complaint') }}"><i class="fas fa-plus"></i>Şikayət Yaz</a></li>
            </ul>
        </div>
    </nav>
</header>
<!-- Header End -->


<!-- Banner -->
<div class="banner banner-1 banner-1-bg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content" data-aos="fade-right" data-aos-duration="3000">

                    <h1 style="font-family: 'Noto Sans TC', sans-serif;">Şikayətvar.com'a</h1>
                    <p style="font-size: 25px;margin-left: 15px;font-family: 'Noto Sans TC', sans-serif;"> xoş
                        gəlmisiniz</p>
                    <a href="{{ route('write.complaint')}}" style="background-color: white!important;"
                       class="button  post-job">Şikayət yaz</a>
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
                    <div class="searchAndFilter" style="display: flex;justify-content: center;">
                            <input type="text" name="search" placeholder="Axtarış Edin ">
                            <button class="button primary-bg search"><i class="fas fa-search"></i>Axtar</button>
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
                           aria-controls="recent" aria-selected="true">Son Şikayətlər</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="recent" role="tabpanel"
                         aria-labelledby="recent-tab">
                        <div class="row searchPanel">
                            @if(isset($complaints))
                                @foreach($complaints as $key => $complaint)
                                    <div class="col-lg-10" style="margin-left: 8%!important;" data-aos="fade-up" data-aos-duration="2000">
                                        <div class="job-list half-grid">
                                            <div class="body">
                                                <div class="content">
                                                    <h4><a>{{$complaint->company_name}}</a></h4>
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
                                <br><br>
                                <button class="btn btn-success"
                                        data-bs-hover-animate="pulse"
                                        style="width: 150px!important;height: 60px;font-size:15px;"><a style="color:white" href="{{ route('site.complaints') }}">Bütün şikayətlər</a>
                                </button>
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
<div class="section-padding-top padding-bottom-90">
    <div class="container-fluid">
        <div class="row" style="margin-top: -8%!important;">
            <div class="col">
                <div class="section-header">
                    <h2>Top post</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-12">
                    @if(isset($result))
                        @foreach($result as $key=>$topPost)
                            <div class="company-wrap col-md-3" data-aos="zoom-in-up" data-aos-duration="1500">
                                <div class="body">
                                    <h4><a>{{{ Illuminate\Support\Str::limit($topPost->company_name,20) }}}</a>
                                    </h4>
                                    <span>{{$topPost->user->name}}</span>
                                    <a href="{{ route("post.view", ['id' => $topPost->id]) }}" class="button"
                                       style="border:2px solid grey">Keçid et</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top End -->

<div class="padding-top-90 padding-bottom-60 fact-bg">
    <div class="container">
        <div class="row fact-items">
            <div class="col-md-4 col-sm-3">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="user" style="width: 35px!important;height: 35px!important;"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="{{$userCount}}2"></span>+</p>
                    <p class="fact-name" style="font-size: 25px;">İstifadəçilər</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-3">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="eye" style="width: 35px!important;height: 35px!important;"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="758"></span>+</p>
                    <p class="fact-name" style="font-size: 25px;">Son 30 gündə ziyarətçi</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-3">
                <div class="fact">
                    <div class="fact-icon">
                        <i data-feather="file-text" style="width: 35px!important;height: 35px!important;"></i>
                    </div>
                    <p class="fact-number"><span class="count" data-form="0" data-to="{{$postCount}}1"></span>+</p>
                    <p class="fact-name" style="font-size: 25px;">Şikayətlər</p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="padding-top-90 padding-bottom-60" style="background-color: whitesmoke">
    <div class="container">
        <h4 style="display: flex;justify-content: center;padding-bottom: 86px!important;">Şikayət Prosesi necə baş
            verir?</h4>
        <div class="row fact-items">
            <div class="col-md-3 col-sm-3" data-aos="fade-right" data-aos-duration="1000">
                <div class="fact">
                    <div class="fact-icon">
                        <img style="width: 240px;height: 240px" src="{{asset('template/images/custom/how-work-1.svg')}}"
                             alt="">
                        <span style="font-size: 20px;color: black">Yeni Şikayət</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3" data-aos="fade-up" data-aos-duration="1500">
                <div class="fact">
                    <div class="fact-icon">
                        <img src="{{asset('template/images/custom/how-work-2.svg')}}" alt="">
                        <span style="font-size: 20px;color: black">Şikayətin yoxlanılması</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3" data-aos="fade-up" data-aos-duration="2000">
                <div class="fact">
                    <div class="fact-icon">
                        <img src="{{asset('template/images/custom/how-work-3.svg')}}" alt="">
                        <span style="font-size: 20px;color: black">Mətnə baxış</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3" data-aos="fade-left" data-aos-duration="2500">
                <div class="fact">
                    <div class="fact-icon">
                        <img src="{{asset('template/images/custom/how-work-4.svg')}}" alt="">
                        <span style="font-size: 20px;color: black">Şikayətin paylaşılması</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-padding" style="background-color: whitesmoke;margin-top: -40px;">
    <div class="container">
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-lg-8">
                <div class="call-to-action-box candidate-box shadow-lg" data-aos="zoom-in" data-aos-duration="2000">
                    <div class="icon">
                        <img src="{{asset('template/images/register-box/1.png')}}" alt="">
                    </div>
                    <span>Hər hansısa bir firmadan</span>
                    <h3>Şikayətçisiniz?</h3>
                    @auth()
                        @if(\Illuminate\Support\Facades\Auth::id()===1)
                            <a href="{{ route('admin.dashboard') }}">Qeydiyyatdan keçin<i
                                    @endif
                                    class="fas fa-arrow-right"></i></a>
                            @if(\Illuminate\Support\Facades\Auth::id()!==1)
                                <a href="{{ route('user.dashboard') }}">Qeydiyyatdan keçin<i
                                        class="fas fa-arrow-right"></i></a>
                            @endif
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
                                <li><a href="{{ route('site.about') }}">Haqqımızda</a></li>
                                <li><a href="{{ route('site.contact') }}">Əlaqə</a></li>
                                <li><a href="{{ route('login') }}">Daxil ol/Qeydiyyat</a></li>
                                <li><a href="{{ route('site.complaints') }}">Şikayətlər</a></li>
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
                                <p class="copyright-text">Copyright <a href="{{ route('site.index') }}">Şikayetvar.com</a> 2020, All right reserved
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
@if(isset($complaint))
<script>
    $('.search').click(function () {
        let data = $('input[name=search]').val();
        $.ajax({
            type: "POST",
            url: "{{ route('search') }}",
            data: {
                'data': data,
                "_token": "{{ csrf_token() }}",
            },
            success: function (response) {
                if(response.message==='success') {
                    $('input[name=search]').val(' ');
                    $('.searchPanel').html('');
                    $('.pagination').remove()
                    response.results.forEach(function (result) {

                        function time(){
                            let time =new Date(Date.parse(result.created_at));
                            let month=[];
                            month[0]="Yanvar";
                            month[1]="Fevral";
                            month[2]="Mart";
                            month[3]="Aprel";
                            month[4]="May";
                            month[5]="Iyun";
                            month[6]="Iyul";
                            month[7]="Avqust";
                            month[8]="Sentyabr";
                            month[9]="Oktyabr";
                            month[10]="Noyabr";
                            month[11]="Dekabr";
                            var hours = time.getHours();
                            var minutes = time.getMinutes();
                            minutes = minutes < 10 ? '0'+minutes : minutes;

                            return time.getDate()+" "+month[time.getMonth()]+" "+hours+":"+minutes;
                        }


                        $('.searchPanel').append(
                            `
                                                                <div class="col-lg-10" style="margin-left: 8%!important;">
                                        <div class="job-list half-grid">
                                            <div class="body">
                                                <div class="content">
                                                    <h4><a>${result.complaint_title}</a></h4>
                                                    <span>${result.complaint_body.substring(0,170)}</span>
                                                    <div class="info">
                                                        <span class="company"><a><i data-feather="user"></i>${result.user.name}</a></span>
                                                        <span class="job-type temporary"><a><i
                                                                    data-feather="clock"></i>{{time()}}</a></span>
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


                            `
                        )
                    })
                }
            }
        })
    });
</script>
@endif

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

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
