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

    {{-- Data Table CSS --}}
    <link rel="stylesheet" href="{{ asset("assets/css/data-table.css") }}">

    {{-- Icons --}}

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">

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
    <script href="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>

</body>
</html>