
@extends('proyekt.main')
@section('main')
{{--    <br><br><br>--}}
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
            <div class="Btn">
                <button class="btn btn-success writecomment">Şikayət et</button>
            </div>
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
            <div class="say">{{$users}}</div>
        </div>
        <div class="user comsay">
            <i style="color:#0275d8;" class="fa fa-comments-o fa-5x"></i>
            <div class="span">Ümumi şikayət</div>
            <br>
            <div class="say">{{$sikayet}}</div>
        </div>
    </div>

    <div class="container sikayet">
        @foreach($comments as $key  => $comment)
            <div class="col-10 complaint">
                <div class="basliq">
                    <h2>{{$comment->company_name}}</h2>
                </div>
                <div class="about">
                    <h5><i class="fa fa-user fa-1x"></i> {{$comment->user->name}}</h5>
                    <span><i class="fa fa-clock-o"></i> {{$comment->created_at}}</span>
                </div>
                <hr>
                <div class="commenttitle">
                    <h5><a href="{{ route("post.view", ['id' => $comment->id ]) }}">{{$comment->commenttitle}}</a></h5>
                </div>
                <div class="yazi">
                    <span>{{$comment->comment}}</span>
                </div>
                <hr>
            </div>
            <br>
        @endforeach
        <br><br>
        <div class="pagination" style="margin-left: 40%; margin-top: 10%;">
            {{$comments->links()}}
        </div>
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
            <button><a href="/sikayetler">Şikayətlər</a></button>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('Project/img/img.png') }}" alt="burada sizin sekliniz ola bilmez">
        </div>
    </div>
    <br><br>
    <script>


        $('.writecomment').click(function () {
            @if(\Illuminate\Support\Facades\Auth::id())
                window.location = '/sikayet';
            @else
                window.location = '/login';
            @endif
        })
        $('.search-div').on('click', '.button', function () {
            var data = $('input[name=searchinput]').val();
            $.ajax({
                type: "POST",
                url: "/search",
                data: {
                    'data': data,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                   if(response.message=='success') {

                       $('.sikayet').html('');
                       response.result.forEach(search);

                       function search(item, index) {
                           $('.sikayet').append(`
                          <div class="col-10 complaint">
                <div class="basliq">
                    <h2>${item['company_name']}</h2>
                </div>
                <div class="about">
                    <h5><i class="fa fa-user fa-1x"></i>${item['name']}</h5>
                    <span><i class="fa fa-clock-o"></i> ${item['created_at']}</span>
                </div>
                <hr>
                <div class="commenttitle">
                    <h5><a href="/post?id=${item['id']}">${item['commenttitle']}</a></h5>
                </div>
                <div class="yazi">
                    <span>${item['comment']}</span>
                </div>
                <hr>
            </div>
                          `)
                       }
                   }
                }
            })
        });
    </script>
@endsection



