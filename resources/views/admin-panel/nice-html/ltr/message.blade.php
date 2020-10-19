@extends('proyekt.nice-html.ltr.main')
@section('main')

    <div class="page-wrapper">

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
                                <li class="breadcrumb-item active" aria-current="page">Mesaj cədvəli</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Mesaj basligi</th>
                                        <th>MEsaj</th>
                                        <th>Görüldü</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feedback as $key => $value)
                                        <tr id="{{$value->id}}">
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->message_title}}</td>
                                            <td>{{$value->message_body}}</td>
                                            <td>
                                                <button class="btn btn-warning notsee" type="submit"><i
                                                        class="fa fa-check"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('tbody').on('click', '.notsee', function () {
                var tr = $(this).parents('tr');
                var id = $(this).parents('tr').attr('id');
                $(this).parents('tr').remove();
                $.ajax({
                    url: "/see",
                    type: "POST",
                    data: {
                        'id': id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {

                    }
                })
            })
        </script>
@endsection
