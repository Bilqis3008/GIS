@props([
    'title' => null,
    'ctaLabel' => null,
    'ctaUrl' => null,
])

<div class="flex flex-col items-start gap-6 rounded-lg bg-surface-strong p-10 md:flex-row md:items-center md:justify-between md:p-12">
    <h2 class="text-display-md text-ink">{{ $title }}{{ $slot }}</h2>
    @if ($ctaLabel && $ctaUrl)
        <a href="{{ $ctaUrl }}" class="btn-primary shrink-0">{{ $ctaLabel }}</a>
    @endif
</div>
