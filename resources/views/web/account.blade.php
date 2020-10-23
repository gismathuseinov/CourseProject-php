@extends('web.main')
@section('main')
    <div class="container" style="width: 100%;height: auto;margin-top: 3%;margin-bottom: 3%;padding: 3%;">
        <div class="d-flex flex-row" id="user" style="width: 80%;height: 100px;margin-left: 10%;">
            <div class="d-flex flex-row" id="username"
                 style="width: 30%;height: 54px;background: rgba(169,59,34,0.17);"><i class="fa fa-user"
                                                                                      style="font-size: 32px;margin-left: 9%;width: 24px;margin-top: 8px;color:darkgreen"></i>
                <div class="d-flex justify-content-center align-items-center align-content-center user-name"
                     style="width: 80%;height: 50px;margin-left: 10%;background: rgba(8,77,23,0.39);">
                    <h1 style="font-size: 30px;">{{ $user[0]['name']}}</h1>
                </div>
            </div>
            <div id="count" style="height: 50px;width: 100px;"><label style="font-size: 36px;">(say)</label></div>
        </div>
        <div class="d-flex flex-column" id="my-post" style="width: 100%;">
            @foreach($userPosts as $key=>$userPost)
                <div class="d-flex flex-column post-body" style="width: 90%;margin-left: 5%;height: 150px;margin-top: 1%;">
                    <div class="d-flex flex-row justify-content-around align-items-baseline align-content-center post-title" style="width: 70%;height: 50px;background: #064c15;">
                        @if($userPost->is_letted===1 && $userPost->is_active===1)
                        <a href="{{ route("post.view", ['id' => $userPost->id ]) }}" style="color: rgb(255,255,255);font-size: 20px;margin-top: 5px">{{ $userPost->company_name }}</a>
                        @endif
                        @if($userPost->is_letted===0 || $userPost->is_active===0)
                                <a style="color: rgb(255,255,255);font-size: 20px;margin-top: 5px">{{ $userPost->company_name }}</a>
                        @endif
                                <span
                            style="color: rgb(255,255,255);">{{date('D-h:i', strtotime($userPost->created_at))}}</span>
                    </div>
                    <span style="margin-left: 3%;width: 94%;height: 80px;">{{Illuminate\Support\Str::limit($userPost->complaint_body,300)}}<br><br></span>
                </div>
            @endforeach
        </div>
    </div>
@endsection
