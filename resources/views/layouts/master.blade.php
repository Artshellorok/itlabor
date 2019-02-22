<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <title>{{Request::path()}}</title>
</head>
<body>
    <div id ='app'>
    @yield('content')
    </div>
    @yield('scripts')
    <script src='/js/app.js' type='text/javascript'></script>
</body>
</html>