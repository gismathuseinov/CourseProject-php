@extends('proyekt.main')
@section('main')

    <div class="container sikayet">
        @foreach($comment as $key  => $value)
            <div class="col-10 complaint">
                <div class="basliq">
                    <h2>{{$value->company_name}}</h2>
                </div>
                <div class="about">
                    <h5><i class="fa fa-user fa-1x"></i> {{$value->name}}</h5>
                    <span><i class="fa fa-clock-o"></i> {{$value->created_at}}</span>
                </div>
                <hr>
                <div class="commenttitle">
                    <h5>{{$value->commenttitle}}</h5>
                </div>
                <div class="yazi">
                    <span>{{$value->comment}}</span>
                </div>
                <hr>
            </div>
            <br>

        @endforeach
        <br><br>
        <div class="pagination" style="margin-left: 40%; margin-top: 10%;">
            {{$comment ->links()}}
        </div>
    </div>

@endsection
