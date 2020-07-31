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
                    <h5>{{$complaint->complaint_title}}</h5>
                </div>
                <div class="yazi">
                    <span>{{$complaint->complaint_body}}</span>
                </div>
                <hr>
            </div>
            <br>

        @endforeach
        <br><br>
        <div class="pagination" style="margin-left: 40%; margin-top: 10%;">
            {{$complaints ->links()}}
        </div>
    </div>
    <br>
@endsection
