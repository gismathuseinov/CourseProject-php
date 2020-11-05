@extends('template.main')
@section('main')
    <br><br>
    <div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
            <div class="row no-gliters">
                <div class="col">
                    <div class="dashboard-container">
                        <div class="dashboard-content-wrapper">
                            <div class="dashboard-applied">
                                <h4 class="apply-title"></h4>
                                <div class="dashboard-apply-area">
                                    @if(isset($userPosts))
                                        @foreach($userPosts as $userPost)
                                            <div class="job-list">
                                                <div class="body">
                                                    <div class="content">
                                                        <h4>
                                                           @if($userPost->is_active===1 && $userPost->is_letted===1)
                                                            <a href="{{ route('post.view',['id' => $userPost->id]) }}">{{ $userPost->company_name }}</a>
                                                            @endif
                                    
                                                        </h4>
                                                        <h4>
                                                           @if($userPost->is_active===0 || $userPost->is_letted===0)
                                                            <a href="#" onclick="warning()">{{ $userPost->company_name }}</a>
                                                            @endif
                                    
                                                        </h4>
                                                        <div class="info">
                                                            <span class="company">{{Illuminate\Support\Str::limit($userPost->complaint_body,1000)}}</span><span class="job-type temporary"><a><i
                                                                    data-feather="clock"></i>{{date('D-h:i', strtotime($userPost->created_at))}}</a></span>
                                                        </div>
                                                    </div>
                                                    <div class="more">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-sidebar">
                            <div class="user-info">
                                <div class="user-body">
                                    <h3>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>
                                    <span style="font-size: 15px;">{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                                </div>
                            </div>

                            <div class="dashboard-menu">
                                <ul>
                                    <li class="active"><i class="fas fa-home"></i><a href="{{ route('user.dashboard') }}">Panel</a></li>
                                    <li><i class="fas fa-check-square"></i><a href="{{route('user.complaints')}}">Paylaşdıqların</a></li>
                                </ul>
                                <ul class="delete">
                                    <li><i class="fas fa-power-off"></i><a href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function warning(){
        alert('Şikayət aktiv deyil :)')
    }
</script>

@endsection
