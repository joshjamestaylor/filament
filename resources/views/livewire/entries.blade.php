<div class="container mx-auto py-20" style="padding-top: calc((54vh - 100vw )/ -10); padding-bottom: calc((56vh - 100vw )/ -10);">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
        @foreach ($entries as $item)
            <a href="/{{ $slug }}/{{ $item['data']['entry_slug'] }}" class="entry">
                <img src="{{ asset('storage/' . $item['data']['entry_image']) }}" alt="Entry Image" class="w-full">
                <h2 class="text-lg font-semibold">{{ $item['data']['entry_title'] ?? 'No title' }}</h2>
                <p class="">{{ $item['data']['entry_description'] ?? 'No description' }}</p>
            </a>
        @endforeach
    </div>
</div>
