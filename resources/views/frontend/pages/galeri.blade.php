<x-layout title="Galeri Dokumentasi - Yayasan GIS" description="Dokumentasi foto aksi dan kegiatan konservasi Yayasan Green Invite Sembilan di Sumatera Selatan.">

    {{-- Hero Section (KEHATI Style) --}}
    <section class="relative min-h-[50vh] flex items-center bg-emerald-950 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 scale-105" 
             style="background-image: url('https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=1920&auto=format&fit=crop');">
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/40 to-black/40"></div>
        
        <div class="relative z-10 container mx-auto px-5 max-w-[1200px] pt-28 pb-16">
            <div class="max-w-2xl bg-black/40 backdrop-blur-md border border-white/20 p-8 md:p-10 rounded-3xl shadow-2xl">
                <span class="inline-flex items-center gap-2 py-1 px-3.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-widest mb-4 border border-emerald-400/30">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Galeri Foto &amp; Dokumentasi
                </span>
                
                <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    Galeri Dokumentasi Aksi
                </h1>
                
                <p class="text-slate-200 text-base md:text-lg leading-relaxed font-light">
                    Kumpulan rekam jejak visual aksi konservasi, penanaman pohon, perhutanan sosial, dan pelibatan komunitas lokal di Sumatera Selatan.
                </p>
            </div>
        </div>
    </section>

    {{-- Gallery Content Grid (Theme Terang) --}}
    <section class="py-16 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-5 max-w-[1200px]">
            
            <div class="flex items-center justify-between pb-8 mb-10 border-b border-slate-200">
                <h2 class="text-2xl font-bold text-slate-900">Dokumentasi Terbaru</h2>
                <a href="{{ route('berita.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800">
                    ← Kembali ke Semua Artikel
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($activities as $activity)
                    @php
                        $cover = $activity->getFirstMediaUrl('cover', 'large');
                    @endphp
                    @if ($cover)
                        <div class="bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-xl transition-all duration-300 group">
                            <a href="{{ $cover }}" target="_blank" class="block aspect-[4/3] overflow-hidden bg-slate-100 relative">
                                <img src="{{ $cover }}" alt="{{ $activity->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white font-medium text-xs gap-1.5 backdrop-blur-[2px]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                    Lihat Foto
                                </div>
                            </a>
                            <div class="p-4">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 block mb-1">
                                    {{ $activity->type->label() }}
                                </span>
                                <h3 class="text-sm font-bold text-slate-900 line-clamp-2 leading-snug hover:text-emerald-700">
                                    <a href="{{ route('berita.show', $activity) }}">{{ $activity->title }}</a>
                                </h3>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>

</x-layout>
