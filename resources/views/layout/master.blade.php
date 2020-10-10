<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title','About') </title>
</head>
<body>
    {{-- Start Navgation Bar  --}}
    @include('layout.navbar')
    {{-- End Navgation Bar  --}}
    
    @section('sidebar')
        This is the default Sidebar
    @show
    @yield('content')
</body>
</html>