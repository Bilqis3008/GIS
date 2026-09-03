@php
    $cover = $activity->getFirstMediaUrl('cover', 'large');
    $date = $activity->published_at ?? $activity->created_at;
@endphp

<x-layout :title="$activity->title" :description="$activity->excerpt" :ogImage="$cover ?: null">
    <article class="mx-auto max-w-3xl px-5 py-16">
        <a href="{{ route('berita.index') }}" class="text-body-md text-link">← Semua Berita</a>
        <div class="mt-4 flex items-center gap-3">
            <span class="badge-category">{{ $activity->type->label() }}</span>
            <span class="text-caption text-muted">{{ $date?->translatedFormat('d F Y') }}</span>
        </div>
        <h1 class="mt-3 text-display-md text-ink">{{ $activity->title }}</h1>

        @if ($cover)
            <img src="{{ $cover }}" alt="{{ $activity->title }}" class="mt-8 w-full rounded-lg object-cover">
        @endif

        @if ($activity->body)
            <div class="prose-gis mt-8">{!! $activity->body !!}</div>
        @endif

        {{-- Galeri dokumentasi --}}
        @if ($gallery->isNotEmpty())
            <h2 class="mt-12 text-title-md text-ink">Galeri Dokumentasi</h2>
            <div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                @foreach ($gallery as $photo)
                    <a href="{{ $photo->getUrl() }}" target="_blank" rel="noopener">
                        <img src="{{ $photo->getUrl('thumb') }}" alt="{{ $photo->name ?: $activity->title }}"
                             class="aspect-[3/2] w-full rounded-sm object-cover" loading="lazy">
                    </a>
                @endforeach
            </div>
        @endif
    </article>

    @if ($latest->isNotEmpty())
        <section class="mx-auto max-w-[1200px] px-5 py-16">
            <h2 class="text-title-lg text-ink">Kabar Lainnya</h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($latest as $other)
                    <x-activity-card :activity="$other" />
                @endforeach
            </div>
        </section>
    @endif
</x-layout>
