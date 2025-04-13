<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'VhiWEB')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('partials.navbar') {{-- 🔁 Navbar Reusable --}}

    <div class="container">
        @yield('content')
    </div>
</body>

</html>