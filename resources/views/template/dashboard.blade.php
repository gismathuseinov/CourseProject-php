@extends('template.main')
@section('main')

    <div class="alice-bg section-padding-bottom">
      <div class="container no-gliters">
        <div class="row no-gliters">
          <div class="col">
            <div class="dashboard-container">
              <div class="dashboard-content-wrapper">
                <div class="dashboard-section user-statistic-block">
                  <div class="user-statistic">
                    <i data-feather="pie-chart"></i>
                    <h3>132</h3>
                    <span>Companies Viewed</span>
                  </div>
                  <div class="user-statistic">
                    <i data-feather="briefcase"></i>
                    <h3>12</h3>
                    <span>Applied Jobs</span>
                  </div>
                  <div class="user-statistic">
                    <i data-feather="heart"></i>
                    <h3>32</h3>
                    <span>Favourite Jobs</span>
                  </div>
                </div>

                <div class="dashboard-section dashboard-recent-activity">
                  <h4 class="title">Son Paylaşılanlar</h4>
                  <div class="activity-list">
                    <i class="fas fa-bolt"></i>
                    <div class="content">
                      <h5>Your Resume Updated!</h5>
                      <span class="time">5 hours ago</span>
                    </div>
                    <div class="close-activity">
                      <i class="fas fa-times"></i>
                    </div>
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
                    <li class="active"><i class="fas fa-home"></i><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li><i class="fas fa-check-square"></i><a href="{{route('user.complaints')}}">Applied Job</a></li>
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

                <a href="{{ route('write.complaint') }}" class="button">Post A Job</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
@endsection
