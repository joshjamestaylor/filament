@php
    $pages = \App\Models\Page::where('published', true)->get();
@endphp

<nav>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        @foreach ($pages as $page)
            <li><a href="{{ route('page.show', $page->slug) }}">{{ $page->title }}</a></li>
        @endforeach
    </ul>
</nav>
