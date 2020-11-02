@extends('template.main')
@section('main')


    <div class="alice-bg section-padding-bottom">
        <div class="container">
            <div class="row no-gutters">
                <div class="col">
                    <div class="job-listing-container">
                        <div style="margin-right: 10%" class="filtered-job-listing-wrapper">
                            <div class="job-view-controller-wrapper">
                                <div class="showing-number">
                                    <span>Bütün şikayətlər</span>
                                </div>
                            </div>
                            <div class="job-filter-result">
                                @if(isset($complaints))
                                    @foreach($complaints as $key => $complaint)
                                        <div class="col-lg-10" style="margin-left: 8%!important;">
                                            <div class="job-list half-grid">
                                                <div class="body">
                                                    <div class="content">
                                                        <h4><a>{{$complaint->complaint_title}}</a></h4>
                                                        <span>{{Illuminate\Support\Str::limit($complaint->complaint_body,80)}}</span>
                                                        <div class="info">
                                                            <span class="company"><a><i data-feather="user"></i>{{ $complaint->user->name }}</a></span>
                                                            <span class="office-location"><a><i
                                                                        data-feather="message-square"></i>{{$complaint->comments()->count()}}</a></span>
                                                            <span class="job-type temporary"><a><i
                                                                        data-feather="clock"></i>{{date('D-h:i', strtotime($complaint->created_at))}}</a></span>
                                                        </div>
                                                    </div>
                                                    <div class="more1">
                                                        <div class="buttons mt-5">
                                                            <a href="{{ route("post.view", ['id' => $complaint->id ]) }}"
                                                               class="button btn btn-lg btn-success">Keçid et</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Listing End -->

    <!-- Call to Action -->
    <div class="call-to-action-bg padding-top-90 padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="call-to-action-2">
                        <div class="call-to-action-content">
                            <h2>For Find Your Dream Job or Candidate</h2>
                            <p>Add resume or post a job. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                                elit tellus, luctus nec.</p>
                        </div>
                        <div class="call-to-action-button">
                            <a href="post-job.html" class="button">Post A Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

@endsection
