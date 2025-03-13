<a href="{{ $url }}" class="entry">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full">
    <h2 class="text-lg font-semibold">{{$title ?? 'No title' }}</h2>
    <p class="">{{ $description ?? 'No description' }}</p>
</a>