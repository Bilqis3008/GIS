@props(['transparent' => false])

@php
    $links = [
        [
            'label' => 'Beranda',
            'routeName' => 'home',
        ],
        [
            'label' => 'Tentang',
            'routeName' => 'tentang',
            'hasDropdown' => true,
            'headerTitle' => 'Tentang Kami',
            'subLinks' => [
                ['label' => 'Siapa Kami', 'url' => route('tentang').'#siapa-kami'],
                ['label' => 'Sejarah GIS', 'url' => route('tentang').'#sejarah'],
                ['label' => 'Struktur Kami', 'url' => route('struktur')],
                ['label' => 'Kontak', 'url' => route('kontak')],
                ['label' => 'FAQ', 'url' => route('tentang').'#faq'],
            ]
        ],
        [
            'label' => 'Aksi',
            'routeName' => 'aksi',
            'hasDropdown' => true,
            'headerTitle' => 'KONSERVASI',
            'subLinks' => [
                ['label' => 'Kehutanan', 'url' => route('aksi.detail', ['slug' => 'kehutanan'])],
                ['label' => 'Pertanian', 'url' => route('aksi.detail', ['slug' => 'pertanian'])],
                ['label' => 'Perkebunan', 'url' => route('aksi.detail', ['slug' => 'perkebunan'])],
                ['label' => 'Perubahan Iklim', 'url' => route('aksi.detail', ['slug' => 'perubahan-iklim'])],
                ['label' => 'Advokasi Kebijakan', 'url' => route('aksi.detail', ['slug' => 'advokasi-kebijakan'])],
                ['label' => 'Biodiversity Warriors', 'url' => route('aksi.detail', ['slug' => 'biodiversity-warriors'])],
                ['label' => 'Investasi Hijau', 'url' => route('aksi.detail', ['slug' => 'investasi-hijau'])],
                ['label' => 'ESI', 'url' => route('aksi.detail', ['slug' => 'esi'])],
                ['label' => 'Karbon Trading', 'url' => route('aksi.detail', ['slug' => 'karbon-trading'])],
            ]
        ],
        [
            'label' => 'Terkini',
            'routeName' => 'terkini',
            'hasDropdown' => true,
            'headerTitle' => 'PUBLIKASI',
            'subLinks' => [
                ['label' => 'Artikel & Opini', 'url' => route('berita.index', ['type' => 'artikel'])],
                ['label' => 'Siaran Pers', 'url' => route('berita.index', ['type' => 'berita'])],
                ['label' => 'Pusat Informasi', 'url' => route('publikasi.index')],
                ['label' => 'Galeri', 'url' => route('galeri')],
            ]
        ],
        [
            'label' => 'Even',
            'routeName' => 'even',
            'hasDropdown' => true,
            'headerTitle' => 'Even & Agenda',
            'subLinks' => [
                ['label' => 'Jadwal Agenda & Even', 'url' => route('even')],
                ['label' => 'Kegiatan Komunitas', 'url' => route('aksi')],
            ]
        ],
        [
            'label' => 'Kemitraan',
            'routeName' => 'kemitraan',
            'hasDropdown' => true,
            'headerTitle' => 'KEMITRAAN',
            'subLinks' => [
                ['label' => 'Korporasi', 'url' => route('kemitraan').'#korporasi'],
                ['label' => 'NGO', 'url' => route('kemitraan').'#ngo'],
                ['label' => 'Perguruan Tinggi & Lembaga', 'url' => route('kemitraan').'#perguruan-tinggi'],
                ['label' => 'Lembaga Pemerintah', 'url' => route('kemitraan').'#pemerintah'],
            ]
        ],
    ];
@endphp

<style>
    /* CSS Nav Bar Fixed & Sticky Logic */
    #site-header.is-transparent-top {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
        background: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    }
    #site-header.is-transparent-top.is-scrolled {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom-color: #e2e5e1 !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    }

    #site-header.is-standard-sticky {
        position: sticky;
        top: 0;
        z-index: 50;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid #e2e5e1;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    /* Text & Logo colors when on Transparent Top (Hero background) */
    #site-header.is-transparent-top:not(.is-scrolled) .gis-nav-link {
        color: #ffffff !important;
    }
    #site-header.is-transparent-top:not(.is-scrolled) .gis-nav-logo {
        filter: none !important;
    }
    #site-header.is-transparent-top:not(.is-scrolled) .gis-nav-cta {
        background: transparent !important;
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.7) !important;
        box-shadow: none !important;
    }
    #site-header.is-transparent-top:not(.is-scrolled) .gis-nav-cta:hover {
        background: rgba(255, 255, 255, 0.2) !important;
    }
    #site-header.is-transparent-top:not(.is-scrolled) .gis-nav-burger {
        color: #ffffff !important;
        border-color: rgba(255, 255, 255, 0.4) !important;
    }

    /* Text & Logo colors when Scrolled or Standard */
    #site-header.is-scrolled .gis-nav-link,
    #site-header.is-standard-sticky .gis-nav-link {
        color: #17211c !important;
    }
    #site-header.is-scrolled .gis-nav-logo,
    #site-header.is-standard-sticky .gis-nav-logo {
        filter: none !important;
    }
    #site-header.is-scrolled .gis-nav-cta,
    #site-header.is-standard-sticky .gis-nav-cta {
        background: #17211c !important;
        color: #ffffff !important;
        border: none !important;
    }
    #site-header.is-scrolled .gis-nav-burger,
    #site-header.is-standard-sticky .gis-nav-burger {
        color: #17211c !important;
        border-color: #e2e5e1 !important;
    }

    /* Robust Hover Dropdown Styling */
    .gis-nav-group {
        position: relative;
    }
    .gis-dropdown-menu {
        display: none !important;
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 220px;
        background-color: #ffffff !important;
        border: 1px solid #e2e5e1;
        border-radius: 12px;
        box-shadow: 0 15px 35px -5px rgba(0, 0, 0, 0.18);
        padding: 8px 0;
        z-index: 1000;
    }
    .gis-nav-group:hover .gis-dropdown-menu {
        display: block !important;
    }
    .gis-dropdown-header {
        padding: 8px 18px 6px 18px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        color: #117613;
        border-bottom: 1px solid #e2e5e1;
        margin-bottom: 4px;
    }
    .gis-dropdown-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 18px;
        color: #353b36 !important;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: background-color 0.15s ease, color 0.15s ease;
    }
    .gis-dropdown-item:hover {
        background-color: #f6f9f4 !important;
        color: #117613 !important;
    }
</style>

<header id="site-header" class="{{ $transparent ? 'is-transparent-top' : 'is-standard-sticky' }}">
    <nav class="mx-auto flex h-[72px] max-w-[1200px] items-center justify-between px-5" aria-label="Navigasi utama">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2" aria-label="Beranda GIS">
            <img src="{{ asset('logo_gis9.png') }}" alt="Logo Yayasan Green Invite Sembilan" class="gis-nav-logo h-10 w-auto md:h-12 transition-all duration-300">
        </a>

        {{-- Mobile toggle checkbox --}}
        <input type="checkbox" id="nav-toggle" class="peer hidden">

        {{-- Desktop Navigation Links --}}
        <div class="hidden items-center gap-2 lg:flex">
            @foreach ($links as $item)
                @php
                    $routeName = $item['routeName'];
                    $active = request()->routeIs($routeName) || request()->routeIs($routeName.'.*');
                    $hasDropdown = !empty($item['hasDropdown']);
                @endphp

                <div class="gis-nav-group py-3 px-1">
                    <a href="{{ route($routeName) }}"
                       @class([
                           'gis-nav-link relative inline-flex items-center gap-1.5 rounded-md px-4 py-2 text-body-md font-medium transition-colors',
                           'font-bold' => $active,
                       ])>
                        <span>{{ $item['label'] }}</span>
                        @if ($hasDropdown)
                            <svg class="h-4 w-4 shrink-0 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        @else
                            {{-- Translucent width spacer to match chevron width exactly --}}
                            <span class="inline-block h-4 w-4 shrink-0" aria-hidden="true"></span>
                        @endif
                        @if ($active)
                            <span class="absolute left-3 right-7 -bottom-px h-0.5 rounded-full bg-forest"></span>
                        @endif
                    </a>

                    {{-- Dropdown Sub-Menu --}}
                    @if ($hasDropdown)
                        <div class="gis-dropdown-menu">
                            @if (!empty($item['headerTitle']))
                                <div class="gis-dropdown-header">
                                    {{ $item['headerTitle'] }}
                                </div>
                            @endif
                            @foreach ($item['subLinks'] as $sub)
                                <a href="{{ $sub['url'] }}" class="gis-dropdown-item">
                                    <span>{{ $sub['label'] }}</span>
                                    <svg class="h-4 w-4 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach

            <a href="{{ route('kemitraan') }}" class="gis-nav-cta btn-primary ml-3 !min-h-0 !px-5 !py-2.5 transition-all">
                Ajukan Kerja Sama
            </a>
        </div>

        {{-- Mobile Hamburger Button --}}
        <label for="nav-toggle" class="gis-nav-burger flex h-11 w-11 cursor-pointer items-center justify-center rounded-full border border-hairline transition-colors hover:bg-surface-soft lg:hidden" aria-label="Buka menu">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </label>

        {{-- Mobile Full-Screen Sheet Menu --}}
        <div class="fixed inset-0 top-[72px] z-40 hidden flex-col overflow-y-auto border-t border-hairline bg-canvas px-5 py-6 peer-checked:flex lg:!hidden">
            <div class="space-y-3">
                @foreach ($links as $item)
                    @php
                        $routeName = $item['routeName'];
                        $active = request()->routeIs($routeName) || request()->routeIs($routeName.'.*');
                        $hasDropdown = !empty($item['hasDropdown']);
                    @endphp

                    @if ($hasDropdown)
                        <details class="rounded-lg border border-hairline bg-surface-soft p-3 [&_summary::-webkit-details-marker]:hidden">
                            <summary class="flex cursor-pointer items-center justify-between font-semibold text-ink text-body-md">
                                <span>{{ $item['label'] }}</span>
                                <svg class="h-4 w-4 text-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </summary>
                            <div class="mt-2 space-y-1 pt-2 border-t border-hairline">
                                @if (!empty($item['headerTitle']))
                                    <p class="text-caption font-bold uppercase tracking-wider text-forest px-3 py-1">{{ $item['headerTitle'] }}</p>
                                @endif
                                @foreach ($item['subLinks'] as $sub)
                                    <a href="{{ $sub['url'] }}" class="block rounded-md px-3 py-2 text-body-md text-body hover:bg-canvas hover:text-forest">
                                        {{ $sub['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </details>
                    @else
                        <a href="{{ route($routeName) }}"
                           @class([
                               'block rounded-lg px-4 py-3 text-body-md font-semibold',
                               'bg-surface-soft text-ink' => $active,
                               'text-body hover:bg-surface-soft' => ! $active,
                           ])>
                            {{ $item['label'] }}
                        </a>
                    @endif
                @endforeach

                <a href="{{ route('kemitraan') }}" class="btn-primary w-full mt-4 justify-center">
                    Ajukan Kerja Sama
                </a>
            </div>
        </div>
    </nav>
</header>

<script>
    (function () {
        var header = document.getElementById('site-header');
        if (!header || !header.classList.contains('is-transparent-top')) return;

        var syncHeader = function () {
            if (window.scrollY > 20) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }
        };

        syncHeader();
        window.addEventListener('scroll', syncHeader, { passive: true });
    })();
</script>
