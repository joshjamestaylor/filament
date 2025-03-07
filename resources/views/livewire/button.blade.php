<a href="{{ $url }}" class="block mt-3 w-fit hover:opacity-50">
    <div class="p-3"
         style="
            background-color: {{ $bg_color ?: ($dark_mode ? $light_color : $dark_color) }};
            color: {{ $text_color == 'dark' ? $dark_color : ($text_color == 'light' ? $light_color : ($dark_mode ? $dark_color : $light_color)) }};
         ">
        {{ $title }}
    </div>
</a>
