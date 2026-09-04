<x-layout title="Pusat Informasi & Publikasi - Yayasan GIS" description="Laporan tahunan, kebijakan publik, dan dokumen kajian Yayasan Green Invite Sembilan.">

    {{-- Hero Section (KEHATI Style) --}}
    <section class="relative min-h-[50vh] flex items-center bg-emerald-950 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 scale-105" 
             style="background-image: url('https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=1920&auto=format&fit=crop');">
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/90 via-emerald-950/40 to-black/40"></div>
        
        <div class="relative z-10 container mx-auto px-5 max-w-[1200px] pt-28 pb-16">
            <div class="max-w-2xl bg-black/40 backdrop-blur-md border border-white/20 p-8 md:p-10 rounded-3xl shadow-2xl">
                <span class="inline-flex items-center gap-2 py-1 px-3.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-widest mb-4 border border-emerald-400/30">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Pusat Informasi &amp; Riset
                </span>
                
                <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    Laporan, Kajian &amp; Policy Brief
                </h1>
                
                <p class="text-slate-200 text-base md:text-lg leading-relaxed font-light">
                    Akses publik untuk laporan kinerja tahunan, hasil riset ekologis, naskah akademik kebijakan, serta dokumen kajian komprehensif.
                </p>
            </div>
        </div>
    </section>

    {{-- Publications List (Theme Terang) --}}
    <section class="py-16 bg-slate-50 min-h-screen">
        <div class="container mx-auto px-5 max-w-[1200px]">
            
            <div class="flex items-center justify-between pb-8 mb-10 border-b border-slate-200">
                <h2 class="text-2xl font-bold text-slate-900">Daftar Dokumen Publik</h2>
                <a href="{{ route('berita.index') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800">
                    ← Kembali ke Artikel &amp; Opini
                </a>
            </div>

            @if ($publications->isEmpty())
                <div class="bg-white rounded-3xl p-16 text-center border border-slate-200 shadow-sm max-w-xl mx-auto my-12">
                    <p class="text-slate-500 text-sm">Belum ada dokumen publikasi yang diterbitkan saat ini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($publications as $pub)
                        @php $file = $pub->getFirstMedia('file'); @endphp
                        <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold">
                                        Tahun {{ $pub->year }}
                                    </span>
                                    <span class="text-xs text-slate-400 font-medium">Format PDF</span>
                                </div>

                                <h3 class="text-xl font-bold text-slate-900 mb-3 leading-snug">
                                    {{ $pub->title }}
                                </h3>

                                @if ($pub->description)
                                    <p class="text-slate-600 text-sm leading-relaxed mb-6 font-normal">
                                        {{ $pub->description }}
                                    </p>
                                @endif
                            </div>

                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs text-slate-500 font-medium">Yayasan GIS Document</span>
                                
                                @if ($file)
                                    <a href="{{ $file->getUrl() }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold px-5 py-2.5 rounded-full transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        Unduh PDF
                                    </a>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-xs text-slate-400 font-semibold px-4 py-2 rounded-full bg-slate-100">
                                        Dokumen Fisik / Akses Terbatas
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

</x-layout>
