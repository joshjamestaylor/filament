<a href="{{ $url }}"
>
    <div class="mt-3 p-3 w-fit hover:opacity-50"
    style="
      @if ( $dark_mode )
          background-color: {{ $light_color }};
          color: {{ $dark_color }};
      @else
          background-color: {{ $dark_color }};
          color: {{ $light_color }};
      @endif
      @if ( $bg_color )
          background-color: {{ $bg_color }};
      @endif
      @if ( $text_color == 'dark' )
        color: {{ $dark_color }};
      @elseif ( $text_color == 'light' )
        color: {{ $light_color }};
      @endif
   ">
        {{ $title }}
    </div>
</a>
