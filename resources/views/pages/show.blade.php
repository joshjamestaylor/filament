<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <livewire:navigation />
    
    <h1 class="text-3xl font-bold mb-4">{{ $page->title }}</h1>

@livewireScripts
</body>
</html>
