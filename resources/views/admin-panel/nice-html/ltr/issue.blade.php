@extends('admin-panel.nice-html.ltr.main')
@section('main')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
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
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Mail</th>
                                        <th>Şirkət</th>
                                        <th>Şikayət başlığı</th>
                                        <th>Şikayət</th>
                                        <th>İcazə</th>
                                        <th>Düzənləmə</th>
                                        <th>Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $key => $value)
                                        <tr id="{{$value->id}}">
                                            <td>{{$value->user->email}}</td>
                                            <td>{{$value->company_name}}</td>
                                            <td>{{$value->complaint_title}}</td>
                                            <td>{{$value->complaint_body}}</td>
                                            <td>
                                                <button class="btn btn-success permission"><i class="fa fa-check"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning edit"><i class="fa fa-pencil"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        <div class="pagination">
            {{$comments->links()}}
        </div>
        <script>
            $('tbody').on('click', '.permission', function () {
                var tr = $(this).parents('tr');
                var id = tr.attr('id');
                $.ajax({
                    type: "POST",
                    url: "/accept",
                    data: {
                        'id': id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        if (response.message == 'success') {
                            tr.remove();
                        } else {
                            alert("error");
                        }
                    }
                })
            });

            $('tbody').on('click', '.btn-danger', function () {
                var tr = $(this).parent('tr');
                var id = $(this).parents('tr').attr('id');
                $(this).parents('tr').remove();
                $.ajax({
                    type: "POST",
                    url: "/delete",
                    data: {
                        'id': id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        alert('delete')
                    }
                })
            });

            $('tbody').on('click', '.edit', function () {
                id = $(this).parents('tr').attr('id');
                company_name = $(this).parents('tr').find('td:eq(1)').text();
                complaint_title = $(this).parents('tr').find('td:eq(2)').text();
                complaint_body = $(this).parents('tr').find('td:eq(3)').text();
                $(this).parents('tr').find('td:eq(1)').html('<input style="width:100px;" type="text" name="name" value="' + company_name + '">')
                $(this).parents('tr').find('td:eq(2)').html('<textarea name="title">' + complaint_title + '</textarea>')
                $(this).parents('tr').find('td:eq(3)').html('<textarea cols="30" name="comment">' + complaint_body + '</textarea>')
                $(this).parents('tr').find('td:eq(5)').html('<button class="btn btn-success save"><i class="fa fa-save"></i></button><button class="btn btn-warning cancel"><i class="fa fa-times"></i></button>')
                $('tbody').on('click', '.save', function () {
                    var tr = $(this).parents('tr');
                    var id = $(this).parents('tr').attr('id');
                    var new_company_name = $('input[name=name]').val();
                    var new_title = $('textarea[name=title]').val();
                    var new_body = $('textarea[name=comment]').val();
                    $.ajax({
                        type: "POST",
                        url: "/edit",
                        data: {
                            'id': id,
                            'company_name': new_company_name,
                            'complaint_title': new_title,
                            'complaint_body': new_body,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            tr.find('td:eq(1)').html(new_company_name);
                            tr.find('td:eq(2)').text(new_title);
                            tr.find('td:eq(3)').text(new_body);
                            tr.find('td:eq(5)').html('<button class="btn btn-warning edit"><i class="fa fa-pencil"></i></button>');
                        }
                    })
                })
                $('tbody').on('click', '.cancel', function () {
                    var tr = $(this).parents('tr');
                    $(this).parents('tr').find('td:eq(1 )').text(company_name);
                    $(this).parents('tr').find('td:eq(2)').text(complaint_title);
                    $(this).parents('tr').find('td:eq(3)').text(complaint_body);
                    $(this).parents('tr').find('td:eq(5)').html('<button class="btn btn-warning save"><i class="fa fa-pencil"></i></button>')
                })
            });


        </script>
@endsection
