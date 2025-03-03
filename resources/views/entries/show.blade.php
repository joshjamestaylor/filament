<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body     style="
    @if ( $dark_mode ) 
        background-color: {{ $dark_color }};
        color: {{ $light_color }};
    @else 
        background-color: {{ $light_color }};
        color: {{ $dark_color }};
    @endif">

    <livewire:navigation />

    <div class="container mx-auto"
        style="padding-top: calc((54vh - 100vw )/ -10); padding-bottom: calc((56vh - 100vw )/ -10);"
    >
        <h1 class="text-2xl font-bold">{{ $entry['data']['entry_title'] }}</h1>
        <p class="text-lg">{{ $entry['data']['entry_description'] }}</p>
        <img src="{{  asset('storage/' . $entry['data']['entry_image']) }}" alt="{{ $entry['data']['entry_title'] }}" class="w-full h-auto">
    </div>



@livewireScripts
</body>
</html>
