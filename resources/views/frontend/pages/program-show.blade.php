@php $cover = $program->getFirstMediaUrl('cover', 'large'); @endphp

<x-layout :title="$program->title" :description="$program->summary"
          :ogImage="$cover ?: null">
    <article class="mx-auto max-w-3xl px-5 py-16">
        <a href="{{ route('program.index') }}" class="text-body-md text-link">← Semua Program</a>
        <h1 class="mt-4 text-display-md text-ink">{{ $program->title }}</h1>
        <p class="mt-4 text-body-lg text-body">{{ $program->summary }}</p>

        @if ($cover)
            <img src="{{ $cover }}" alt="{{ $program->title }}" class="mt-8 w-full rounded-lg object-cover">
        @endif

        @if ($program->body)
            <div class="prose-gis mt-8">{!! $program->body !!}</div>
        @endif
    </article>

    @if ($others->isNotEmpty())
        <section class="mx-auto max-w-[1200px] px-5 py-16">
            <h2 class="text-title-lg text-ink">Program Lainnya</h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($others as $other)
                    <x-program-card :program="$other" />
                @endforeach
            </div>
        </section>
    @endif

    <section class="mx-auto max-w-[1200px] px-5 pb-24">
        <x-cta-band title="Tertarik mendukung program ini?"
            ctaLabel="Ajukan Kerja Sama" :ctaUrl="route('kemitraan')" />
    </section>
</x-layout>
