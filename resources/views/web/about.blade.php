@extends('web.main')
@section('main')
    <style>
        .common_company_about h1 {
            font-size: 35px !important;
        }

        .company_about, .company_terif, .company_miss {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            align-content: center;
            margin: 15px;
            box-shadow: 0 15px 15px rgba(0, 0, 0, 0.3);
            background-color: #ecf0f1;
            padding: 15px;
        }

        .company_icon {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            align-content: space-between;
        }

        .company_icon i {
            margin: 10px;
            padding: 15px;
            font-size: 40px;
        }

        .company_icon a {
            text-decoration: none;
        }

    </style>
    <div class="container common_company_about">
        <div class="company_about">
            <h1>Haqqımzda</h1>
        </div>
        <div class="company_terif">
            <h1>Bizlər</h1>

        </div>
        <div class="company_miss">
            <h1></h1><br>
            <span>
        </span>
        </div>
        {{--        <div class="company_icon">--}}
        {{--            <div class="icon"><a href="#"><i style="color: #3b5998" class="fa fa-facebook"></i></a></div>--}}
        {{--            <div class="icon"><a href="#"><i style="color:#d6249f" class="fa fa-instagram"></i></a></div>--}}
        {{--            <div class="icon"><a href="#"><i style="color:#075e54;" class="fa fa-whatsapp"></i></a></div>--}}
        {{--            <div class="icon"><a href="#"><i style="color:#c4302b;" class="fa fa-youtube"></i></a></div>--}}
        {{--        </div>--}}

    </div>

@endsection
