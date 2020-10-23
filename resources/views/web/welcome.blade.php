<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('web/css/main.css') }}">
    <script src="{{ asset('web/js/main.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
    <button class="btn"><a href="{{ route('contact') }}">Niyə biz</a></button>
    <button class="btn"><a href="{{ route('site.index') }}">Ana Səhifə</a></button>
</div>

<div class="hover-effect4">
    <center><h3>Bizi sosial şəbəkələrdə izləyin</h3></center>
    <ul>
        <li><a href="#" title="Facebook"><i class="fa fa-facebook "></i></a></li>
        <li><a href="#" title="Whatsapp"><i class="fa fa-whatsapp "></i></a></li>
        <li><a href="#" title="Instagram"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#" title="Youtube"><i class="fa fa-youtube ytb"></i></a></li>
    </ul>
</div>
</body>
</html>
