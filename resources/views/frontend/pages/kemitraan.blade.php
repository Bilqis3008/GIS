<x-layout title="Kemitraan" description="Pintu kerja sama GIS untuk Korporasi (CSR/ESG), NGO, Perguruan Tinggi & Lembaga, serta Lembaga Pemerintah.">
    <section class="mx-auto max-w-[1200px] px-5 py-16">
        <p class="overline">Kemitraan &amp; Kolaborasi</p>
        <h1 class="mt-2 max-w-3xl text-display-md text-ink">Mari Berkolaborasi untuk Lingkungan</h1>
        <p class="mt-4 max-w-2xl text-body-lg text-body">GIS membuka pintu kerja sama yang transparan, terukur, dan berdampak positif bagi ekosistem dan masyarakat di Kabupaten Muara Enim dan sekitarnya.</p>
    </section>

    {{-- Kategori kemitraan --}}
    <section class="mx-auto max-w-[1200px] px-5 pb-16">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            {{-- 1. Korporasi --}}
            <div id="korporasi" class="card card-hover p-6 scroll-mt-24">
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-md bg-surface-soft text-forest">
                    @svg('heroicon-o-building-office-2', 'h-6 w-6')
                </span>
                <h2 class="mt-4 text-title-sm font-bold text-ink">Korporasi</h2>
                <p class="mt-2 text-body-md text-body">Salurkan program tanggung jawab sosial perusahaan (CSR &amp; ESG) ke dalam aksi pelestarian lingkungan yang terukur.</p>
            </div>

            {{-- 2. NGO --}}
            <div id="ngo" class="card card-hover p-6 scroll-mt-24">
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-md bg-surface-soft text-forest">
                    @svg('heroicon-o-globe-alt', 'h-6 w-6')
                </span>
                <h2 class="mt-4 text-title-sm font-bold text-ink">NGO</h2>
                <p class="mt-2 text-body-md text-body">Kolaborasi program riset ekologi, pengolahan limbah, dan kampanye konservasi bersama LSM &amp; organisasi non-pemerintah.</p>
            </div>

            {{-- 3. Perguruan Tinggi & Lembaga --}}
            <div id="perguruan-tinggi" class="card card-hover p-6 scroll-mt-24">
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-md bg-surface-soft text-forest">
                    @svg('heroicon-o-academic-cap', 'h-6 w-6')
                </span>
                <h2 class="mt-4 text-title-sm font-bold text-ink">Perguruan Tinggi &amp; Lembaga</h2>
                <p class="mt-2 text-body-md text-body">Riset akademis, pengabdian masyarakat, magang mahasiswa, dan pengkajian solusi isu iklim bersama akademisi.</p>
            </div>

            {{-- 4. Lembaga Pemerintah --}}
            <div id="pemerintah" class="card card-hover p-6 scroll-mt-24">
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-md bg-surface-soft text-forest">
                    @svg('heroicon-o-building-library', 'h-6 w-6')
                </span>
                <h2 class="mt-4 text-title-sm font-bold text-ink">Lembaga Pemerintah</h2>
                <p class="mt-2 text-body-md text-body">Sinergi kebijakan daerah, pendampingan masyarakat desa, dan fasilitasi pengelolaan lingkungan hidup lokal.</p>
            </div>
        </div>
    </section>

    {{-- Form --}}
    <section class="bg-surface-soft">
        <div class="mx-auto max-w-3xl px-5 py-24">
            <x-section-heading eyebrow="Ajukan" title="Formulir Kerja Sama"
                intro="Isi formulir berikut. Tim GIS akan segera menindaklanjuti pengajuan Anda." />
            <div class="mt-8">
                <x-contact-form defaultSubject="kemitraan_csr" />
            </div>
        </div>
    </section>
</x-layout>
