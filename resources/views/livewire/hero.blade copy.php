<div class="[ hero ] [ relative h-screen ]">

    <div class="[ hero__copy ] [ z-30 relative ]">
        @if ($heroTitle)
            <h1 class="text-4xl">{{ $heroTitle }}</h1>
        @endif
        @if ($heroSubtitle)
            <p class="text-lg mt-4">{{ $heroSubtitle }}</p>
        @endif

    </div>
    <div class="[ hero__image ]">
        @if ($heroImage)
            <img src="{{ asset('storage/' . $heroImage) }}" alt="Hero Image" class="absolute inset-0 w-full h-full object-cover opacity-50">
        @endif
    </div>
    
</div>
