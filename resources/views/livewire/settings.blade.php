<div>
    <style>
        @if(!empty($custom_font))
            {!! $custom_font !!}
        @endif

        @php
            $fontName = strtolower(str_replace(' ', '-', $selected_font));
        @endphp

        @font-face {
            font-family: '{{ $selected_font }}';
            src: url('{{ asset("storage/fonts/" . $fontName . ".woff2") }}') format('woff2'),
                 url('{{ asset("storage/fonts/" . $fontName . ".woff") }}') format('woff'),
                 url('{{ asset("storage/fonts/" . $fontName . ".ttf") }}') format('truetype');
        }

        body {
            font-family: '{{ $selected_font }}', sans-serif;
        }
    </style>
</div>
