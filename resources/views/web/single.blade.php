@extends('web.main')
@section('main')
    <div class="text-left" style="width: 100%;height: 800px;margin-top: 5%;padding-left: 2%;">
        <div style="width: 90%;height: 400px;margin-left: 5%;" id="{{ $post->id }}">
            <div style="width: 100%;height: 100px;">
                <h1 class="text-left"
                    style="font-family: Poppins, sans-serif;border-color: #05320f;text-align: left;">{{ $post->company_name }}</h1>
                <div class="d-flex flex-row" style="width: 100%;height: 52px;"><i class="fa fa-user"
                                                                                  style="font-size: 35px;width: 52px;padding: 5px;color: rgb(8,8,8);height: 44px;padding-top: 10px;margin-top: 2%;"></i>
                    <h1 style="color: #080808;font-size: 25px;text-align: center;border-color: #3a7eb0;padding: 13px;font-weight: 700;">{{ $post->user->name }}</h1>
                    <h1 style="margin-left: 5%;font-size: 20px;padding: 15px;">{{date('D-h:i', strtotime($post->created_at))}}</h1>
                </div>
            </div>
            <div style="height: 250px;width: 100%;margin-top: 5%;">
                <h1 style="font-size: 20px;width: 100%;">{{ $post->complaint_body }}<br><br></h1>
            </div>
            <div id="write-comment" style="width: 80%;height: 100px;">
                <form>
                    <div class="d-flex flex-row field">
                        <input name="comment" class="form-control form-control-lg justify-content-center" type="text"
{{--                               id="float-input"--}}
                               style="width: 60%;height: 60px;background: #c4c4c4;opacity: 1;border: 3px none #ffffff;border-bottom: 1px solid rgb(73, 80, 87);padding: 10px;color: rgb(0,0,0);"
                               minlength="1" maxlength="100000">
                        @guest()
                            <button class="btn btn-success btn-lg shadow-sm disabled" type="button"
                                    style="width: 100px;height: 60px;margin-left: 10px;background: #2a4d34;">Göndər
                            </button></div>
                    @endguest
                    @auth()
                        <button class="btn btn-success btn-lg shadow-sm send" type="button"
                                style="width: 100px;height: 60px;margin-left: 10px;background: #2a4d34;">Göndər
                        </button>
            </div>
            @endauth
            </form>
        </div>
        <div id="comments" style="width: 80%;height: auto!important;">

        </div>
    </div>
    </div>
    <script>
        setInterval(function () {
            $.ajax({
                type: "GET",
                url: "{{ route('post.get.comments', ['post_id' => $post->id ]) }}",
                success: function (response) {
                    $("#comments").empty();
                    response.comments.forEach(function (comment) {
                        function time() {
                            let time = new Date(Date.parse(comment.created_at));
                            var month = new Array();
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

                        $('#comments').append(`
            <div class="d-flex flex-row" id="about" style="height: 50px;width: 100%;"><i class="fa fa-user" style="width: 48px;font-size: 32px;color: rgb(11,11,11);margin-top: 1%"></i>
                <h1 style="font-size: 20px;font-family: Poppins, sans-serif;text-align: left;padding: 3px;font-weight: 600;">${comment.user.name}</h1>
                <h1 style="font-size: 20px;font-family: Poppins, sans-serif;text-align: left;margin-left: 80px;padding-top: 5px;">${time()}</h1>
            </div>
            <div id="comment" style="height: 150px;">
                <div style="height: 120px;width: 100%;border-radius: 35px;background: #2a4d34;">
                    <div
                        style="width: 100%;height: 85px;border-radius: 25px 25px 25px 25px;background: #C4C4C4;padding: 10px;">
                        <span>${comment.comments}</span>
                    </div>
                </div>
            </div>`)
                    });
                }
            });

        }, 1000);
        //send_comments
        $('.send').click(function () {
            let comments = $('input[name=comment]').val()
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
                        if (response.status == 'success') {
                            $('input[name=comment]').val("");
                        }
                    }
                })
            }
        });
    </script>

@endsection
