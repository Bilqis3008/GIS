@php
    $heroTitle = match($currentType) {
        'artikel' => 'Artikel & Opini',
        'berita' => 'Siaran Pers',
        'opini' => 'Opini & Pemikiran',
        default => 'Kabar Terkini'
    };

    $heroDesc = match($currentType) {
        'artikel' => 'Rangkuman artikel mendalam dan gagasan opini kritis seputar konservasi, keanekaragaman hayati, dan kebijakan lingkungan Sumatera Selatan.',
        'berita' => 'Rilis resmi dan pernyataan pers seputar aksi lapangan, regulasi, dan pergerakan Yayasan Green Invite Sembilan (GIS).',
        'opini' => 'Perspektif dan gagasan pemikiran dari akademisi, tokoh lokal, dan praktisi lingkungan hidup.',
        default => 'Berita, artikel, opini, serta rilis pers terbaru mengenai aksi dan gerakan lingkungan di Sumatera Selatan.'
    };
@endphp

<x-layout :title="$heroTitle . ' - Yayasan GIS'" :description="$heroDesc">

    {{-- Hero Section (Style terinspirasi KEHATI) --}}
    <section class="relative min-h-[50vh] md:min-h-[60vh] flex items-center bg-emerald-950 overflow-hidden">
        <!-- Background Nature Image -->
        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 scale-105" 
             style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1920&auto=format&fit=crop');">
        </div>
        
        <!-- Dark Overlay Gradient for maximum text contrast -->
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/40 to-black/40"></div>
        
        <!-- Container -->
        <div class="relative z-10 container mx-auto px-5 max-w-[1200px] pt-28 pb-16">
            <!-- Glassmorphic Title Box -->
            <div class="max-w-2xl bg-black/40 backdrop-blur-md border border-white/20 p-8 md:p-10 rounded-3xl shadow-2xl">
                <span class="inline-flex items-center gap-2 py-1 px-3.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-widest mb-4 border border-emerald-400/30">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    Publikasi &amp; Media GIS
                </span>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    {{ $heroTitle }}
                </h1>
                
                <p class="text-slate-200 text-base md:text-lg leading-relaxed font-light">
                    {{ $heroDesc }}
                </p>
            </div>
        </div>
    </section>

    {{-- Filter Navigation Bar & Content Area (Theme Terang Murni) --}}
    <section class="py-12 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-5 max-w-[1200px]">
            
            <!-- Category Filter Tabs (Pill Style) -->
            <div class="flex items-center justify-between flex-wrap gap-4 pb-8 mb-10 border-b border-slate-200">
                <div class="flex items-center flex-wrap gap-2 md:gap-3">
                    <a href="{{ route('berita.index') }}" 
                       class="px-5 py-2.5 rounded-full font-medium text-sm transition-all duration-200 {{ empty($currentType) ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100 hover:text-emerald-800' }}">
                        Semua Kabar
                    </a>
                    
                    <a href="{{ route('berita.index', ['type' => 'artikel']) }}" 
                       class="px-5 py-2.5 rounded-full font-medium text-sm transition-all duration-200 {{ $currentType === 'artikel' ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100 hover:text-emerald-800' }}">
                        Artikel &amp; Opini
                    </a>
                    
                    <a href="{{ route('berita.index', ['type' => 'berita']) }}" 
                       class="px-5 py-2.5 rounded-full font-medium text-sm transition-all duration-200 {{ $currentType === 'berita' ? 'bg-emerald-700 text-white shadow-md shadow-emerald-700/20' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100 hover:text-emerald-800' }}">
                        Siaran Pers
                    </a>

                    <a href="{{ route('publikasi.index') }}" 
                       class="px-5 py-2.5 rounded-full font-medium text-sm transition-all duration-200 bg-white text-slate-700 border border-slate-200 hover:bg-slate-100 hover:text-emerald-800">
                        Pusat Informasi
                    </a>

                    <a href="{{ route('galeri') }}" 
                       class="px-5 py-2.5 rounded-full font-medium text-sm transition-all duration-200 bg-white text-slate-700 border border-slate-200 hover:bg-slate-100 hover:text-emerald-800">
                        Galeri
                    </a>
                </div>

                <div class="text-sm font-medium text-slate-500">
                    Menampilkan <span class="text-slate-900 font-bold">{{ $activities->total() }}</span> publikasi
                </div>
            </div>

            <!-- Articles Grid -->
            @if ($activities->isEmpty())
                <div class="bg-white rounded-3xl p-16 text-center border border-slate-200 shadow-sm max-w-xl mx-auto my-12">
                    <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Belum ada publikasi</h3>
                    <p class="text-slate-500 text-sm mb-6">Publikasi dalam kategori ini akan segera hadir. Pantau terus kabar terbaru kami!</p>
                    <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:text-emerald-800">
                        ← Kembali ke Semua Publikasi
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($activities as $activity)
                        @php
                            $cover = $activity->getFirstMediaUrl('cover', 'large');
                            $date = $activity->published_at ?? $activity->created_at;
                            $badgeColor = match($activity->type?->value ?? $activity->type) {
                                'artikel' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                'opini' => 'bg-amber-100 text-amber-800 border-amber-200',
                                'berita' => 'bg-blue-100 text-blue-800 border-blue-200',
                                default => 'bg-slate-100 text-slate-800 border-slate-200',
                            };
                        @endphp

                        <article class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
                            <!-- Image Container -->
                            <a href="{{ route('berita.show', $activity) }}" class="relative block aspect-[16/10] overflow-hidden bg-slate-100">
                                @if ($cover)
                                    <img src="{{ $cover }}" 
                                         alt="{{ $activity->title }}" 
                                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                                         loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-emerald-50 to-teal-100 text-emerald-700">
                                        <svg class="w-12 h-12 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                    </div>
                                @endif
                                
                                <!-- Category Badge Overlay -->
                                <div class="absolute top-4 left-4">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border backdrop-blur-md shadow-sm {{ $badgeColor }}">
                                        {{ $activity->type->label() }}
                                    </span>
                                </div>
                            </a>

                            <!-- Card Body -->
                            <div class="p-6 flex-1 flex flex-col justify-between">
                                <div>
                                    <!-- Meta Info (Date & Author) -->
                                    <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                                        <span class="inline-flex items-center gap-1 font-medium">
                                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            {{ $date?->translatedFormat('d M Y') }}
                                        </span>
                                        
                                        @if ($activity->source_name)
                                            <span class="text-slate-300">•</span>
                                            <span class="truncate max-w-[140px] text-slate-600 font-medium" title="{{ $activity->source_name }}">
                                                {{ $activity->source_name }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Title -->
                                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors leading-snug mb-3 line-clamp-2">
                                        <a href="{{ route('berita.show', $activity) }}">
                                            {{ $activity->title }}
                                        </a>
                                    </h3>

                                    <!-- Excerpt -->
                                    @if ($activity->excerpt)
                                        <p class="text-slate-600 text-sm leading-relaxed line-clamp-3 mb-4 font-normal">
                                            {{ $activity->excerpt }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Card Footer / Author Attribution -->
                                <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs mt-auto">
                                    @if ($activity->author)
                                        <div class="flex items-center gap-2 text-slate-600 font-medium truncate max-w-[180px]">
                                            <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-[10px] shrink-0">
                                                {{ strtoupper(substr($activity->author, 0, 1)) }}
                                            </div>
                                            <span class="truncate" title="{{ $activity->author }}">{{ $activity->author }}</span>
                                        </div>
                                    @else
                                        <span class="text-slate-400 font-medium">Tim Redaksi GIS</span>
                                    @endif

                                    <a href="{{ route('berita.show', $activity) }}" 
                                       class="inline-flex items-center gap-1 font-bold text-emerald-700 group-hover:text-emerald-800 transition-transform group-hover:translate-x-1 shrink-0">
                                        Baca
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $activities->links() }}
                </div>
            @endif

        </div>
    </section>

</x-layout>
