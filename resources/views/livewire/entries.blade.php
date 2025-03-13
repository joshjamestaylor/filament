<div class="container mx-auto py-20" 
    style="padding-top: calc((54vh - 100vw )/ -10); padding-bottom: calc((56vh - 100vw )/ -10);">
    @if ($linked_page)
    <div class="text-right mb-3">
        <livewire:button 
            title="View more" 
            url="{{ $linked_page }}"
        />
    </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($entries as $item)
            <livewire:card 
                title="{{ $item['data']['entry_title'] }}"
                description="{{ $item['data']['entry_description'] }}"
                url="/{{ $slug }}/{{ $item['data']['entry_slug'] }}"
                image="{{ asset('storage/' . $item['data']['entry_image']) }}"
            />

        @endforeach
    </div>

</div>
