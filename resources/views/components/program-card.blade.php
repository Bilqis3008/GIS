@props(['program'])

@php
    $cover = $program->getFirstMediaUrl('cover', 'thumb');
@endphp

<article class="card card-hover group flex flex-col overflow-hidden">
    {{-- Media area: image when available, branded icon panel otherwise (same aspect → cards align) --}}
    <a href="{{ route('program.show', $program) }}" class="block aspect-[16/10] overflow-hidden bg-surface-soft">
        @if ($cover)
            <img src="{{ $cover }}" alt="{{ $program->title }}"
                 class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-[1.03]" loading="lazy">
        @else
            <span class="relative flex h-full w-full items-center justify-center bg-linear-to-br from-surface-soft via-mint to-lime-tint">
                <span class="pointer-events-none absolute -right-6 -top-6 h-24 w-24 rounded-full bg-white/40"></span>
                <span class="relative flex h-16 w-16 items-center justify-center rounded-xl bg-canvas text-forest shadow-sm ring-1 ring-hairline">
                    @svg($program->icon ?: 'heroicon-o-rectangle-stack', 'h-8 w-8')
                </span>
            </span>
        @endif
    </a>

    <div class="flex flex-1 flex-col p-6">
        <h3 class="text-title-sm text-ink">
            <a href="{{ route('program.show', $program) }}" class="transition-colors group-hover:text-forest">{{ $program->title }}</a>
        </h3>
        <p class="mt-2 line-clamp-3 flex-1 text-body-md text-body">{{ $program->summary }}</p>

        <a href="{{ route('program.show', $program) }}" class="mt-5 inline-flex items-center gap-1.5 text-body-md font-medium text-link">
            Selengkapnya
            <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
</article>
