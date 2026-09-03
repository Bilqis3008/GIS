@props(['activity'])

@php
    $cover = $activity->getFirstMediaUrl('cover', 'thumb');
    $date = $activity->published_at ?? $activity->created_at;
@endphp

<article class="card card-hover group flex flex-col overflow-hidden">
    <a href="{{ route('berita.show', $activity) }}" class="block aspect-video overflow-hidden bg-surface-soft">
        @if ($cover)
            <img src="{{ $cover }}" alt="{{ $activity->title }}" class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.03]" loading="lazy">
        @else
            <span class="relative flex h-full w-full items-center justify-center bg-linear-to-br from-surface-soft via-mint to-lime-tint">
                <span class="pointer-events-none absolute -left-6 -bottom-6 h-24 w-24 rounded-full bg-white/40"></span>
                <span class="relative flex h-14 w-14 items-center justify-center rounded-xl bg-canvas text-forest shadow-sm ring-1 ring-hairline">
                    @svg('heroicon-o-newspaper', 'h-7 w-7')
                </span>
            </span>
        @endif
    </a>
    <div class="flex flex-1 flex-col p-5">
        <div class="flex items-center gap-3">
            <span class="badge-category">{{ $activity->type->label() }}</span>
            <span class="text-caption text-muted">{{ $date?->translatedFormat('d M Y') }}</span>
        </div>
        <h3 class="mt-3 text-title-sm text-ink">
            <a href="{{ route('berita.show', $activity) }}" class="transition-colors group-hover:text-forest">{{ $activity->title }}</a>
        </h3>
        @if ($activity->excerpt)
            <p class="mt-2 line-clamp-2 flex-1 text-body-md text-body">{{ $activity->excerpt }}</p>
        @endif
    </div>
</article>
