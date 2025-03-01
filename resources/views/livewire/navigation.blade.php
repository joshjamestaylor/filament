<div class="bg-gray-800 fixed z-20 w-full text-white p-4">
    <nav class="flex space-x-4">
            <a href="{{ route('home') }}" class="hover:underline">
                Home
            </a>
        @foreach ($pages as $page)
            <a href="{{ route('page.show', $page->slug) }}" class="hover:underline">
                {{ $page->title }}
            </a>
        @endforeach
    </nav>
</div>
