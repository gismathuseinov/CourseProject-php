@extends('proyekt.nice-html.ltr.main')
@section('main')


    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">İcazələr</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Icaze cedveli</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                @foreach($data as $key => $value)
                                    <div class="col-6">
                                        <div class="adminheader">
                                            <img class="pic" width="auto" height="150px"
                                                 src="{{asset('Project/img/'.$value->compphoto)}}" alt="">
                                        </div>
                                        <div class="body">
                                            <div class="name">
                                                <span class="user_name">Şikayətçi:{{$value->name}}</span><br>
                                                <span class="user_name">Nömrə:{{$value->number}}</span><br>
                                                <span class="company_name">Şırkət:{{$value->company_name}}</span>
                                            </div>
                                            <div class="message">
                                                <span class="message_title">Başlıq:{{$value->commenttitle}}</span><br>
                                                <span class="messagetext">Mesaj:{{$value->comment}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
