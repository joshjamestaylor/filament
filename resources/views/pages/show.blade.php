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
    
    <livewire:hero :page="$page" />

   

    @foreach ($page->content ?? [] as $block)
        @if ($block['type'] === 'block')
            <livewire:block :block="$block" />
        @elseif ($block['type'] === 'entries')
            <livewire:entries :block="$block" />
        @elseif ($block['type'] === 'image')
            <img src="{{ $block['data']['url'] }}" alt="{{ $block['data']['alt'] }}">
        @endif
    @endforeach

@livewireScripts
</body>
</html>
