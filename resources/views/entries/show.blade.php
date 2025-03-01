<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

<livewire:navigation />

    {{ var_dump($entry) }}



@livewireScripts
</body>
</html>
