<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ninja Network</title>
    @vite('resources/css/app.css')
</head>
<body>
    
    @if (session('success_create'))
        <div class="bg-green-200 p-4 rounded text-center">
            {{ session('success_create')}}
        </div>
    @endif
    @if (session('success_delete'))
        <div class="bg-red-500 p-4 rounded text-center">
            {{ session('success_delete')}}
        </div>
    @endif
    <header>
        <nav>
            <h1>Ninja Network</h1>
            <a href="{{ route('ninjas.index') }}">All Ninjas</a>
            <a href="{{ route('ninjas.create')}}">Create New Ninjas</a>
        </nav>
    </header>
    <main class="container">
        {{ $slot }}
    </main>
 
</body>
</html>