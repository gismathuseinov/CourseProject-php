@extends('web.main')
@section('main')
    <div class="container" style="padding: 3%;">
        <div style="width: 100%;height: 500px!important;">
            <form style="height: 500px;">
                <div class="d-flex flex-column" style="width: 90%;height: 450px;margin-left: 5%;margin-top: 2%;">
                    <div style="height: 30%;margin-top: 5%;">
                        <label style="margin-left: 15%;">
                            <strong>Hansı şirkətdən şikayətçisiniz?</strong>
                        </label>
                        <input name="company_name" class="form-control" type="text" style="width: 70%;margin-left: 15%;background: rgba(193,211,203,0.61);height: 50px;" placeholder="şikayətçi olduğunuz firma və ya şirkət">
                    </div>
                    <div style="height: 30%;margin-top: 5%;">
                        <label style="margin-left: 15%;">
                            <strong>Şikayıt başlığı</strong>
                        </label>
                        <input name="complaint_title" class="form-control" type="text" style="margin-left: 15%;width: 70%;background: rgba(193,211,203,0.61);height: 50px;" placeholder="şikayətiniz nə haqqındadır?">
                    </div>
                <div style="height: 30%;margin-top: 5%;">
                    <label style="margin-left: 15%;">
                        <strong>Şikayət</strong>
                    </label>
                    <textarea name="complaint_body" class="form-control" style="width: 70%;margin-left: 15%;height: 60px;background: rgba(193,211,203,0.61);" placeholder="şikayətinizi detallı şəkildə ifadə edin"></textarea>
                </div>
        <div style="height: 20%;margin-top: 2%;">
            <button data-bs-hover-animate="pulse" class="btn btn-success send" type="button" style="width: 15%;margin-left: 15%;height: 55px;">Göndər</button>
        </div>
    </div>
    </form>
        </div>
    </div>

    <script>
        $('.send').click(function () {

            var company_name = $('input[name=company_name]').val();
            var complaint_title = $('input[name=complaint_title]').val();
            var complaint_body = $('textarea[name=complaint_body]').val();
            console.log(company_name,complaint_body,complaint_title)
            $.ajax({
                type: "POST",
                url: '{{ route('write.post') }}',
                data: {
                    'company_name': company_name,
                    'complaint_title': complaint_title,
                    'complaint_body': complaint_body,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    alert(response.message)
                    $('input[name=company_name]').val("");
                    $('input[name=complaint_title]').val("");
                    $('textarea[name=complaint_body]').val("");
                },
                error: function (request, error, response) {
                    alert(response.error())
                },
            })
        })
    </script>
@endsection
