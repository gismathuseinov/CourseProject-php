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
                <input class="form-control" id="name" type="email" name="name">
            </div>
            <div class="form-group">
                <label for="email">Mesaj başlığı</label>
                <input class="form-control" id="email" type="text" name="email">
            </div>
            <div class="form-group">
                <label for="message">Mesajınız</label>
                <textarea class="form-control" id="message" name="mesaj"></textarea>
            </div>
        </form>
        <div class="col-3" style="margin-left: 36%;">
            <button class="btn btn-primary form-control">Send</button>
        </div>
        <br>
    </div>



    <script>
        $('.btn-primary').click(function () {
            var name = $('input[name=name]').val();
            var email = $('input[name=email]').val();
            var mesaj = $('textarea[name=mesaj]').val();
            // console.log(mesaj)
            $.ajax({
                url: "send",
                type: "POST",
                data: {
                    'name': name,
                    'email': email,
                    "_token": "{{ csrf_token() }}",
                    'mesaj': mesaj,
                },
                success: function (response) {
                    if (response.message == 'success') {
                        alert('Şikayətinə 24 saat ərzində baxılacaq')
                        $('input[name=name]').val("");
                        $('input[name=email]').val("");
                        $('input[name=email]').val("");
                        $('textarea[name=mesaj]').val("");
                    }
                }
            })
        })
    </script>
@endsection
