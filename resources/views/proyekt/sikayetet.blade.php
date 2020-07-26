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
                <div class="form-group">
                    <label for="sikayet">Emailiniz</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
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
                <div class="form-group">
                    <label for="compphoto">Şikayətiniz firmaya/şirkətə göndərilsin?</label>
                    <br>
                    <label for="">Bəli</label>
                    <input type="radio" name="is_send" value="1">
                    <br>
                    <label for="">Xeyr</label>
                    <input type="radio" name="is_send" value="0">
                </div>
            </div>
        </form>
        <div class="form-group buton">
            <button class="btn btn-success">Gonder</button>
        </div>
    </div>
    <br><br><br><br>
    <script>
        $('.btn-success').click(function () {

            var company_name = $('input[name=company_name]').val();
            var email = $('input[name=email]').val();
            var complaint_title = $('input[name=complaint_title]').val();
            var complaint_body = $('textarea[name=complaint_body]').val();
            var is_send = $('input[name=is_send]').val();
            $.ajax({
                type: "POST",
                url: '/create_post',
                data: {
                    'company_name': company_name,
                    'email': email,
                    'complaint_title': complaint_title,
                    'complaint_body': complaint_body,
                    'is_send': is_send,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    toastr.success(response.message);
                    $('input[name=company_name]').val("");
                    $('input[name=email]').val("");
                    $('input[name=complaint_title]').val("");
                    $('textarea[name=complaint_body]').val("");
                    $('input[name=is_send]').removeAttr("checked");
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                },
            })
        })
    </script>

@endsection
