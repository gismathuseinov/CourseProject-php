@extends('proyekt.main')
@section('main')
    <style>
        .form-box {
            color: white;
            max-width: 500px;
            margin: auto;
            padding: 50px;
            border: 10px solid #f2f2f2;
        }

        h1, p {
            text-align: center;
        }

        input, textarea {
            width: 100%;
        }
    </style>
    <br>
    <div class="col-6" style="margin-left: 25%;">
        <form class="form-box bg-dark">
            <h1>Bizimlə Əlaqə</h1>

            <div class="form-group">
                <label for="name">Emailiniz</label>
                <input class="form-control" id="name" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="email">Mesaj başlığı</label>
                <input class="form-control" id="email" type="text" name="message_title">
            </div>
            <div class="form-group">
                <label for="message">Mesajınız</label>
                <textarea class="form-control" id="message" name="message_body"></textarea>
            </div>
        </form>
        <div class="col-3" style="margin-left: 36%;">
            <button class="btn btn-primary form-control">Send</button>
        </div>
        <br>
    </div>



    <script>
        $('.btn-primary').click(function () {
            var email = $('input[name=email]').val();
            var message_title = $('input[name=message_title]').val();
            var message_body = $('textarea[name=message_body]').val();
            // console.log(mesaj)
            $.ajax({
                url: "/send",
                type: "POST",
                data: {
                    'email': email,
                    'message_title': message_title,
                    'message_body': message_body,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    toastr.success(response.message);
                    $('input[name=email]').val("");
                    $('input[name=message_title]').val("");
                    $('textarea[name=message_body]').val("");
                },
                error: function (request, error, response) {
                    toastr.error(request.responseJSON.errors[Object.keys(request.responseJSON.errors)[0]]);
                },
            })
        })
    </script>
@endsection
