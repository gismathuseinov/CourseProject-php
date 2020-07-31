<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('Project/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('Project/css/search.css') }}">
    <script src="{{asset('Project/js/search.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <title>Şikayətet.az &nbsp;&nbsp;&nbsp; Şikayətinizin ən güvənli ünvanı </title>
</head>
<body>

<header>
    <div class="header" style="background-color:#ecf0f1">
        @auth()
            <a href="{{route('site.index')}}"><img src="{{asset('Project/img/logo2.png')}}" alt=""></a>
            <ul style="display:flex;flex-direction: row;">
                <li><a href="{{route('site.index')}}" class="menu">Ana səhifə</a></li>
                <li><a href="{{route('about')}}" class="menu">Haqqımızda</a></li>
                <li><a href="{{route('contact')}}" class="menu">Əlaqə</a></li>
                <li>
                    <div class="dropdown">
                        <button class="btn-lg btn btn-success dropdown-toggle" type="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-1x"></i>
                            &nbsp;&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu drpdwn" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item btn btn-primary " href={{route('logout')}}>Çıxış</a>
                            @if (\Illuminate\Support\Facades\Auth::id()==1)
                                <a class="dropdown-item btn btn-primary " href={{route('admin.dashboard')}}>Admin
                                    panel</a>
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        @endauth
        @guest()
            <a href="index"><img src="{{asset('Project/img/logo2.png')}}" alt=""></a>
            <ul>
                <li><a href="{{route('site.index')}}" class="menu">Ana səhifə</a></li>
                <li><a href="{{route('about')}}" class="menu">Haqqımızda</a></li>
                <li><a href="{{route('contact')}}" class="menu">Əlaqə</a></li>
                <li><a class="button" href="{{ route('login') }}" rel="nofollow noopener">Giriş</a></li>
                <li><a class="button" href="{{ route('register') }}" rel="nofollow noopener">Qedyiyyat</a></li>
            </ul>
        @endguest
    </div>
</header>

@yield('main')

<!-- Site footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <p class="text-justify">Bu sayt Azərbaycanda müştəri, istehlakçı məmnuniyyəti və şikayətləri əsasında ölkədə demək olar ki, bütün sahələr üzrə fəaliyyət göstərən şirkət və markaların reytinqini təyin edə bilmək məqsədilə yaradılmış internet platformasıdır.</p>
            </div>

            <div class="col-xs-6 col-md-3">

            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Kateqoriyalar</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('complaint') }}">Şikayətlər</a></li>
                    <li><a href="{{ route('about') }}">Haqqımızda</a></li>
                    <li><a href="{{ route('contact') }}">Əlaqə</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by Qismat</p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="https://www.facebook.com/profile.php?id=100009439965495"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="https://www.instagram.com/qismathusein/"><i class="fa fa-instagram"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
