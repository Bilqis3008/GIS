@props(['stat'])

@php
    $realized = $stat->status === \App\Enums\ImpactStatus::Realized;
@endphp

<div @class([
    'flex flex-col rounded-lg p-7',
    'bg-surface-soft ring-1 ring-hairline' => $realized,
    'border border-dashed border-border-strong bg-canvas' => ! $realized,
])>
    <span @class(['badge-realized' => $realized, 'badge-planned' => ! $realized, 'w-fit'])>
        @if ($realized)
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        @endif
        {{ $stat->status->label() }}
    </span>

    <p @class([
        'mt-5 text-display-lg tracking-tight',
        'text-ink' => $realized,
        'text-muted' => ! $realized,
    ])>{{ $stat->value }}</p>

    <p class="mt-1 text-title-sm font-medium text-body">{{ $stat->label }}</p>

    @if ($stat->period)
        <p class="text-caption text-muted">{{ $stat->period }}</p>
    @endif

    @if ($stat->note || $stat->source_label)
        <p class="mt-4 border-t border-hairline pt-3 text-caption text-muted">
            {{ $stat->note }}
            @if ($stat->source_label)
                <span class="mt-1 block">Sumber:
                    @if ($stat->source_url)
                        <a href="{{ $stat->source_url }}" target="_blank" rel="noopener" class="text-link">{{ $stat->source_label }}</a>
                    @else
                        {{ $stat->source_label }}
                    @endif
                </span>
            @endif
        </p>
    @endif
</div>
