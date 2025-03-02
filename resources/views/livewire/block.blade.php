<div class=" [ relative h-screen ]"
style="background-color: {{ $block['data']['bg_color'] ?? '' }};">
    <div class="container mx-auto h-full">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center h-full">
            <div class="[ hero__copy ] [ z-30 relative text-center md:text-left px-6 ]
                @if ($block['data']['block_invert']) md:order-2 @else md:order-1 @endif">
                @if ($block['data']['block_title'])
                    <h1 class="text-4xl font-bold"
                        style="color: {{ $block['data']['accent_color'] ?? '' }};"
                    >{{ $block['data']['block_title'] }}</h1>
                @endif
                @if ($block['data']['block_description'])
                    <p class="text-lg mt-4"
                        style="color: @if (isset($block['data']['text_color']) && $block['data']['text_color'] == 'dark') {{ $dark_color }} 
        @elseif (isset($block['data']['text_color']) && $block['data']['text_color'] == 'light') {{ $light_color }} 
        @endif"
                    >{{ $block['data']['block_description'] }}</p>
                @endif
            </div>
            <div class="[ hero__image ] [ flex justify-center ]
                @if ($block['data']['block_invert']) md:order-1 @else md:order-2 @endif">
                @if ($block['data']['block_image'])
                    <img src="{{ asset('storage/' . $block['data']['block_image']) }}" alt="Block Image"
                    class="
                        max-w-full h-auto object-cover
                        @if ($block['data']['block_layout'] === 'image-background') absolute inset-0 w-full h-full object-cover opacity-50
                        @elseif ($block['data']['block_layout'] === 'image-half') absolute top-0 w-1/2 h-full @if ($block['data']['block_invert']) left-0 @else right-0 @endif object-cover
                        @elseif ($block['data']['block_layout'] === 'image-boxed') max-w-lg mx-auto 
                        @endif
                    ">
                @endif
            </div>
        </div>
    </div>
</div>
