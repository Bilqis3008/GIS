@props([
    'color' => 'forest', // forest|ocean|dark
    'eyebrow' => null,
    'title' => null,
    'ctaLabel' => null,
    'ctaUrl' => null,
])

@php
    $bg = match ($color) {
        'ocean' => 'bg-ocean',
        'dark' => 'bg-surface-dark',
        default => 'bg-forest',
    };
@endphp

<div class="relative flex h-full flex-col justify-between gap-8 overflow-hidden rounded-lg {{ $bg }} p-10 text-white md:p-12">
    {{-- faint corner flourish for depth (not a gradient wash) --}}
    <div class="pointer-events-none absolute -right-16 -top-16 h-56 w-56 rounded-full bg-white/5" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -bottom-20 -left-10 h-48 w-48 rounded-full bg-white/5" aria-hidden="true"></div>

    <div class="relative">
        @if ($eyebrow)
            <p class="inline-flex items-center gap-2.5 text-overline uppercase text-white/70 before:h-px before:w-7 before:bg-accent-lime before:content-['']">{{ $eyebrow }}</p>
        @endif
        @if ($title)
            <h2 class="mt-4 max-w-md text-display-md text-white">{{ $title }}</h2>
        @endif
        @if ($slot->isNotEmpty())
            <div class="mt-4 max-w-md text-body-md leading-relaxed text-white/85">{{ $slot }}</div>
        @endif
    </div>
    @if ($ctaLabel && $ctaUrl)
        <a href="{{ $ctaUrl }}" class="btn-on-dark relative w-fit">
            {{ $ctaLabel }}
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </a>
    @endif
</div>
