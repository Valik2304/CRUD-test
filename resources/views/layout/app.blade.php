<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"--}}
    {{--          rel="stylesheet">--}}

    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"--}}
    {{--          rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link " aria-current="page">Products</a></li>
            <li class="nav-item"><a href="{{route('groups.index')}}" class="nav-link">Groups</a></li>
            <li class="nav-item"><a href="{{route('orders.index')}}" class="nav-link">Orders</a></li>
        </ul>
    </header>
</div>

<body class="bg-light">
<div class="container">
    <h2>@yield('title')</h2>
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
