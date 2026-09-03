<x-layout title="Program" description="Program kerja Yayasan Green Invite Sembilan: pengelolaan sampah, pemanfaatan limbah, budidaya kelor, dan edukasi iklim.">
    <section class="mx-auto max-w-[1200px] px-5 py-16">
        <p class="overline">Program</p>
        <h1 class="mt-2 max-w-3xl text-display-md text-ink">Program Kerja GIS</h1>
        <p class="mt-4 max-w-2xl text-body-lg text-body">Aksi lapangan dan edukasi yang dijalankan GIS di Kabupaten Muara Enim.</p>
    </section>

    <section class="mx-auto max-w-[1200px] px-5 pb-24">
        @if ($programs->isEmpty())
            <p class="text-body-md text-muted">Belum ada program yang dipublikasikan.</p>
        @else
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($programs as $program)
                    <x-program-card :program="$program" />
                @endforeach
            </div>
        @endif
    </section>

    <section class="mx-auto max-w-[1200px] px-5 pb-24">
        <x-cta-band title="Punya program lingkungan untuk dijalankan bersama?"
            ctaLabel="Ajukan Kerja Sama" :ctaUrl="route('kemitraan')" />
    </section>
</x-layout>
