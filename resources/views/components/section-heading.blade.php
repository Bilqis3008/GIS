@props([
    'eyebrow' => null,
    'title' => null,
    'intro' => null,
    'align' => 'left', // left|center
])

<div @class(['max-w-2xl', 'mx-auto text-center' => $align === 'center'])>
    @if ($eyebrow)
        <p class="overline">{{ $eyebrow }}</p>
    @endif
    @if ($title)
        <h2 class="mt-2 text-display-md text-ink">{{ $title }}</h2>
    @endif
    @if ($intro)
        <p class="mt-4 text-body-lg text-body">{{ $intro }}</p>
    @endif
    {{ $slot }}
</div>
