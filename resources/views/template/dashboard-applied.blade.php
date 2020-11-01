@extends('template.main')
@section('main')

    <div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
            <div class="row no-gliters">
                <div class="col">
                    <div class="dashboard-container">
                        <div class="dashboard-content-wrapper">
                            <div class="dashboard-applied">
                                <h4 class="apply-title">06 Job Applied</h4>
                                <div class="dashboard-apply-area">
                                    @if(isset($userPosts))
                                        @foreach($userPosts as $userPost)
                                            <div class="job-list">
                                                <div class="body">
                                                    <div class="content">
                                                        <h4>
                                                            <a href="{{ route('post.view',['id' => $userPost->id]) }}">{{ $userPost->company_name }}</a>
                                                        </h4>
                                                        <div class="info">
                                                            <span class="company">{{Illuminate\Support\Str::limit($userPost->complaint_body,100)}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="more">
                                                        <div class="buttons">
                                                            <a href="#" class="button">Apply Now</a>
                                                            <a href="#" class="favourite"><i
                                                                    data-feather="heart"></i></a>
                                                        </div>
                                                        <a href="#" class="bookmark-remove"><i class="fas fa-times"></i></a>
                                                        <p class="deadline">Deadline: Oct 31, 2018</p>
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
                                    <h5>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h5>
                                    <span>{{\Illuminate\Support\Facades\Auth::user()->email}}</span>
                                </div>
                            </div>

                            <div class="dashboard-menu">
                                <ul>
                                    <li class="active"><i class="fas fa-home"></i><a
                                            href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                    <li><i class="fas fa-check-square"></i><a href="{{route('user.complaints')}}">Applied
                                            Job</a></li>
                                </ul>
                                <ul class="delete">
                                    <li><i class="fas fa-power-off"></i><a href="#">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
