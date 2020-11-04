@extends('template.main')
@section('main')
    <!-- How It Work -->
    <div class="alice-bg section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="white-bg others-block">
                        <div class="how-it-work">
                            <div class="row">
                                <div class="col-lg-6 order-lg-2">
                                    <div class="working-process-thumb" data-aos="fade-up">
                                        <img src="{{ asset('template/images/custom/first.png') }}" class="img-fluid"
                                             alt="">
                                        <img src="{{ asset('template/images/custom/second.png') }}" class="img-fluid"
                                             alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-1">
                                    <div class="working-process" data-aos="fade-up" data-aos-duration="1500">
                                        <h3><span>#01.</span>Haqqımzda</h3>
                                        <p>Bu sayt Azərbaycanda müştəri, istehlakçı məmnuniyyəti və şikayətləri əsasında
                                            ölkədə demək olar ki, bütün sahələr üzrə fəaliyyət göstərən şirkət və
                                            markaların reytinqini təyin edə bilmək məqsədilə yaradılmış internet
                                            platformasıdır.</p>
                                    </div>
                                    <div class="working-process" data-aos="fade-up" data-aos-duration="2500">
                                        <h3><span>#02.</span>Bizlər</h3>
                                        <p>
                                            Şikayətlər, şikayətləri həll edən və müştərilərinə dəyər verən markaların
                                            əhəmiyyətini ortaya qoyan və markaları istehlakçı şikayətlərini həll etməyə
                                            təşviq edən şirkətlərə müraciət edən müştərilərin təşəkkür mesajlarını
                                            yayımlayır.

                                            Bu yolla markaların alış prosesində və daha sonra müştəriləri üçün daha
                                            yaxşı bir təcrübə qazanacaqlarına inam yaratmaq üçün fürsət təmin edərkən
                                            istehlakçılara da bu markaları kəşf etmək imkanı verir.
                                        </p>
                                        {{--                      <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over you need to be sure there isn't anything embarrassing.</p>--}}
                                    </div>
                                    <div class="working-process" data-aos="fade-up" data-aos-duration="3500">
                                        <h3><span>#03.</span>Missiyamız nədən ibarətdir?</h3>
                                        <p> İstehlakçıların gündəlik iş və həyatlarında rastlaşdıqları problemlərin həll
                                            olunmasında birgə çıxış yolu tapmaq, şikayətlərin və narazılığın birbaşa
                                            şikayət olunan mənbəyə asan çatmasını təmin etmək, istehlakçı ilə xidmət
                                            göstərən və ya istehsalçı arasında birbaşa körpü olmaq, ölkəmizdə biznes,
                                            istehlak və xidmət sferasının keyfiyyətini artırmağa istiqamətlənmək,
                                            insanların rifah halının, həyat şəraitinin yaxşılaşdırılmasına dəstək
                                            olmaqdır.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- How It Work End -->

    <!-- Call to Action -->
    <div class="call-to-action-bg padding-top-90 padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="call-to-action-2">
                        <div class="call-to-action-content">
                            <h2>Hər hansısa şirkətdən məhsul almağı<br> planlaşdırırsan?</h2>
                            <p style="font-size: 13px;">Şikayətlər bölməsinə keçid et və həmin şirkət haqqında fikirləri öyrən</p>
                        </div>
                        <div class="call-to-action-button">
                            <a href="{{ route('site.complaints') }}" class="button">Şikayətlər</a>
                            <span>və ya</span>
                            <a href="{{ route('write.complaint') }}" class="button">Şikayət Yaz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->
@endsection
