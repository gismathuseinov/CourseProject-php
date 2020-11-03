@extends('template.main')
@section('main')

    <div class="alice-bg padding-top-70 padding-bottom-70" style="background-color: lightgrey">
        <div class="container">

        </div>
    </div>

    <div class="alice-bg section-padding-bottom" style="background-color: lightgrey">
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
                            <div class="job-filter-result searchPanel">
                                @if(isset($complaints))
                                    @foreach($complaints as $key => $complaint)
                                        <div class="col-lg-12" >
                                            <div class="job-list half-grid">
                                                <div class="body">
                                                    <div class="content">
                                                        <h4><a>{{$complaint->complaint_title}}</a></h4>
                                                        <p>{{Illuminate\Support\Str::limit($complaint->complaint_body,105)}}</p>
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
                                                               class="button btn btn-lg btn-outline-success" style="width: 100px;height: 40px;display: flex;justify-content: center;font-size: 17px;">Keçid et</a>
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
                            <h2>Hər hansısa şirkətdən məhsul almağı<br> planlaşdırırsan?</h2>
                            <span style="font-size: 18px;">Şikayətlər bölməsinə keçid et və həmin şirkət haqqında fikirləri öyrən</span>
                        </div>
                        <div class="call-to-action-button">
                            <a href="{{ route('site.complaints') }}" class="button">Şikayətlər</a>
                            <span>və ya</span>
                            <a href="{{ route('write.complaint') }}" class="button">Şikayət Yaz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->

    <script>
        $('.search').click(function () {
            let data = $('input[name=search]').val();
            $.ajax({
                type: "POST",
                url: "{{ route('search') }}",
                data: {
                    'data': data,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    if(response.message==='success') {
                        $('input[name=search]').val(' ');
                        $('.searchPanel').html('');
                        $('.pagination').remove()
                        response.results.forEach(function (result) {

                            function time(){
                                let time =new Date(Date.parse(result.created_at));
                                let month=[];
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


                            $('.searchPanel').append(
                                `
                                                                <div class="col-lg-10" style="margin-left: 8%!important;">
                                        <div class="job-list half-grid">
                                            <div class="body">
                                                <div class="content">
                                                    <h4><a>${result.complaint_title}</a></h4>
                                                    <span>${result.complaint_body.substring(0,170)}</span>
                                                    <div class="info">
                                                        <span class="company"><a><i data-feather="user"></i>${result.user.name}</a></span>
                                                        <span class="job-type temporary"><a><i
                                                                    data-feather="clock"></i>{{time()}}</a></span>
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


                            `
                            )
                        })
                    }
                }
            })
        });
    </script>
@endsection
