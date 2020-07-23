@extends('proyekt.main')
@section('main')

    <div class="col-5 form">
        <form id="sikayetform" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="sikayet">Hansı şirkətdən şikayətçisiniz?</label>
                    <input type="text" class="form-control" id="compname" name="compname" placeholder="Şirkətin adı">
                </div>
                <div class="form-group">
                    <label for="sikayet">Emailiniz</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="complainetname">Şikayət Başlığı</label>
                    <input type="text" class="form-control" id="complainetname" name="complainetname"
                           placeholder="Şikayətinizi bir  cümlə ile bildirin">
                </div>
                <div class="form-group">
                    <label for="complanabout">Şikayət </label><br>
                    <textarea style="resize: none;" name="complainet" id="" cols="60" rows="5"
                              placeholder="Şikayətinizi detallı şşəkildə ifadə edin"></textarea>
                </div>
                <div class="form-group">
                    <label for="compphoto">Qəbz,şəkil </label>
                    <input type="file" name="compphoto" id="compphoto" class="form-control">
                </div>
                <div class="form-group">
                    <label for="compphoto">Şikayətiniz markaya göndərilsin?</label>
                    <br>
                    <label for="">Gonder</label>
                    <input type="radio" name="send" value="1">
                    <br>
                    <label for="">Yox</label>
                    <input type="radio" name="send" value="0">
                </div>
            </div>
        </form>
        <div class="form-group buton">
            <button class="btn btn-success">Gonder</button>
        </div>
        <br>
    </div>
    <br><br><br><br>
    <script>
        $('.btn-success').click(function () {

            var formdata = new FormData($('#sikayetform')[0]);
            formdata.append("_token", "{{ csrf_token() }}");
            $.ajax({
                type: "POST",
                url: "sikayetyaz",
                cahce: false,
                contentType: false,
                processData: false,
                data: formdata,
                success: function (response) {
                    toastr.success(response.message);
                    $('input[name=compname]').val("");
                    $('input[name=email]').val("");
                    $('input[name=complainetname]').val("");
                    $('input[name=compphoto]').val("");
                    $('textarea[name=complainet]').val("");
                    $('input[name=send]').removeAttr("checked");
                },
                    error: function (request, error, response) {
                        toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                    },
            })
        })
    </script>

@endsection
