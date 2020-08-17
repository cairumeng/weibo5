<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Document</title>
</head>

<body>
    @include('layouts._header')
    <div class="container">
        @include('shared._messages')
        @yield('content')
    </div>
    @include('layouts._footer')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('js')
</body>

</html>