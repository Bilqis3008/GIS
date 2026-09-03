<x-layout title="Kontak" description="Hubungi Yayasan Green Invite Sembilan (GIS) di Kabupaten Muara Enim.">
    <section class="mx-auto max-w-[1200px] px-5 py-16">
        <p class="overline">Kontak</p>
        <h1 class="mt-2 text-display-md text-ink">Hubungi GIS</h1>
    </section>

    <section class="mx-auto grid max-w-[1200px] gap-12 px-5 pb-24 lg:grid-cols-2">
        {{-- Info + peta --}}
        <div>
            <dl class="space-y-5">
                @if (! empty($site['address']))
                    <div>
                        <dt class="overline">Alamat</dt>
                        <dd class="mt-1 text-body-md text-body">{{ $site['address'] }}</dd>
                    </div>
                @endif
                @if (! empty($site['email']))
                    <div>
                        <dt class="overline">Email</dt>
                        <dd class="mt-1 text-body-md"><a href="mailto:{{ $site['email'] }}" class="text-link">{{ $site['email'] }}</a></dd>
                    </div>
                @endif
                @if (! empty($site['phone']))
                    <div>
                        <dt class="overline">Telepon</dt>
                        <dd class="mt-1 text-body-md text-body">{{ $site['phone'] }}</dd>
                    </div>
                @endif
                @if (! empty($site['whatsapp']))
                    <div>
                        <dt class="overline">WhatsApp</dt>
                        <dd class="mt-1"><a href="https://wa.me/{{ $site['whatsapp'] }}" target="_blank" rel="noopener" class="btn-secondary !min-h-0 !px-4 !py-2">Chat via WhatsApp</a></dd>
                    </div>
                @endif
            </dl>

            {{-- Peta embed sederhana (OpenStreetMap, tanpa API key) — Muara Enim --}}
            <div class="mt-8 overflow-hidden rounded-md border border-hairline">
                <iframe
                    title="Peta lokasi Muara Enim"
                    class="h-64 w-full"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.openstreetmap.org/export/embed.html?bbox=103.74%2C-3.68%2C103.82%2C-3.62&layer=mapnik&marker=-3.6536%2C103.7783"></iframe>
            </div>
        </div>

        {{-- Form --}}
        <div>
            <h2 class="text-title-lg text-ink">Kirim Pesan</h2>
            <p class="mt-2 text-body-md text-body">Punya pertanyaan atau usulan? Tulis di bawah ini.</p>
            <div class="mt-6">
                <x-contact-form defaultSubject="umum" />
            </div>
        </div>
    </section>
</x-layout>
