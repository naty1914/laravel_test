<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ninja Network</title>
    @vite('resources/css/app.css')
</head>
<body class="text-center px-8  py-12">
    <h1>Welcome to the Ninja Network</h1>
    <p> Click the link below to login</p>
        <a href="/ninjas" class="btn">Find Ninjas!</a>
</body>
</html>