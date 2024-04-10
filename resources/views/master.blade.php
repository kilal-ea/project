<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@Vite('resources/css/app.css')
    <nav class="flex justify-between items-center bg-black p-4">
        <div>
            <a href="{{ route('d') }}" class="mr-4 text-white">Dashboard</a> 
            <a href="{{ route('profile') }}" class="mr-4 text-white">Profile</a>
        </div>
        <div>
            <a href="{{ route('logout') }}" class="ml-4">Logout</a>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
