
@extends('proyekt.main')
@section('main')

    <div class="container ifade col-12">
        <div class="col-6 search">
            <div class="text">
                <h1> Şikayətinizin tək güvənli ünvanı <br> SizinŞikayət</h1>

            </div>
            <div class="search-div">
                <input type="text" name="searchinput" class="input" placeholder="Axtaris"/>
                <a class="button">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            @guest
                <div class="Btn">
                    <button class="btn btn-success writecomment"><a style="color: white;text-decoration: none;" href="{{ route('login') }}">Şikayət et</a></button>
                </div>
            @endguest
            @auth()
                <div class="Btn">
                    <button class="btn btn-success writecomment"><a style="color: white;text-decoration: none;" href="{{ route('write.complaint') }}">Şikayət et</a></button>
                </div>
            @endauth
        </div>
        <br>
        <div class="col-6 yazi">
            <div style="position: relative;">
                <img width="100%" height="300px" src="{{ asset('Project/img/bg.png') }}" alt=""
                     style="position:absolute; ">
            </div>
        </div>
    </div>
    <div class="sikayetsay">
        <div class="user usersay">
            <i class="fa fa-user fa-5x"></i>
            <div class="span"> Ümumi istifadəçi</div>
            <br>
            <div class="say">{{$userCount}}</div>
        </div>
        <div class="user comsay">
            <i style="color:#0275d8;" class="fa fa-comments-o fa-5x"></i>
            <div class="span">Ümumi şikayət</div>
            <br>
            <div class="say">{{$issueCount}}</div>
        </div>
    </div>

    <div class="container sikayet">
        @foreach($complaints as $key  => $complaint)
            <div class="col-10 complaint">
                <div class="basliq">
                    <h2>{{$complaint->company_name}}</h2>
                </div>
                <div class="about">
                    <h5><i class="fa fa-user fa-1x"></i> {{$complaint->user->name}}</h5>
                    <span><i class="fa fa-clock-o"></i> {{date('D-h:i', strtotime($complaint->created_at))}}</span>
                </div>
                <hr>
                <div class="commenttitle">
                    <h5><a href="{{ route("post.view", ['id' => $complaint->id ]) }}">{{$complaint->complaint_title}}</a></h5>
                </div>
                <div class="yazi">
                    <span> {{Illuminate\Support\Str::limit($complaint->complaint_body,350)}}</span>
                </div>
                <hr>
            </div>
            <br>
        @endforeach
    </div>
    <div class="pagination" style="margin-left: 40%; margin-top: 10%;">
        {{$complaints->links()}}
    </div>
    <br><br><br>
    <div class="container-fluid common">
        <div class="section">
            <div class="image"><img src="{{ asset('Project/img/newcomp.png') }}" alt=""></div>
            <div class="about"><h3> Yeni Şikayət</h3></div>
        </div>
        <div class="section">
            <div class="image"><img src="{{ asset('Project/img/compsee.png') }}" alt=""></div>
            <div class="about"><h3>Şikayətə baxılma</h3></div>
        </div>
        <div class="section">
            <div class="image"><img src="{{ asset('Project/img/compedit.png') }}" alt=""></div>
            <div class="about"><h3>Şikayətin yoxlanması</h3></div>
        </div>
        <div class="section">
            <div class="image"><img src="{{ asset('Project/img/compshow.png') }}" alt=""></div>
            <div class="about"><h3>Şikayətin paylaşılması</h3></div>
        </div>
    </div>

    <div class="container top box">
        <div class="col-md-6">
            <h1>Bütün şikayətlər</h1>
            <span>Hər hansı firma ilə əlaqə qurmamışdan qabaq baxın</span>
            <br>
            <button><a href="{{ route('complaint') }}">Şikayətlər</a></button>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('Project/img/img.png') }}" alt="burada sizin sekliniz ola bilmez">
        </div>
    </div>
    <br><br>
    <script>
        $('.search-div').on('click', '.button', function () {
            var data = $('input[name=searchinput]').val();
            $.ajax({
                type: "POST",
                url: "{{ route('search') }}",
                data: {
                    'data': data,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                   if(response.message=='success') {

                       $('.sikayet').html('');
                       response.results.forEach(function (result) {

                           function time(){
                               let time =new Date(Date.parse(result.created_at));
                               var month=new Array();
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

                           $('.sikayet').append(`
                            <div class="col-10 complaint">
                                <div class="basliq">
                                    <h2>${result.company_name}</h2>
                                </div>
                                <div class="about">
                                    <h5><i class="fa fa-user fa-1x"></i>${result.user.name}</h5>
                                    <span><i class="fa fa-clock-o"></i> ${time()}</span>
                                </div>
                                <hr>
                                <div class="commenttitle">
                                        <h5><a href="{{ route("post.view", ['id' => $complaint->id ]) }}">${result.complaint_title}</a></h5>
                                </div>
                                <div class="yazi">
                                    <span>${result.complaint_body}</span>
                                </div>
                                <hr>
                            </div>`)
                       });
                    }
                }
            })
        });
    </script>
@endsection



