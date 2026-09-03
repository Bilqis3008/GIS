@props([
    'title' => null,
    'description' => null,
    'ogImage' => null,
    'transparentNav' => false,
])

@php
    $siteName = config('app.name', 'GIS');
    $pageTitle = $title ? $title.' — '.$siteName : $siteName.' — Yayasan Green Invite Sembilan';
    $metaDesc = $description ?? ($site['footer_text'] ?? 'Yayasan Green Invite Sembilan (GIS), lembaga lingkungan berbasis kolaborasi di Kabupaten Muara Enim.');
    $ogImageUrl = $ogImage ?? asset('logo_gis9.png');
@endphp
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDesc }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDesc }}">
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- Preloader: inline so it paints instantly, before the main bundle loads --}}
    <style>
        #gis-preloader{position:fixed;inset:0;z-index:80;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:1.5rem;background:#fff;transition:opacity .55s ease,visibility .55s ease}
        #gis-preloader.is-done{opacity:0;visibility:hidden}
        #gis-preloader img{width:120px;height:auto;animation:gisPulse 1.6s ease-in-out infinite}
        #gis-preloader .gis-spin{width:34px;height:34px;border:3px solid #E2E5E1;border-top-color:#117613;border-radius:9999px;animation:gisSpin .8s linear infinite}
        @keyframes gisPulse{0%,100%{opacity:.7;transform:scale(1)}50%{opacity:1;transform:scale(1.05)}}
        @keyframes gisSpin{to{transform:rotate(360deg)}}
        @media (prefers-reduced-motion:reduce){#gis-preloader img,#gis-preloader .gis-spin{animation:none}}
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{ $head ?? '' }}
</head>
<body class="min-h-screen flex flex-col">
    {{-- Loading screen --}}
    <div id="gis-preloader" role="status" aria-label="Memuat halaman">
        <img src="{{ asset('logo_gis9.png') }}" alt="Yayasan Green Invite Sembilan">
        <div class="gis-spin" aria-hidden="true"></div>
    </div>

    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:rounded-md focus:bg-primary focus:px-4 focus:py-2 focus:text-white">Lewati ke konten</a>

    <x-nav :transparent="$transparentNav" />

    <main id="main" class="flex-1">
        {{ $slot }}
    </main>

    <x-footer :site="$site" />

    {{-- WhatsApp floating button --}}
    @if ($wa = ($site['whatsapp'] ?? null))
        <a href="https://wa.me/{{ $wa }}" target="_blank" rel="noopener"
           aria-label="Hubungi GIS via WhatsApp"
           class="fixed bottom-5 right-5 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-success text-white shadow-lg transition-transform hover:scale-105">
            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.817 11.817 0 018.413 3.488 11.824 11.824 0 013.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884a9.86 9.86 0 001.51 5.26l-.999 3.648 3.748-.985zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
            </svg>
        </a>
    @endif

    {{-- Hide preloader once loaded (self-contained; not dependent on the bundle) --}}
    <script>
        (function () {
            var p = document.getElementById('gis-preloader');
            if (!p) return;
            var hide = function () {
                p.classList.add('is-done');
                setTimeout(function () { if (p && p.parentNode) p.parentNode.removeChild(p); }, 700);
            };
            if (document.readyState === 'complete') { hide(); }
            else { window.addEventListener('load', hide); }
            setTimeout(hide, 4000); // safety cap so it never sticks
        })();
    </script>

    @stack('scripts')
</body>
</html>
