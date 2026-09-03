<x-layout transparent-nav>
    <x-slot:head>
        @php
            $schema = [
                '@context' => 'https://schema.org',
                '@type' => 'NGO',
                'name' => 'Yayasan Green Invite Sembilan',
                'alternateName' => 'GIS',
                'url' => url('/'),
                'logo' => asset('logo_gis9.png'),
                'description' => 'Lembaga lingkungan berbasis kolaborasi di Kabupaten Muara Enim, Sumatera Selatan.',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressLocality' => 'Muara Enim',
                    'addressRegion' => 'Sumatera Selatan',
                    'addressCountry' => 'ID',
                ],
            ];
            $heroTitle = $site['hero_title'] ?? 'Aksi Nyata untuk Lingkungan Berkelanjutan';
            $titleMain = \Illuminate\Support\Str::beforeLast($heroTitle, ' ');
            $titleAccent = \Illuminate\Support\Str::afterLast($heroTitle, ' ');
            $lead = $realizedStats->first();
        @endphp
        <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    </x-slot:head>

    {{-- 1. HERO — dramatic full-bleed dark with field photo --}}
    <section class="relative isolate overflow-hidden bg-surface-dark text-white">
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('images/hero-leaf.jpg') }}"
                 alt="Daun hijau dengan tetesan embun — simbol kerja lingkungan GIS"
                 class="h-full w-full object-cover object-center lg:object-right"
                 fetchpriority="high">
            {{-- mobile: darken all; desktop: fade dark from left so text stays legible --}}
            <div class="absolute inset-0 bg-surface-dark/80 lg:hidden"></div>
            <div class="absolute inset-0 hidden lg:block" style="background:linear-gradient(90deg,var(--color-surface-dark) 0%,var(--color-surface-dark) 34%,color-mix(in srgb,var(--color-surface-dark) 75%,transparent) 52%,transparent 78%)"></div>
        </div>

        <div class="mx-auto max-w-[1200px] px-5 py-24 lg:py-32">
            <div class="max-w-2xl">
                <p class="inline-flex items-center gap-2.5 text-overline uppercase text-accent-lime before:h-px before:w-7 before:bg-accent-lime before:content-['']">Yayasan Green Invite Sembilan</p>

                <h1 class="mt-6 font-bold tracking-tight text-white text-[2.75rem] leading-[1.03] sm:text-[3.5rem] lg:text-[4.25rem]">
                    {{ $titleMain }} <span class="text-accent-lime">{{ $titleAccent }}</span>
                </h1>

                <p class="mt-6 max-w-xl text-body-lg text-white/80">{{ $site['hero_subtitle'] ?? '' }}</p>

                <div class="mt-9 flex flex-wrap gap-3">
                    <a href="{{ route('program.index') }}" class="btn-lime">
                        Jelajahi Program
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('dampak') }}" class="btn-ghost-light">Lihat Dampak</a>
                </div>

                {{-- Trust strip — proof + legitimacy --}}
                <dl class="mt-14 flex flex-wrap items-center gap-x-10 gap-y-5 border-t border-white/15 pt-7">
                    @if ($lead)
                        <div>
                            <dt class="text-[1.75rem] font-semibold leading-none text-white">{{ $lead->value }}</dt>
                            <dd class="mt-1.5 text-caption text-white/70">{{ $lead->label }}@if ($lead->period) · {{ $lead->period }}@endif</dd>
                        </div>
                        <span class="hidden h-9 w-px bg-white/15 sm:block"></span>
                    @endif
                    <div>
                        <dt class="text-[1.75rem] font-semibold leading-none text-white">2023</dt>
                        <dd class="mt-1.5 text-caption text-white/70">Berbadan hukum</dd>
                    </div>
                    <span class="hidden h-9 w-px bg-white/15 sm:block"></span>
                    <div>
                        <dt class="text-title-sm font-medium text-white">KADIN Muara Enim</dt>
                        <dd class="mt-1.5 text-caption text-white/70">Inisiator yayasan</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    {{-- 2. BRAND BRIDGE --}}
    @if ($bridge = ($site['brand_bridge'] ?? null))
        <section class="border-y border-hairline bg-surface-soft">
            <div class="mx-auto flex max-w-[1000px] items-center justify-center gap-4 px-5 py-6 text-center">
                <p class="text-body-md text-body"><span class="font-semibold text-ink">GIS</span> {{ \Illuminate\Support\Str::after($bridge, 'GIS ') }}</p>
            </div>
        </section>
    @endif

    {{-- 3. PROBLEM STATEMENT --}}
    <section class="mx-auto max-w-[1200px] px-5 py-20 lg:py-24">
        <div class="grid gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">
            <p class="overline">Tantangan</p>
            <p class="max-w-2xl text-title-lg leading-snug text-ink">{{ $site['problem_statement'] ?? '' }}</p>
        </div>
    </section>

    {{-- 4. PROGRAM UNGGULAN --}}
    @if ($programs->isNotEmpty())
        <section class="mx-auto max-w-[1200px] px-5 pb-8">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <x-section-heading eyebrow="Program" title="Program Unggulan"
                    intro="Aksi lapangan dan edukasi yang dijalankan GIS di Kabupaten Muara Enim." />
                <a href="{{ route('program.index') }}" class="hidden shrink-0 items-center gap-1.5 text-body-md font-medium text-link sm:inline-flex">Semua program →</a>
            </div>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($programs as $program)
                    <x-program-card :program="$program" />
                @endforeach
            </div>
        </section>
    @endif

    {{-- 5. SIGNATURE BAND — forest + ocean two-up --}}
    <section class="mx-auto max-w-[1200px] px-5 py-16 lg:py-20">
        <div class="grid gap-6 md:grid-cols-2">
            <x-signature-card color="forest" eyebrow="Bukti Kerja"
                title="Sampah jadi kompos, bukan sekadar wacana"
                ctaLabel="Lihat Dampak" :ctaUrl="route('dampak')">
                Lewat Green Urban Tani, sampah organik diolah menjadi kompos bernilai guna — program yang sudah berjalan di lapangan.
            </x-signature-card>
            <x-signature-card color="ocean" eyebrow="Kolaborasi"
                title="Limbah industri jadi material berguna"
                ctaLabel="Pelajari Program" :ctaUrl="route('program.index')">
                Pemanfaatan FABA menjadi batako dan paving block — menyiapkan kapasitas produksi bersama mitra dunia usaha.
            </x-signature-card>
        </div>
    </section>

    {{-- 6. DAMPAK (realized only — R1) --}}
    @if ($realizedStats->isNotEmpty())
        <section class="bg-surface-soft">
            <div class="mx-auto max-w-[1200px] px-5 py-20 lg:py-24">
                <x-section-heading eyebrow="Dampak" title="Hasil yang Sudah Berjalan"
                    intro="Angka di bawah ini adalah capaian aktual program GIS, bukan proyeksi." />
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($realizedStats as $stat)
                        <x-impact-stat :stat="$stat" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 7. RENCANA & TARGET (planned — labeled, separate) --}}
    @if ($plannedStats->isNotEmpty())
        <section class="mx-auto max-w-[1200px] px-5 py-20 lg:py-24">
            <x-section-heading eyebrow="Rencana & Target" title="Kapasitas Rencana"
                intro="Angka berikut adalah rencana dan proyeksi kapasitas — belum menjadi capaian. Ditampilkan terpisah demi kejujuran data." />
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($plannedStats as $stat)
                    <x-impact-stat :stat="$stat" />
                @endforeach
            </div>
        </section>
    @endif

    {{-- 8. KOLABORASI --}}
    @if ($partners->isNotEmpty())
        <section class="border-y border-hairline bg-canvas">
            <div class="mx-auto max-w-[1200px] px-5 py-16 lg:py-20">
                <x-section-heading eyebrow="Kolaborasi" title="Mitra Kerja Sama" />
                <div class="mt-10 grid gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach (\App\Enums\PartnerCategory::cases() as $cat)
                        @if ($group = ($partners[$cat->value] ?? null))
                            <div>
                                <p class="overline">{{ $cat->label() }}</p>
                                <ul class="mt-4 space-y-2.5">
                                    @foreach ($group as $partner)
                                        <li class="text-body-md text-body">{{ $partner->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- 9. BERITA TERBARU --}}
    @if ($activities->isNotEmpty())
        <section class="mx-auto max-w-[1200px] px-5 py-20 lg:py-24">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <x-section-heading eyebrow="Kabar Terbaru" title="Berita & Kegiatan" />
                <a href="{{ route('berita.index') }}" class="hidden shrink-0 items-center gap-1.5 text-body-md font-medium text-link sm:inline-flex">Lihat semua →</a>
            </div>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($activities as $activity)
                    <x-activity-card :activity="$activity" />
                @endforeach
            </div>
        </section>
    @endif

    {{-- 10. CTA DARK --}}
    <section class="mx-auto max-w-[1200px] px-5 pb-24">
        <x-signature-card color="dark"
            title="Ingin menjalankan program lingkungan bersama GIS?"
            ctaLabel="Ajukan Kerja Sama" :ctaUrl="route('kemitraan')">
            Kami terbuka untuk kemitraan CSR/ESG, kerja sama pemerintah, dan kolaborasi kampus.
        </x-signature-card>
    </section>
</x-layout>
