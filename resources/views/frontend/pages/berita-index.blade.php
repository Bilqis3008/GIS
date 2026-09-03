<x-layout title="Berita & Kegiatan" description="Berita, artikel, dan dokumentasi kegiatan Yayasan Green Invite Sembilan (GIS).">
    <section class="mx-auto max-w-[1200px] px-5 py-16">
        <p class="overline">Kabar</p>
        <h1 class="mt-2 text-display-md text-ink">Berita & Kegiatan</h1>
    </section>

    <section class="mx-auto max-w-[1200px] px-5 pb-24">
        @if ($activities->isEmpty())
            <p class="text-body-md text-muted">Belum ada kabar yang dipublikasikan.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($activities as $activity)
                    <x-activity-card :activity="$activity" />
                @endforeach
            </div>
            <div class="mt-10">{{ $activities->links() }}</div>
        @endif
    </section>
</x-layout>
