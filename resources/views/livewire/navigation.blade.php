<nav class="fixed top-0 left-0 w-full z-40" 
    style="
    @if ($dark_mode)
        background: linear-gradient(to bottom, {{ $dark_color }} 0%, transparent 100%);
        color: {{ $light_color }};
    @else
        background: linear-gradient(to bottom, {{ $light_color }} 0%, transparent 100%);
        color: {{ $dark_color }};
    @endif
    ">
  <div class="container mx-auto px-4 md:flex justify-between items-center gap-6">
    <!-- Logo -->
    <div class="flex items-center justify-between md:w-auto w-full">
      <a href="{{ route('home') }}" class="py-5 px-2 flex-1 font-bold">
        @if ($site_logo)
        <img src="{{ asset('storage/' . $site_logo) }}" alt="{{ $site_name }} Logo">
        @else
        {{ $site_name }}
        @endif
      </a>
      <!-- mobile menu icon -->
      <div class="md:hidden flex items-center">
      <button type="button" wire:click="toggleMobileMenu" class="relative w-6 h-6">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transition-all duration-300 ease-in-out">
          <path class="transition-all duration-300 ease-in-out origin-top {{ $isMobileMenuOpen ? 'rotate-45 translate-y-2' : '' }}" d="M1.5 5.5h21.5" />
          <path class="transition-all duration-300 ease-in-out {{ $isMobileMenuOpen ? 'opacity-0' : 'opacity-100' }}" d="M1.5 12h21.5" />
          <path class="transition-all duration-300 ease-in-out origin-bottom {{ $isMobileMenuOpen ? '-rotate-45 -translate-y-2' : '' }}" d="M1.5 18.5h21.5" />
        </svg>

</button>

      </div>
    </div>

    <!-- Navigation menu -->
    <div class="{{ $isMobileMenuOpen ? 'block' : 'hidden' }} md:flex md:flex-row flex-col items-center justify-start md:space-x-1 pb-3 md:pb-0">
      @foreach ($pages as $page)
      @if ($page->slug)
      <div class="relative">
        <a href="{{ route('page.show', $page->slug) }}" class="py-2 px-3 hover:opacity-50 flex items-center gap-2" wire:click="toggleDropdown('{{ $page->slug }}')">
          {{ $page->title }}
        </a>

      </div>
      @endif
      @endforeach
    </div>
  </div>
</nav>
