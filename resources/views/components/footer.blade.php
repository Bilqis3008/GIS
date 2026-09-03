@props(['site'])

<footer class="border-t border-hairline bg-canvas">
    <div class="mx-auto max-w-[1200px] px-5 py-16">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
            {{-- Brand --}}
            <div>
                <img src="{{ asset('logo_gis9.png') }}" alt="Logo Yayasan Green Invite Sembilan" class="h-12 w-auto">
                <p class="mt-4 max-w-xs text-body-md text-muted">{{ $site['footer_text'] ?? 'Lembaga lingkungan berbasis kolaborasi di Kabupaten Muara Enim, Sumatera Selatan.' }}</p>
                <div class="mt-5">
                    <h3 class="text-xs font-bold text-ink uppercase tracking-wider mb-3">Ikuti Kami</h3>
                    <div class="flex items-center gap-3 flex-wrap">
                        {{-- Instagram --}}
                        <a href="{{ $site['social_instagram'] ?? 'https://instagram.com' }}" target="_blank" rel="noopener" aria-label="Instagram" style="background-color: #166534; width: 36px; height: 36px; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; color: #ffffff; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.15);">
                            <svg style="width: 18px; height: 18px; fill: #ffffff;" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        {{-- TikTok --}}
                        <a href="{{ $site['social_tiktok'] ?? 'https://tiktok.com' }}" target="_blank" rel="noopener" aria-label="TikTok" style="background-color: #166534; width: 36px; height: 36px; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; color: #ffffff; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.15);">
                            <svg style="width: 18px; height: 18px; fill: #ffffff;" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.97v7.02c0 1.78-.5 3.55-1.48 4.97-1.39 2.01-3.69 3.28-6.13 3.42-2.54.15-5.11-.64-6.96-2.37-1.92-1.8-2.88-4.38-2.61-7 .25-2.53 1.65-4.78 3.76-6.11 1.74-1.1 3.86-1.47 5.88-1.05v4.19c-1.11-.23-2.31-.07-3.3.49-1.04.59-1.75 1.66-1.9 2.84-.19 1.48.33 2.98 1.39 4.02 1.05 1.04 2.57 1.51 4.03 1.25 1.34-.23 2.49-1.09 3.06-2.31.34-.73.49-1.55.49-2.36V.02z"/></svg>
                        </a>
                        {{-- Facebook --}}
                        <a href="{{ $site['social_facebook'] ?? 'https://facebook.com' }}" target="_blank" rel="noopener" aria-label="Facebook" style="background-color: #166534; width: 36px; height: 36px; border-radius: 9999px; display: inline-flex; align-items: center; justify-content: center; color: #ffffff; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.15);">
                            <svg style="width: 18px; height: 18px; fill: #ffffff;" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.5 5H18V0h-3.808C10.592 0 9 1.583 9 4.615V8z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Tentang --}}
            <div>
                <h2 class="overline">Tentang</h2>
                <ul class="mt-4 space-y-2 text-body-md">
                    <li><a href="{{ route('tentang') }}#siapa-kami" class="text-body hover:text-ink">Siapa Kami</a></li>
                    <li><a href="{{ route('tentang') }}#sejarah" class="text-body hover:text-ink">Sejarah GIS</a></li>
                    <li><a href="{{ route('struktur') }}" class="text-body hover:text-ink">Struktur Kami</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-body hover:text-ink">Kontak</a></li>
                    <li><a href="{{ route('tentang') }}#faq" class="text-body hover:text-ink">FAQ</a></li>
                </ul>
            </div>

            {{-- Aksi --}}
            <div>
                <h2 class="overline">Aksi</h2>
                <ul class="mt-4 space-y-2 text-body-md">
                    <li><a href="{{ route('aksi') }}#kehutanan" class="text-body hover:text-ink">Kehutanan</a></li>
                    <li><a href="{{ route('aksi') }}#pertanian" class="text-body hover:text-ink">Pertanian</a></li>
                    <li><a href="{{ route('aksi') }}#perkebunan" class="text-body hover:text-ink">Perkebunan</a></li>
                    <li><a href="{{ route('aksi') }}#perubahan-iklim" class="text-body hover:text-ink">Perubahan Iklim</a></li>
                    <li><a href="{{ route('aksi') }}#advokasi-kebijakan" class="text-body hover:text-ink">Advokasi Kebijakan</a></li>
                    <li><a href="{{ route('aksi') }}#biodiversity-warriors" class="text-body hover:text-ink">Biodiversity Warriors</a></li>
                    <li><a href="{{ route('aksi') }}#investasi-hijau" class="text-body hover:text-ink">Investasi Hijau</a></li>
                    <li><a href="{{ route('aksi') }}#esi" class="text-body hover:text-ink">ESI</a></li>
                    <li><a href="{{ route('aksi') }}#karbon-trading" class="text-body hover:text-ink">Karbon Trading</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h2 class="overline">Kontak</h2>
                <ul class="mt-4 space-y-2 text-body-md text-body">
                    <li>{{ $site['address'] ?? 'Jl. Tembesu No. 2, Kelurahan Pasar I, Kecamatan Muara Enim, Kabupaten Muara Enim, Sumatera Selatan' }}</li>
                    <li><a href="mailto:{{ $site['email'] ?? 'kontak@gis.or.id' }}" class="text-link">{{ $site['email'] ?? 'kontak@gis.or.id' }}</a></li>
                    <li>{{ $site['phone'] ?? '+62 811-0000-0000' }}</li>
                </ul>
            </div>
        </div>

        {{-- Legal row — Akta and Kemenkumham removed, Copyright preserved --}}
        <div class="mt-12 border-t border-hairline pt-6 text-caption text-muted">
            <p>&copy; {{ date('Y') }} Yayasan Green Invite Sembilan (GIS). Hak cipta dilindungi.</p>
        </div>
    </div>
</footer>

