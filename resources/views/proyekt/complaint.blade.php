@extends('proyekt.main')
@section('main')
    <br>
    <div class="container sikayet">
        @foreach($complaints as $key  => $complaint)
            <div class="col-10 complaint">
                <div class="basliq">
                    <h2>{{$complaint->company_name}}</h2>
                </div>
                <div class="about">
                    <h5><i class="fa fa-user fa-1x"></i> {{$complaint->user->name}}</h5>
                    <span><i class="fa fa-clock-o"></i> {{date("H:i", strtotime($complaint->created_at))}}</span>
                </div>
                <hr>
                <div class="commenttitle">
                                        <h5><a href="{{ route("post.view", ['id' => $complaint->id ]) }}">{{$complaint->complaint_title}}</a></h5>

                </div>
                <div class="yazi">
                    <span>{{$complaint->complaint_body}}</span>
                </div>
                <hr>
            </div>
            <br>

        @endforeach
    </div>
    <br>
@endsection
