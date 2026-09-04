<x-layout title="{{ $program['title'] }} - Yayasan GIS" description="{{ $program['desc'] }}">

    {{-- Hero Section --}}
    <section class="relative min-h-[85vh] flex items-center bg-zinc-900 border-b border-white/10">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[20s] hover:scale-105 ease-out" style="background-image: url('{{ $program['image'] }}');"></div>
        
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-zinc-900/80 to-black/40"></div>
        
        <!-- Content Container -->
        <div class="relative z-10 container mx-auto px-5 max-w-[1200px] pt-32 pb-24">
            <div class="max-w-3xl">
                <!-- Badge -->
                <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-emerald-600/20 text-emerald-400 text-xs font-bold uppercase tracking-widest mb-6 border border-emerald-500/20 backdrop-blur-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    {{ $program['sub'] }}
                </span>

                <!-- Title -->
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-8 leading-tight tracking-tight">
                    {{ $program['title'] }}
                </h1>
                
                <!-- Description -->
                <p class="text-lg md:text-xl text-zinc-300 leading-relaxed font-light max-w-2xl">
                    {{ $program['desc'] }}
                </p>

                <!-- Action Button -->
                <div class="mt-12 flex flex-wrap gap-4">
                    <a href="{{ route('kemitraan') }}" class="btn-primary inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-500 text-white px-8 py-3.5 rounded-full font-medium transition-all shadow-[0_0_20px_rgba(5,150,105,0.3)] hover:shadow-[0_0_30px_rgba(5,150,105,0.5)]">
                        Mari Berkolaborasi
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    
                    <a href="{{ route('aksi') }}" class="inline-flex items-center justify-center gap-2 bg-white/5 hover:bg-white/10 border border-white/10 text-white px-8 py-3.5 rounded-full font-medium transition-all backdrop-blur-sm">
                        Kembali ke Program
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Content Area & Detail --}}
    <section class="py-24 bg-white dark:bg-zinc-900 border-b border-zinc-100 dark:border-zinc-800">
        <div class="container mx-auto px-5 max-w-[1200px]">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
                <!-- Left Details Info -->
                <div class="lg:col-span-4">
                    <div class="sticky top-32 p-8 rounded-3xl bg-zinc-50 dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-700/50 shadow-sm">
                        <h3 class="text-xl font-bold text-zinc-900 dark:text-white mb-6">Informasi Aksi</h3>
                        <ul class="space-y-5">
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div>
                                    <span class="block text-sm font-semibold tracking-wider text-zinc-500 uppercase mb-1">Lokasi</span>
                                    <span class="block text-zinc-700 dark:text-zinc-300 font-medium">Kabupaten Muara Enim & Sekitarnya</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <div>
                                    <span class="block text-sm font-semibold tracking-wider text-zinc-500 uppercase mb-1">Penerima Manfaat</span>
                                    <span class="block text-zinc-700 dark:text-zinc-300 font-medium">Masyarakat lokal & Kelestarian Ekosistem</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                                </div>
                                <div>
                                    <span class="block text-sm font-semibold tracking-wider text-zinc-500 uppercase mb-1">Pilar Tujuan</span>
                                    <span class="block text-zinc-700 dark:text-zinc-300 font-medium">{{ $program['sub'] }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right Detailed Content -->
                <div class="lg:col-span-8 prose prose-lg prose-zinc dark:prose-invert max-w-none">
                    <h2 class="text-3xl font-bold text-zinc-900 dark:text-white mb-6">Pentingnya {{ $program['sub'] }} untuk Masa Depan</h2>
                    
                    <p class="text-zinc-600 dark:text-zinc-300 leading-loose mb-8">
                        Melalui inisiatif <strong>{{ $program['title'] }}</strong>, Yayasan Green Invite Sembilan (GIS) hadir menjembatani solusi keberlanjutan yang berakar dari masyarakat. Kami meyakini bahwa menjaga alam bukan sekadar tugas moral, melainkan investasi peradaban jangka panjang, tak terkecuali di wilayah kaya potensi seperti Muara Enim, Sumatera Selatan.
                    </p>

                    <div class="my-12 p-8 bg-emerald-50 dark:bg-emerald-950/20 rounded-3xl border-l-4 border-emerald-500 shadow-sm relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 text-emerald-500/10 dark:text-emerald-500/5">
                            <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.714-3.663-9.609-10.017-9.609h-4v4h3.693c3.155 0 4.706 1.868 4.706 5.253v3.747h5.618zm10 0v-7.391c0-5.714-3.663-9.609-10.017-9.609h-4v4h3.693c3.155 0 4.706 1.868 4.706 5.253v3.747h5.618z"></path></svg>
                        </div>
                        <p class="relative z-10 text-xl font-medium text-emerald-900 dark:text-emerald-100 italic leading-relaxed">
                            "{{ $program['desc'] }}"
                        </p>
                    </div>

                    <h3 class="text-2xl font-bold text-zinc-900 dark:text-white mt-12 mb-6">Mengapa Aksi Ini Diperlukan?</h3>
                    <p class="text-zinc-600 dark:text-zinc-300 leading-loose">
                        Di tengah tantangan krisis iklim, eksploitasi sumber daya alam, dan tantangan kesejahteraan komunitas akar rumput, inovasi berkelanjutan menjadi sebuah keharusan. Aksi nyata yang terukur tidak hanya meminimalisasi laju kerusakan, namun pelan-pelan membangun pilar pemulihan untuk keutuhan ekologi Sumatera Selatan. Semua ini bisa terwujud karena kolaborasi pentaheliks yang kuat antara pemerintah daerah, mitra swasta/korporasi, peneliti, aparat, hingga para pionir komunitas kita.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-layout>
