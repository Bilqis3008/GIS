<x-layout title="Aksi Konservasi" description="Program dan aksi konservasi GIS meliputi Kehutanan, Pertanian, Perkebunan, Perubahan Iklim, Advokasi Kebijakan, Biodiversity Warriors, Investasi Hijau, ESI, dan Karbon Trading.">
    {{-- Header --}}
    <section class="mx-auto max-w-[1200px] px-5 py-16">
        <p class="overline">Konservasi &amp; Aksi Nyata</p>
        <h1 class="mt-2 max-w-3xl text-display-md text-ink">Inisiatif Konservasi GIS</h1>
        <p class="mt-4 max-w-2xl text-body-lg text-body">
            Inisiatif strategis Yayasan Green Invite Sembilan untuk keberlanjutan ekosistem, perlindungan hayati, pemberdayaan ekonomi hijau, dan mitigasi iklim.
        </p>
    </section>

    {{-- Grid Konservasi & Aksi --}}
    <section class="relative py-24 bg-zinc-900 overflow-hidden font-sans">
        <!-- Ornamen Background Section -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?q=80&w=1920&auto=format&fit=crop')] bg-cover bg-center bg-fixed opacity-10 blur-sm pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-zinc-900/80 via-zinc-900 to-zinc-900/90 pointer-events-none"></div>

        <div class="relative z-10 container mx-auto px-4 md:px-8 max-w-[1200px]">
            
            <!-- Grid Cards 3x3 -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                
                <!-- KARTU 1: Kehutanan -->
                <a href="{{ route('aksi.detail', ['slug' => 'kehutanan']) }}" id="kehutanan" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1511497584788-876760111969?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Konservasi & Restorasi</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Jaga Rimba Muara Enim</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Berfokus pada pelindungan kawasan hutan dan penanaman pohon endemik khas Sumatera Selatan. Melalui skema perhutanan sosial, kami memberdayakan masyarakat agar mampu menjaga ekosistem sekaligus memajukan kesejahteraan lokal.
                        </p>
                    </div>
                </a>

                <!-- KARTU 2: Pertanian -->
                <a href="{{ route('aksi.detail', ['slug' => 'pertanian']) }}" id="pertanian" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Pertanian Berkelanjutan</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Tani Organik Bumi Sriwijaya</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Mendorong praktik pertanian ramah lingkungan dan organik bagi para petani lokal di Muara Enim. Kami terus mengedukasi pengurangan bahan kimia berbahaya demi menjaga kesuburan lahan dalam jangka panjang.
                        </p>
                    </div>
                </a>

                <!-- KARTU 3: Perkebunan -->
                <a href="{{ route('aksi.detail', ['slug' => 'perkebunan']) }}" id="perkebunan" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1590494435555-d3c267807d9f?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Agrikultur Bijak</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Harmoni Kebun Sumsel</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Menerapkan metode ketahanan agrikultur yang berkelanjutan pada sektor persawitan dan perkebunan di Sumatera Selatan. Pemanfaatan lahan dilakukan secara bijaksana untuk meminimalisasi deforestasi.
                        </p>
                    </div>
                </a>

                <!-- KARTU 4: Perubahan Iklim -->
                <a href="{{ route('aksi.detail', ['slug' => 'perubahan-iklim']) }}" id="perubahan-iklim" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Mitigasi & Adaptasi</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Aksi Iklim Tapak Bumi</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Terjun langsung ke wilayah pedesaan untuk menghadapi dampak pemanasan global di area rentan Muara Enim. Kami membangun ketangguhan masyarakat melalui edukasi adaptasi dan mitigasi iklim yang terukur.
                        </p>
                    </div>
                </a>

                <!-- KARTU 5: Advokasi Kebijakan -->
                <a href="{{ route('aksi.detail', ['slug' => 'advokasi-kebijakan']) }}" id="advokasi-kebijakan" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Kawal Regulasi Hijau</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Kemitraan Kebijakan Ekologis</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Bersinergi aktif bersama Pemerintah Daerah Muara Enim dan Provinsi untuk mengawal regulasi lingkungan. Kami memfasilitasi dialog publik demi melahirkan kebijakan inklusif yang pro-kelestarian alam.
                        </p>
                    </div>
                </a>

                <!-- KARTU 6: Biodiversity Warriors -->
                <a href="{{ route('aksi.detail', ['slug' => 'biodiversity-warriors']) }}" id="biodiversity-warriors" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1601662528567-526cd06f6582?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Pelibatan Pemuda</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Laskar Konservasi Swarnadwipa</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Menggandeng generasi muda dan relawan lokal dalam aksi nyata melindungi flora dan fauna endemik Sumatera Selatan. Kami yakin energi pemuda adalah garda terdepan perlindungan keanekaragaman hayati.
                        </p>
                    </div>
                </a>

                <!-- KARTU 7: Investasi Hijau -->
                <a href="{{ route('aksi.detail', ['slug' => 'investasi-hijau']) }}" id="investasi-hijau" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1618044733300-9472054094ee?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Pendanaan Ramah Lingkungan</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Katalis Bisnis Berkelanjutan</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Mengembangkan skema pendanaan inovatif yang mendukung operasional UMKM dan bisnis berwawasan lingkungan. Kami menjembatani aliran investasi hijau yang menghidupkan ekonomi sirkular masyarakat.
                        </p>
                    </div>
                </a>

                <!-- KARTU 8: ESI -->
                <a href="{{ route('aksi.detail', ['slug' => 'esi']) }}" id="esi" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Penilaian Diferensial</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Indeks Sosial Lingkungan (ESI)</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Menghadirkan parameter ukur untuk menilai efektivitas sosial dan ekologis dari setiap inisiatif keberlanjutan. Data ESI yang transparan ini menjadi acuan presisi tata ruang dan pembangunan di Sumatera Selatan.
                        </p>
                    </div>
                </a>

                <!-- KARTU 9: Karbon Trading -->
                <a href="{{ route('aksi.detail', ['slug' => 'karbon-trading']) }}" id="karbon-trading" class="relative block overflow-hidden group rounded-2xl bg-zinc-800 shadow-2xl min-h-[400px] flex flex-col justify-end p-6 md:p-8 cursor-pointer border border-white/5 scroll-mt-24">
                    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=800&auto=format&fit=crop')] bg-cover bg-center transition-transform duration-700 ease-out group-hover:scale-110"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent transition-opacity duration-500 opacity-90 group-hover:opacity-100"></div>
                    <div class="relative z-10 translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <span class="inline-block py-1.5 px-3 rounded-md bg-emerald-600/90 text-white text-xs font-bold uppercase tracking-wider mb-4 border border-emerald-500/30 backdrop-blur-sm">Nilai Ekonomi Karbon</span>
                        <h3 class="text-2xl font-bold text-white mb-2 leading-snug">Potensi Hutan & Gambut Sumsel</h3>
                        <p class="text-zinc-300 text-sm leading-relaxed mb-6 opacity-0 h-0 group-hover:opacity-100 group-hover:h-auto overflow-hidden transition-all duration-700 delay-100">
                            Mengedukasi kelompok tani hutan tentang skema dan peluang perdagangan karbon dari ekosistem hutan dan lahan gambut. Ini adalah wujud insentif nyata bagi warga Muara Enim yang menjaga paru-paru bumi.
                        </p>
                    </div>
                </a>

            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="mx-auto max-w-[1200px] px-5 py-20 text-center">
        <h2 class="text-display-md text-ink">Tertarik Berkolaborasi Dalam Program Konservasi?</h2>
        <p class="mt-3 text-body-lg text-body">Bergabunglah bersama GIS dalam mewujudkan aksi lingkungan yang berdampak nyata.</p>
        <div class="mt-8">
            <a href="{{ route('kemitraan') }}" class="btn-primary">Ajukan Kerja Sama</a>
        </div>
    </section>
</x-layout>
