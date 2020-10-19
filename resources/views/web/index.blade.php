@extends('web.main')
@section('main')
    <style>
        .pagination > li > a
        {
            background-color: white;
            color: forestgreen;
        }

        .pagination > li > a:focus,
        .pagination > li > a:hover,
        .pagination > li > span:focus,
        .pagination > li > span:hover
        {
            color: green;
            background-color: #eee;
            border-color: #ddd;
        }

        .pagination > .active > a
        {
            color: white;
            background-color: green !Important;
            border: solid 1px #5A4181 !Important;
        }

        .pagination > .active > a:hover
        {
            background-color: #5A4181 !Important;
            border: solid 1px #5A4181;
        }
    </style>
    <div style="width: 50%;margin-left: 25%;height: 250px;margin-top: 5%;">
        <div style="width: 80%;height: 100px;margin-left: 10%;">
            <h1 style="text-align: center;font-size: 45px;color: #05320f;font-family: Bitter, serif;">Şikayətvar.com’a&nbsp;</h1>
            <h1 style="text-align: center;font-family: Poppins, sans-serif;font-size: 30px;">xoş gəlmisiniz!</h1>
        </div>
        <div style="width: 100%;height: 150px;">
            <button class="btn btn-success btn-lg border rounded" data-bs-hover-animate="pulse" type="button"
                    style="width: 260px;height: 90px;text-align: center;border-radius: 85px!important;margin-left: 31%;margin-top: 4%;background: #064c15;">
                <a style="text-decoration: none;color:white;" href="{{ route('write.complaint') }}">Şikayət yaz</a>
            </button>
        </div>
    </div>
    <div style="width: 70%;height: 100px;margin-left: 15%;">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card m-auto" style="max-width:850px">
                    <div class="card-body border rounded" style="background: #c4c4c4;">
                        <div class="d-flex align-items-center"><i
                                class="fas fa-search d-none d-sm-block h4 text-body m-0"></i>
                            <input class="form-control form-control-lg flex-shrink-1 form-control-borderless" placeholder="Search topics or keywords" name="searchbar" style="background: #c4c4c4;color: black;">
                            <button class="search btn btn-success btn-lg"style="background: #064c15;border-radius: 35px!important;">Axtar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row" id="posts" style="width: 100%;height: 580px;margin-top:0.5%;">
        <div class="d-flex post" id="post" style="width: 944px!important;margin-top: 8%">
            @if(isset($complaints))
                @foreach($complaints ?? '' as $key=>$complaint)
                    <div data-bs-hover-animate="pulse" style="height: 230px;width: 377px!important;margin-left: 6%;margin-top: 50px;background: rgba(6,76,21,0.99);border-radius: 20px;">
                        <h6 style="margin-top: 10px;color: rgb(165,167,179);height: 40px;font-size: 15px;padding-top: 3%;padding-left: 15%;">
                            <a style="text-decoration: none;color: #e5e5e5" href="{{ route("post.view", ['id' => $complaint->id ]) }}">{{ $complaint->company_name }}</a>
                        </h6>
                        <div class="d-flex flex-row" id="name" style="height: 30px;width: 100%;margin-top: 1%!important;">
                        <span style="border-color: rgb(239,241,244);color: rgb(248,248,248);margin-left: 15%;">
                           {{ $complaint->user->name }}<br><br>
                        </span>
                            <span style="color: rgb(247,247,247);font-size: 12px;margin-left: 10%;margin-top: 2%;">{{date('D-h:i', strtotime($complaint->created_at))}}</span>
                        </div>
                        <div
                            id="text" style="height: 100px;margin-top: 1.3%;">
                            <h1 style="font-size: 15px;color: rgb(255,255,255);width: 80%;margin-left: 10%;">{{Illuminate\Support\Str::limit($complaint->complaint_body,100)}}</h1>
                        </div>
                        <span style="margin-left: 10%;color: rgb(255,255,255);padding-top: 10%;"><i class="fa fa-eye" style="color: rgb(251,251,251);"></i>&nbsp;{{ $complaint->comments()->count() }} rəy<br></span>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex flex-column" id="top-post" style="width: 30%;">
            <h1 style="margin-top: 3%;text-align:center;margin-left: 11%;border: 1px solid black"><strong>Top Posts</strong></h1>
            @if(isset($posts))
                @foreach($posts  as $key=>$post)

                    <div data-bs-hover-animate="pulse"
                         style="width: 80%;margin-left: 10%;height: 130px;border: 2px solid green;border-radius: 20px;background: rgb(255,255,255);margin-top: 5%;">
                        <h1 style="text-align: center;font-size: 20px;color: rgb(11,11,11);">{{$post[0]->company_name}}</h1>
                        <div style="width: 90%;margin-left: 5%;height: 60px;"><span style="font-size: 13px;">{{Illuminate\Support\Str::limit($complaint->complaint_body,350)}}<br></span>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>
    </div>

        <div class="pagination" style="position: relative;margin-left: 25%;margin-top:-85px;">
            {{$complaints->links()}}
        </div>


    <script>
        $('.search').click(function () {
            let data = $('input[name=searchbar]').val();
            $.ajax({
                type: "POST",
                url: "{{ route('search') }}",
                data: {
                    'data': data,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    if(response.message==='success') {
                        $('input[name=searchbar]').val(' ');
                        $('.post').html('');
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

                            $('.post').append(`
                             <div class="d-flex" id="post" style="width: 944px!important;margin-top: 8%">

                            <div data-bs-hover-animate="pulse" style="height: 230px;width: 377px!important;margin-left: 6%;margin-top: 50px;background: rgba(6,76,21,0.99);border-radius: 20px;">
                                <h6 style="margin-top: 10px;color: rgb(165,167,179);height: 40px;font-size: 15px;padding-top: 3%;padding-left: 15%;">
                                    <a style="text-decoration: none;color: #e5e5e5" href="{{ route("post.view", ['id' => $complaint->id ]) }}">${result.company_name}</a>
                        </h6>
                        <div class="d-flex flex-row" id="name" style="height: 30px;width: 100%;margin-top: 1%!important;">
                        <span style="border-color: rgb(239,241,244);color: rgb(248,248,248);margin-left: 15%;">
                           ${result.user.name}<br><br>
                        </span>
                            <span style="color: rgb(247,247,247);font-size: 12px;margin-left: 10%;margin-top: 2%;">${time()}</span>
                        </div>
                        <div
                            id="text" style="height: 100px;margin-top: 1.3%;">
                            <h1 style="font-size: 15px;color: rgb(255,255,255);width: 80%;margin-left: 10%;">${result.complaint_body}</h1>
                        </div>
                        <span style="margin-left: 10%;color: rgb(255,255,255);padding-top: 10%;"><i class="fa fa-eye" style="color: rgb(251,251,251);"></i>&nbsp;${result.comments().count()} rəy<br></span>
                    </div>
                            </div>
`)
                        });
                    }

                }
            })
        });
    </script>
@endsection
