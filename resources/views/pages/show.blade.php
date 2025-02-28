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
    @foreach ($page->content ?? [] as $block)
        @if ($block['type'] === 'paragraph')
            <p>{{ $block['data']['content'] }}</p>
        @elseif ($block['type'] === 'heading')
            <{{ $block['data']['level'] }}>{{ $block['data']['content'] }}</{{ $block['data']['level'] }}>
        @elseif ($block['type'] === 'image')
            <img src="{{ $block['data']['url'] }}" alt="{{ $block['data']['alt'] }}">
        @endif
    @endforeach

@livewireScripts
</body>
</html>
