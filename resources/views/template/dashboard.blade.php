@extends('template.main')
@section('main')
    <br><br>
    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <div class="dashboard-section user-statistic-block">
                  <div class="col-md-4 user-statistic">
                    <i data-feather="edit-2"></i>
                    <h3 class="count" data-form="0" data-to="{{ $userPostCount }}"></h3>
                    <span>Paylaşdıqlarım</span>
                  </div>
                  <div class="col-md-4 user-statistic">
                    <i data-feather="message-circle"></i>
                      <h3 class="count" data-form="0" data-to="{{ $userCommentCount ?? '' }}"></h3>
                    <span>Rəylər</span>
                  </div>
                </div>

                <div class="dashboard-section dashboard-recent-activity">
                  <h4 class="title">Son Paylaşılanlar</h4>
                  <div class="activity-list">
                    <i class="fas fa-bolt"></i>
                         <div class="content">
                    @if (isset($recentPost))
                      <a style="font-size: 20px;display: block" href="{{route('post.view',['id'=>$recentPost->id])}}">{{ $recentPost->company_name }}</a>
                      <span class="time">{{date('D-h:i', strtotime($recentPost->created_at))}}</span>
                    @endif
                   
                    </div>
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

    <!-- Call to Action -->
    <div class="call-to-action-bg padding-top-90 padding-bottom-90">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="call-to-action-2">
              <div class="call-to-action-content">
                <h2>Hansısa firmadan nazarısan?</h2>
                <p>Şikayətin var? Elə indi şikayətini yaz </p>
              </div>
              <div class="call-to-action-button">

                <a href="{{ route('write.complaint') }}" class="button">Şikayət Et</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
@endsection
