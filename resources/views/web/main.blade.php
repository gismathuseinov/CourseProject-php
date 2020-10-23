<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>local</title>
    <link rel="stylesheet" href="{{asset('web/assets/bootstrap/css/bootstrap.min.css')}}">
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=AdaminaA">--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">--}}
    <link rel="stylesheet" href="{{asset('web/assets/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('webassets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('webassets/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('webassets/fonts/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('webassets/fonts/material-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/dh-header-non-rectangular.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/Elegant-Registration-Form.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/Footer-Dark.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('web/assets/css/input.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/Login-Form-Dark.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/Projects-Horizontal.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/Search-Input-Responsive-with-Icon.css')}}">
    <link rel="stylesheet" href="{{asset('webassets/css/Search-Input-responsive.css')}}">
    <link rel="stylesheet" href="{{asset('web/assets/css/textarea.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

</head>
<body style="background-color: #e5e5e5!important;height: 100vh!important;">
<div style="width: 100%;background: #e5e5e5;height: 100vh!important;">
    <nav class="navbar navbar-light navbar-expand-md navigation-clean navbar-inverse navbar-fixed-top fixed">
        <div class="container">
            <div class="collapse navbar-collapse" id="navcol-1"><img src="{{asset('web/assets/img/logo.png')}}"
                                                                     style="height: 100px;margin-top: 15px;">
                <ul class="nav navbar-nav ml-auto" style="margin-top:13px;">
                    <li class="nav-item"><a class="nav-link text-capitalize text-warning" data-bs-hover-animate="pulse"
                                            uk-scroll="offset:50" href="{{ route('site.index') }}"
                                            style="color: green!important;text-align: center;">ANA SƏHİFƏ</a></li>
                    <li class="nav-item"><a class="nav-link text-capitalize text-warning" data-bs-hover-animate="pulse"
                                            uk-scroll="offset:100" href="{{ route('about') }}"
                                            style="color: green!important;text-align: center;">HAQQIMIZDA</a></li>
                    <li class="nav-item"><a class="nav-link text-capitalize text-warning" data-bs-hover-animate="pulse"
                                            uk-scroll="offset:100" href="{{ route('contact') }}"
                                            style="color: green!important;text-align: center;">ƏLAQƏ</a></li>
                    <li class="nav-item"><a class="nav-link text-capitalize text-warning" data-bs-hover-animate="pulse"
                                            uk-scroll="offset:100" href="{{ route('write.complaint') }}"
                                            style="color: green!important;text-align: center;">ŞİKAYƏT YAZ</a></li>
                    @guest()
                        <li class="nav-item">
                            <button class="btn btn-dark" data-bs-hover-animate="pulse" type="button"
                                    style="background: #064c15;">
                                <a style="color: white" href="{{ route('login') }}">Login</a></button>
                        </li>
                    @endguest
                    @auth()
                        <li data-bs-hover-animate="pulse">
                            <div class="dropdown">
                                <button class="btn-lg btn btn-success dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user fa-1x"></i>
                                    &nbsp;&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu drpdwn" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item btn btn-primary "
                                       href={{route('user.posts')}}>Şikayətlərim</a>
{{--                                    <a class="dropdown-item btn btn-primary " href={{route('user.profile')}}>Profil</a>--}}
                                    <a class="dropdown-item btn btn-primary " href={{route('logout')}}>Çıxış</a>
                                    @if (\Illuminate\Support\Facades\Auth::id()==1)
                                        <a class="dropdown-item btn btn-primary " target="_blank" href={{route('admin.dashboard')}}>Admin
                                            panel</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('main')

    <script src="{{asset('web/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('web/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('web/assets/js/bs-init.js')}}"></script>
</body>

</html>
