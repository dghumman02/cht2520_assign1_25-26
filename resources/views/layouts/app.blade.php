<!DOCTYPE html>
<html>
<head>
    <title>Micro Store</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<x-navigation />

<div class="container">
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @yield('content')
</div>

</body>
</html>
