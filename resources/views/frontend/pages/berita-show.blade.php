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

<x-layout :title="$activity->title . ' - Yayasan GIS'" :description="$activity->excerpt" :ogImage="$cover ?: null">

    {{-- Breadcrumb & Top Bar --}}
    <section class="bg-emerald-950 pt-28 pb-12 border-b border-emerald-900">
        <div class="container mx-auto px-5 max-w-[1000px]">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-emerald-300 hover:text-white transition-colors mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Terkini &amp; Publikasi
            </a>

            <!-- Badge & Date -->
            <div class="flex items-center flex-wrap gap-3 mb-4">
                <span class="px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider border backdrop-blur-md {{ $badgeColor }}">
                    {{ $activity->type->label() }}
                </span>

                <span class="text-xs text-slate-300 font-medium flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $date?->translatedFormat('d F Y') }}
                </span>
            </div>

            <!-- Main Title -->
            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight tracking-tight mb-6">
                {{ $activity->title }}
            </h1>

            <!-- Author & Source Attribution Card -->
            @if ($activity->author || $activity->source_name || $activity->source_url)
                <div class="p-4 rounded-2xl bg-white/10 backdrop-blur-md border border-white/15 text-slate-200 text-sm flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        @if ($activity->author)
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 text-white font-bold flex items-center justify-center text-xs">
                                    {{ strtoupper(substr($activity->author, 0, 1)) }}
                                </div>
                                <div>
                                    <span class="block text-[11px] uppercase tracking-wider text-emerald-300 font-semibold">Dikemukakan / Penulis</span>
                                    <span class="font-bold text-white">{{ $activity->author }}</span>
                                </div>
                            </div>
                        @endif

                        @if ($activity->source_name)
                            <span class="text-slate-500 hidden sm:inline">•</span>
                            <div>
                                <span class="block text-[11px] uppercase tracking-wider text-slate-300 font-semibold">Sumber Informasi</span>
                                <span class="font-medium text-slate-100">{{ $activity->source_name }}</span>
                            </div>
                        @endif
                    </div>

                    @if ($activity->source_url)
                        <a href="{{ $activity->source_url }}" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold transition-all shadow-sm">
                            Kunjungi Link Sumber
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </section>

    {{-- Main Article Content (Bright Theme) --}}
    <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-5 max-w-[1000px]">
            
            <div class="bg-white rounded-3xl p-6 md:p-12 border border-slate-200/90 shadow-sm">
                
                <!-- Cover Image -->
                @if ($cover)
                    <div class="mb-10 rounded-2xl overflow-hidden shadow-md">
                        <img src="{{ $cover }}" alt="{{ $activity->title }}" class="w-full max-h-[500px] object-cover">
                    </div>
                @endif

                <!-- Excerpt Highlight -->
                @if ($activity->excerpt)
                    <div class="p-6 rounded-2xl bg-emerald-50/80 border-l-4 border-emerald-600 text-emerald-950 font-medium text-lg leading-relaxed mb-8 italic">
                        "{{ $activity->excerpt }}"
                    </div>
                @endif

                <!-- Article Body -->
                @if ($activity->body)
                    <div class="prose prose-lg max-w-none text-slate-800 leading-relaxed font-normal
                                prose-headings:font-bold prose-headings:text-slate-900 prose-headings:tracking-tight
                                prose-a:text-emerald-700 prose-a:underline hover:prose-a:text-emerald-800
                                prose-blockquote:border-emerald-500 prose-blockquote:bg-slate-50 prose-blockquote:p-4 prose-blockquote:rounded-r-xl prose-blockquote:not-italic font-sans">
                        {!! $activity->body !!}
                    </div>
                @endif

                <!-- Documentation Gallery -->
                @if ($gallery->isNotEmpty())
                    <div class="mt-16 pt-10 border-t border-slate-200">
                        <h3 class="text-2xl font-bold text-slate-900 mb-6">Galeri Dokumentasi Aksi</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($gallery as $photo)
                                <a href="{{ $photo->getUrl() }}" target="_blank" rel="noopener" class="group block aspect-[4/3] overflow-hidden rounded-2xl bg-slate-100 shadow-sm border border-slate-200">
                                    <img src="{{ $photo->getUrl('thumb') }}" 
                                         alt="{{ $photo->name ?: $activity->title }}"
                                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" 
                                         loading="lazy">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            <!-- Related Content -->
            @if ($latest->isNotEmpty())
                <div class="mt-16">
                    <h3 class="text-2xl font-bold text-slate-900 mb-8">Artikel &amp; Kabar Lainnya</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($latest as $other)
                            @php
                                $otherCover = $other->getFirstMediaUrl('cover', 'thumb');
                            @endphp
                            <article class="bg-white rounded-2xl border border-slate-200 p-5 hover:shadow-md transition-all flex flex-col justify-between">
                                <div>
                                    @if ($otherCover)
                                        <a href="{{ route('berita.show', $other) }}" class="block aspect-video rounded-xl overflow-hidden mb-3">
                                            <img src="{{ $otherCover }}" alt="{{ $other->title }}" class="w-full h-full object-cover">
                                        </a>
                                    @endif
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-700 block mb-1">
                                        {{ $other->type->label() }}
                                    </span>
                                    <h4 class="font-bold text-slate-900 text-base leading-snug line-clamp-2 hover:text-emerald-700">
                                        <a href="{{ route('berita.show', $other) }}">{{ $other->title }}</a>
                                    </h4>
                                </div>
                                <div class="mt-4 pt-3 border-t border-slate-100 text-xs text-slate-500 font-medium">
                                    {{ $other->published_at?->translatedFormat('d M Y') }}
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

</x-layout>
