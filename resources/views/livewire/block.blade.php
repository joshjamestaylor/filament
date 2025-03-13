<div class=" [ relative h-screen overflow-hidden ]"
style="background-color: {{ $block['data']['bg_color'] ?? '' }};">
    <div class="container mx-auto h-full">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center h-full">
            <div class="[ z-30 relative  px-6 ]
                @if ($block['data']['block_invert']) md:order-2 @else md:order-1 @endif"
                style="padding-top: calc((54vh - 100vw )/ -5); padding-bottom: calc((56vh - 100vw )/ -5);"
                >
                @if ($block['data']['block_title'])
                    <h1 class="text-4xl font-bold"
                        style="color: {{ $block['data']['accent_color'] ?? '' }};"
                    >{{ $block['data']['block_title'] }}</h1>
                @endif
                @if ($block['data']['block_subtitle'])
                    <p class="text-lg mt-4"
                        style="color: @if (isset($block['data']['text_color']) && $block['data']['text_color'] == 'dark') {{ $dark_color }} 
                        @elseif (isset($block['data']['text_color']) && $block['data']['text_color'] == 'light') {{ $light_color }} 
                        @endif"
                    >{{ $block['data']['block_subtitle'] }}</p>
                @endif

                @if (!empty($block['data']['block_content']) && is_array($block['data']['block_content']))
                    @foreach($block['data']['block_content'] as $content)
                        @if($content['block_content_type'] === 'text')
                            <div>{!! $content['block_content_text'] !!}</div>
                        @elseif($content['block_content_type'] === 'image')
                            <img src="{{ asset('storage/' . $content['block_content_image']) }}" alt="Block Image">
                        @elseif($content['block_content_type'] === 'button')
                            <livewire:button 
                            title="{{ $content['block_content_button_title'] }}" 
                            url="{{ $content['block_content_button_url'] }}"
                            bg_color="{{ $content['block_content_button_bg_color'] }}"
                            text_color="{{ $content['block_content_button_text_color'] }}"
                            />
                        @endif
                    @endforeach
                @endif
                
            </div>
            <div class="[ hero__image ] [ flex justify-center ]
                @if ($block['data']['block_invert']) md:order-1 @else md:order-2 @endif h-full @if ($block['data']['block_layout'] === 'image-boxed') relative @endif">
                @if ($block['data']['block_image'])
                    <img src="{{ asset('storage/' . $block['data']['block_image']) }}" alt="Block Image"
                    class="
                        max-w-full h-auto object-cover
                        @if ($block['data']['block_layout'] === 'image-background') md:absolute inset-0 w-full h-full object-cover opacity-50 
                        @elseif ($block['data']['block_layout'] === 'image-half') md:absolute top-0 md:w-1/2 h-full @if ($block['data']['block_invert']) left-0 @else right-0 @endif object-cover 
                        @elseif ($block['data']['block_layout'] === 'image-boxed') md:absolute max-lg-w top-0 h-full mx-auto 
                        @endif
                    ">
                @endif
            </div>
        </div>
    </div>
</div>
