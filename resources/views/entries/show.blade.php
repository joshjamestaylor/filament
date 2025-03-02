<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">


<div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">{{ $entry['data']['entry_title'] }}</h1>
        <p class="text-lg">{{ $entry['data']['entry_description'] }}</p>
        <img src="{{ asset($entry['data']['entry_image']) }}" alt="{{ $entry['data']['entry_title'] }}" class="w-full h-auto">
    </div>



@livewireScripts
</body>
</html>
