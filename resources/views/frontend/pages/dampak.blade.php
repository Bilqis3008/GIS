<x-layout title="Dampak" description="Capaian yang sudah berjalan dan rencana/target Yayasan Green Invite Sembilan, lengkap dengan sumbernya.">
    <section class="mx-auto max-w-[1200px] px-5 py-16">
        <p class="overline">Dampak</p>
        <h1 class="mt-2 max-w-3xl text-display-md text-ink">Dampak yang Terukur & Jujur</h1>
        <p class="mt-4 max-w-2xl text-body-lg text-body">GIS memisahkan dengan tegas antara capaian yang sudah berjalan dan rencana/target. Setiap angka disertai sumbernya.</p>
    </section>

    {{-- Realized --}}
    <section class="bg-surface-soft">
        <div class="mx-auto max-w-[1200px] px-5 py-24">
            <x-section-heading eyebrow="Sudah Berjalan" title="Capaian Aktual" />
            @if ($realizedStats->isEmpty())
                <p class="mt-6 text-body-md text-muted">Belum ada data capaian.</p>
            @else
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($realizedStats as $stat)
                        <x-impact-stat :stat="$stat" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Planned --}}
    <section class="mx-auto max-w-[1200px] px-5 py-24">
        <x-section-heading eyebrow="Rencana & Target" title="Kapasitas Rencana"
            intro="Angka berikut adalah rencana dan proyeksi — belum menjadi capaian. Ditampilkan terpisah agar tidak disalahartikan sebagai dampak terukur." />
        @if ($plannedStats->isEmpty())
            <p class="mt-6 text-body-md text-muted">Belum ada rencana yang dicatat.</p>
        @else
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($plannedStats as $stat)
                    <x-impact-stat :stat="$stat" />
                @endforeach
            </div>
        @endif
    </section>
</x-layout>
