<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title", "App Main")</title>

    {{-- link boostrap css --}}
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">

    {{-- main css --}}
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">

</head>
<body>

    {{-- Header --}}
    @include("home.layout.header")

    <div class="container">

        @yield("content_app")

    </div>

    {{-- Footer --}}
    @include("home.layout.footer")

    {{-- link boostrap css --}}
    <link rel="stylesheet" href="{{ asset("assets/js/bootstrap.bundle.min.js") }}">

</body>
</html>