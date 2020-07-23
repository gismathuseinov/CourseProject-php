@extends('proyekt.main')
@section('main')
    <br><br>
    <div class="container sikayet">
        @foreach($post as $key  => $value)
            <div class="col-10 complaint" id="{{$value->id}}">
                <div class="basliq">
                    <h2>{{$value->company_name}}</h2>
                </div>
                <div class="about">
                    <h5><i class="fa fa-user fa-1x"></i> {{$value->name}}</h5>
                    <span><i class="fa fa-clock-o"></i> {{$value->created_at}}</span>
                </div>
                <hr>
                <div class="commenttitle">
                    <h4>{{$value->commenttitle}}</h4>
                </div>
                <div class="yazi">
                    <span>{{$value->comment}}</span>
                </div>
                <hr>
            </div>
            <br>
        @endforeach
    </div>
    <br>
    <div class="comment_post">

    </div>
    <script>
        //buton disabled
            @if(\Illuminate\Support\Facades\Auth::id())
               $('.comment_post').append(`
                <div class="comment">
                   <textarea name="comment" id="comment" cols="114" rows="5"></textarea>
                </div>
                <div class="send">
                    <button class="btn btn-outline-info">Göndər</button>
                </div>

                 
                @foreach($getdata as $key => $value)
                <div class="blog-comments">
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">{{$value->name}}<span class="time">22deq</span></h4>
									<p>{{$value->comments}}</p>
								</div>
							</div>
							<!-- /comment -->
						</div> 
                @endforeach
               

`);
            @else
            $('.comment_post').append(`
                <div class="comment">
                    <span>Rəy bildirmək üçün <a href="/register">qeydiyyatdan</a> keçin</span>
                    <textarea name="comment" id="" cols="114" rows="5"></textarea>
                </div>
                <div class="send">
                    <button class="btn btn-outline-info disabled" style="cursor: no-drop;">Göndər</button>
                </div>
               
                @foreach($getdata as $key => $value)
                <div class="blog-comments">
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">{{$value->name}}<span class="time">22deq</span></h4>
									<p>{{$value->comments}}</p>
								</div>
							</div>
						</div>    
                @endforeach
                
               `);
            @endif
        //send_comments
        $('.btn-outline-info').click(function () {
            var post_id = $('.complaint').attr('id');
            var comments = $('#comment').val();
            if(comments == ''){
                alert("Zəhmət olmasa  mesaj yazın!");
            }
            else{
                $.ajax({
                    type:"POST",
                    url:"post_comments",
                    data:{
                        'comments':comments,
                        'post_id':post_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success:function (response) {
                        if(response.message=='success'){
                            $('#comment').val("");
                            $('.show').append(`
                        <div class="blog-comments">
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">`+response.name+`<span class="time"></span></h4>
									<p>`+response.comment+`</p>
								</div>
							</div>
						</div> 
                        `)
                        }
                    }
                })
            }

        })
    </script>
@endsection
