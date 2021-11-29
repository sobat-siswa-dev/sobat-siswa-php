<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $admSchool ? $admSchool->name : 'Sobat Siswa' }} | Login</title>
    @include("assets/header")
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
    @yield('content')
    @include("assets/footer")
</body>

</html>