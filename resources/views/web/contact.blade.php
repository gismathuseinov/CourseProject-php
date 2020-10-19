@extends('web.main')
@section('main')
    <div class="container" style="padding: 3%;">
        <div style="width: 100%;height: 450px;">
            <form style="height: 450px;">
                <div class="d-flex flex-column" style="width: 90%;height: 350px;margin-left: 5%;margin-top: 2%;">
                    <div style="height: 30%;margin-top: 5%;">
                        <label style="margin-left: 15%;">Email<br></label>
                        <input name="email" class="form-control" type="text" style="width: 70%;margin-left: 15%;background: rgba(193,211,203,0.61);height: 50px;">
                    </div>
                    <div style="height: 30%;margin-top: 5%;">
                        <label style="margin-left: 15%;">Mesaj başlığı<br></label>
                        <input name="message_title" class="form-control" type="text" style="margin-left: 15%;width: 70%;background: rgba(193,211,203,0.61);height: 50px;">
                    </div>
                    <div style="height: 30%;margin-top: 5%;">
                        <label style="margin-left: 15%;">Mesajınız<br></label>
                        <textarea name="message_body" class="form-control" style="width: 70%;margin-left: 15%;height: 60px;background: rgba(193,211,203,0.61);"></textarea>
                    </div>
                    <div style="height: 20%;margin-top: 2%;">
                        <button class="btn btn-success" data-bs-hover-animate="pulse" type="button" style="width: 15%;margin-left: 15%;height: 55px;">Göndər</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('.btn-success').click(function () {
            var email = $('input[name=email]').val();
            var message_title = $('input[name=message_title]').val();
            var message_body = $('textarea[name=message_body]').val();
            $.ajax({
                url: "{{ route('send') }}",
                type: "POST",
                data: {
                    'email': email,
                    'message_title': message_title,
                    'message_body': message_body,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    alert(response.message)
                    $('input[name=email]').val("");
                    $('input[name=message_title]').val("");
                    $('textarea[name=message_body]').val("");
                },
                error: function (request, error, response) {
                    alert(response.error())
                },
            })
        })
    </script>
@endsection
