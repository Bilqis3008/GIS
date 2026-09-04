@props(['activity'])

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
            <!-- Meta Info (Date & Source) -->
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
