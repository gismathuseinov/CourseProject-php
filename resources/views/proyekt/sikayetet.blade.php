@extends('proyekt.main')
@section('main')

    <div class="col-5 form">
        <form id="sikayetform" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="sikayet">Hansı şirkətdən şikayətçisiniz?</label>
                    <input type="text" class="form-control" id="company_name" name="company_name"
                           placeholder="şikayətçi olduğunuz firma və ya şirkət adı">
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="sikayet">Emailiniz</label>--}}
{{--                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">--}}
{{--                </div>--}}
                <div class="form-group">
                    <label for="complainetname">Şikayət Başlığı</label>
                    <input type="text" class="form-control" id="complaint_title" name="complaint_title"
                           placeholder="Şikayətinizi nə haqqındadır?">
                </div>
                <div class="form-group">
                    <label for="complanabout">Şikayət </label><br>
                    <textarea style="resize: none;" name="complaint_body" id="" cols="60" rows="5"
                              placeholder="Şikayətinizi detallı şəkildə ifadə edin"></textarea>
                </div>
            </div>
        </form>
        <div class="form-group buton">
            <button style="margin-top:100px;" class="btn btn-success send">Göndər</button>
        </div>
    </div>
    <br>
    <script>
        $('.send').click(function () {

            var company_name = $('input[name=company_name]').val();
            // var email = $('input[name=email]').val();
            var complaint_title = $('input[name=complaint_title]').val();
            var complaint_body = $('textarea[name=complaint_body]').val();
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
                    toastr.success(response.message);
                    $('input[name=company_name]').val("");
                    // $('input[name=email]').val("");
                    $('input[name=complaint_title]').val("");
                    $('textarea[name=complaint_body]').val("");
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                },
            })
        })
    </script>

@endsection
