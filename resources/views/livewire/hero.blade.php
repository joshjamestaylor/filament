<div class="[ hero ] [ relative h-screen ]">
    <div class="container mx-auto h-full">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center h-full">
            <div class="[ hero__copy ] [ z-30 relative text-center md:text-left px-6 ]
                @if ($heroInvert) md:order-2 @else md:order-1 @endif">
                @if ($heroTitle)
                    <h1 class="text-4xl font-bold">{{ $heroTitle }}</h1>
                @endif
                @if ($heroSubtitle)
                    <p class="text-lg mt-4">{{ $heroSubtitle }}</p>
                @endif
            </div>
            <div class="[ hero__image ] [ flex justify-center ]
                @if ($heroInvert) md:order-1 @else md:order-2 @endif">
                @if ($heroImage)
                    <img src="{{ asset('storage/' . $heroImage) }}" alt="Hero Image"
                    class="
                        max-w-full h-auto object-cover
                        @if ($heroLayout === 'image-background') absolute inset-0 w-full h-full object-cover opacity-50
                        @elseif ($heroLayout === 'image-half') absolute top-0 w-1/2 h-full @if ($heroInvert) left-0 @else right-0 @endif object-cover
                        @elseif ($heroLayout === 'image-boxed') max-w-lg mx-auto 
                        @endif
                    ">
                @endif
            </div>
        </div>
    </div>
</div>
