<!-- resources/views/livewire/navigation.blade.php -->

<nav class="bg-black text-white fixed top-0 left-0 w-full z-40">
  <div class="container mx-auto px-4 md:flex justify-between items-center gap-6">
    <!-- Logo -->
    <div class="flex items-center justify-between md:w-auto w-full">
      <a href="{{ route('home') }}" class="py-5 px-2 text-white flex-1 font-bold">{{ $site_name }}</a>
      <!-- mobile menu icon -->
      <div class="md:hidden flex items-center">
        <button type="button" class="mobile-menu-button">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
          </svg>
        </button>
      </div>
    </div>

    <div class="hidden md:flex md:flex-row flex-col items-center justify-start md:space-x-1 pb-3 md:pb-0 navigation-menu">
      <!-- Loop through pages -->
      @foreach ($pages as $page)
      @if ($page->slug)
      <a href="{{ route('page.show', $page->slug) }}" class="py-2 px-3 hover:bg-sky-800 flex items-center gap-2 rounded">
          {{ $page->title }}
        </a>
        @endif
      @endforeach
    </div>
  </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", () => {
  // Select all dropdown toggle buttons
  const dropdownToggles = document.querySelectorAll(".dropdown-toggle")
  const mobileMenuButton = document.querySelector('.mobile-menu-button')
  const mobileMenu = document.querySelector('.navigation-menu')

  dropdownToggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const dropdownMenu = toggle.nextElementSibling
      if (dropdownMenu.classList.contains("hidden")) {
        document.querySelectorAll(".dropdown-menu").forEach((menu) => {
          menu.classList.add("hidden")
        })

        dropdownMenu.classList.remove("hidden")
      } else {
        dropdownMenu.classList.add("hidden")
      }
    })
  })

  window.addEventListener("click", function (e) {
    if (!e.target.matches(".dropdown-toggle")) {
      document.querySelectorAll(".dropdown-menu").forEach((menu) => {
        if (!menu.contains(e.target)) {
          menu.classList.add("hidden")
        }
      })
    }
  })

  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden')
  })
  
})
</script>
