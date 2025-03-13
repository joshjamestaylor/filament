
@if ($url)
<a href="{{ $url }}" class="mt-3 inline-block w-fit hover:opacity-50">
    <div class="p-3"
         style="
            background-color: {{ $bg_color ?: ($dark_mode ? $light_color : $dark_color) }};
            color: {{ $text_color == 'dark' ? $dark_color : ($text_color == 'light' ? $light_color : ($dark_mode ? $dark_color : $light_color)) }};
         ">
        {{ $title }}
    </div>
</a>
@else
<button type="submit" class="mt-3 inline-block w-fit hover:opacity-50">
    <div class="p-3"
         style="
            background-color: {{ $bg_color ?: ($dark_mode ? $light_color : $dark_color) }};
            color: {{ $text_color == 'dark' ? $dark_color : ($text_color == 'light' ? $light_color : ($dark_mode ? $dark_color : $light_color)) }};
         ">
        {{ $title }}
    </div>
</button>
@endif
