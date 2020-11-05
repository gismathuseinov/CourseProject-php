@extends('template.main')
@section('main')
{{--    <link rel="stylesheet" href="{{asset('template/css/comment.css')}}">--}}
    <div class="alice-bg padding-top-60 section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="job-listing-details">
                        <div class="job-title-and-info">
                            <div class="title">
                                <div class="title-body">
                                    <h4>{{$post->company_name}}</h4>
                                    <div class="info">
                                        <span class="company"><a href="#"><i data-feather="user"></i>{{$post->user->name}}</a></span>
                                        <span class="office-location"><a href="#"><i data-feather="message-square"></i>{{$post->comments()->count()}}</a></span>
                                        <span class="job-type full-time"><a href="#"><i data-feather="clock"></i>{{date('D-h:i', strtotime($post->created_at))}}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="details-information section-padding-60">
                            <div class="row">
                                <div class="col-xl-7 col-lg-12">
                                    <div class="description details-section">
                                        <h4><i data-feather="align-left"></i>{{$post->complaint_title}}</h4>
                                        <p>{{ $post->complaint_body }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div style="width: 70%;display: flex;flex-direction:row;">
                                <textarea style="width: 90%;height: 7vh;" name="comment"
                                          class="form-control"></textarea>
                                @auth()
                                    <button class="btn btn-lg btn-info send">Göndər</button>
                                @endauth
                                @guest()
                                    <button class="btn btn-lg btn-info deactive">Göndər</button>
                                @endguest
                            </div>
                        </div>
                        <br>
                        <div class="comments-container">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setInterval(function () {
            $.ajax({
                type: "GET",
                url: "{{ route('post.get.comments', ['post_id' => $post->id ]) }}",
                success: function (response) {
                    $(".comments-container").empty();
                    response.comments.forEach(function (comment) {
                        console.log(response)

                        function time() {
                            let time = new Date(Date.parse(comment.created_at));
                            var month = [];
                            month[0] = "Yanvar";
                            month[1] = "Fevral";
                            month[2] = "Mart";
                            month[3] = "Aprel";
                            month[4] = "May";
                            month[5] = "Iyun";
                            month[6] = "Iyul";
                            month[7] = "Avqust";
                            month[8] = "Sentyabr";
                            month[9] = "Oktyabr";
                            month[10] = "Noyabr";
                            month[11] = "Dekabr";
                            var hours = time.getHours();
                            var minutes = time.getMinutes();
                            minutes = minutes < 10 ? '0' + minutes : minutes;

                            return time.getDate() + " " + month[time.getMonth()] + " " + hours + ":" + minutes;
                        }

                        $('.comments-container').append(
                            `<ul id="comments-list" style="margin-right: 60px;" class="comments-list">
                                <li>
                                    <div class="comment-main-level">
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name"><a>${comment.user.name}</a></h6>
                                                <span>${time()}</span>
                                            </div>
                                            <div class="comment-content">
                                                ${comment.comments}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>`
                        )
                    });
                }
            });

        }, 1000);
        //send_comments
        $('.send').click(function () {
            let comments = $('textarea[name=comment]').val()
            if (comments === '') {
                alert("Zəhmət olmasa  mesaj yazın!");
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{ route('post.create.comment', ['post_id' => $post->id ]) }}",
                    data: {
                        'comments': comments,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            $('textarea[name=comment]').val(" ");
                        }
                    }
                })
            }
        });

        $('.deactive').click(function (){
            alert("Qeydiyyatdan keçin vəya hesabınıza daxil olun")
        })
    </script>
@endsection




