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
            <span>Bu sayt Azərbaycanda müştəri, istehlakçı məmnuniyyəti və şikayətləri əsasında ölkədə demək olar ki, bütün sahələr üzrə fəaliyyət göstərən şirkət və markaların reytinqini təyin edə bilmək məqsədilə yaradılmış internet platformasıdır.</span>
        </div>
        <div class="company_terif">
            <h1>Bizlər</h1>
            <span>
            Şikayətlər, şikayətləri həll edən və müştərilərinə dəyər verən markaların əhəmiyyətini ortaya qoyan və markaları istehlakçı şikayətlərini həll etməyə təşviq edən şirkətlərə müraciət edən müştərilərin təşəkkür mesajlarını yayımlayır.

Bu yolla markaların alış prosesində və daha sonra müştəriləri üçün daha yaxşı bir təcrübə qazanacaqlarına inam yaratmaq üçün fürsət təmin edərkən istehlakçılara da bu markaları kəşf etmək imkanı verir.
        </span>
        </div>
        <div class="company_miss">
            <h1>Missiyamız nədən ibarətdir?</h1><br>
            <span>
            İstehlakçıların gündəlik iş və həyatlarında rastlaşdıqları problemlərin həll olunmasında birgə çıxış yolu tapmaq, şikayətlərin və narazılığın birbaşa şikayət olunan mənbəyə asan çatmasını təmin etmək, istehlakçı ilə xidmət göstərən və ya istehsalçı arasında birbaşa körpü olmaq, ölkəmizdə biznes, istehlak və xidmət sferasının keyfiyyətini artırmağa istiqamətlənmək, insanların rifah halının, həyat şəraitinin yaxşılaşdırılmasına dəstək olmaqdır.
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
