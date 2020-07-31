@extends('proyekt.main')
@section('main')
    <br><br>
    <div class="container sikayet">

        <div class="col-10 complaint" id="{{$post->id}}">
            <div class="basliq">
                <h2>{{$post->company_name}}</h2>
            </div>
            <div class="about">
                <h5><i class="fa fa-user fa-1x"></i> {{$post->user->name}}</h5>
                <span><i class="fa fa-clock-o"></i>{{date('D-h:i', strtotime($post->created_at))}}</span>
            </div>
            <hr>
            <div class="commenttitle">
                <h4>{{$post->complaint_title}}</h4>
            </div>
            <div class="yazi">
                {{$post->complaint_body}}
            </div>
            <hr>
        </div>
        <br>

    </div>
    <br>
    <div class="comment_post">
        <div class="navigation">
            @auth
                <div class="comment">
                    <textarea name="comment" id="comment" cols="114" rows="5"></textarea>
                </div>
                <div class="send">
                    <button class="btn btn-outline-info">Göndər</button>
                </div>
            @endauth

            @guest
                <div class="comment">
                    <span>Rəy bildirmək üçün <a href={{route('register')}}>qeydiyyatdan</a> keçin</span>
                    <textarea name="comment" id="" cols="114" rows="5"></textarea>
                </div>
                <div class="send">
                    <button class="btn btn-outline-info disabled" style="cursor: no-drop;">Göndər</button>
                </div>
            @endguest
        </div>
        <div class="comments">


        </div>

    </div>
    <script>
        setInterval(function () {
            $.ajax({
                type: "GET",
                url: "{{ route('post.get.comments', ['post_id' => $post->id ]) }}",
                success: function (response) {
                    $(".comments").empty();
                    response.comments.forEach(function (comment) {
                        function time(){
                            let time =new Date(Date.parse(comment.created_at));
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
                        $('.comments').append(`
                         <div class="blog-comments">
                             <div class="media">
                                 <div class="media-body">
                                     <h6 s class="media-heading">${comment.user.name}<span class="time">${time()}</span></h6>
                                    <p>${comment.comments}</p>
                                </div>
                            </div>
                        </div>`);
                    });
                }
            });

        }, 1000);
        //send_comments
        $('.btn-outline-info').click(function () {
            var comments = $('#comment').val();
            if (comments == '') {
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
                        if (response.status == 'success') {
                            $('#comment').val("");
                        }
                    }
                })
            }
        });
    </script>
@endsection
