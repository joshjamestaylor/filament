<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body     
    style="
    @if ( $dark_mode ) 
        background-color: {{ $dark_color }};
        color: {{ $light_color }};
    @else 
        background-color: {{ $light_color }};
        color: {{ $dark_color }};
    @endif"
    >

    <livewire:navigation />
    
    <livewire:hero :page="$page" />

    @foreach ($page->content ?? [] as $block)
        @if ($block['type'] === 'block')
            <livewire:block :block="$block" />
        @elseif ($block['type'] === 'entries')

            <livewire:entries :block="$block" :entriesLayout="$block['data']['entries_layout']"/>
        @elseif ($block['type'] === 'form')
            <livewire:form :block="$block" />
        @endif
    @endforeach

    <livewire:footer />

@livewireScripts
</body>
</html>
