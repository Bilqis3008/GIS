<x-layout title="Struktur Kami" description="Struktur Organisasi Yayasan Green Invite Sembilan (GIS).">
    <section class="relative py-20 md:py-28 bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/bg-siapakami.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; margin-bottom: 3rem;">
        <div class="absolute inset-0 bg-[#0c2417]/85 backdrop-blur-xs"></div>

        <div class="mx-auto max-w-[1200px] px-5 relative z-10">
            {{-- Header Title (Pop-Up High-Contrast Style) --}}
            <div class="text-center text-white mb-20">
                <span style="background-color: rgba(74, 222, 128, 0.2); color: #4ade80; font-weight: 800; font-size: 0.95rem; padding: 0.5rem 1.5rem; border-radius: 9999px; border: 2px solid #4ade80; text-transform: uppercase; letter-spacing: 0.1em; display: inline-block; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">
                    Struktur Organisasi
                </span>
                <h1 style="font-size: 3.5rem; font-weight: 900; color: #ffffff; text-shadow: 0 4px 12px rgba(0,0,0,0.7); margin-top: 1.25rem; margin-bottom: 1rem; tracking-tight: -0.025em;">
                    Struktur Kami
                </h1>
                <p style="font-size: 1.25rem; font-weight: 500; color: #f3f4f6; text-shadow: 0 2px 6px rgba(0,0,0,0.6); max-width: 750px; margin: 0 auto; line-height: 1.6;">
                    Susunan Dewan Pembina, Direktur Utama, Sekretaris, dan Anggota Pengurus Yayasan Green Invite Sembilan (GIS).
                </p>
                <div style="width: 100px; height: 5px; background-color: #4ade80; border-radius: 9999px; margin: 1.75rem auto 0; box-shadow: 0 2px 8px rgba(74, 222, 128, 0.5);"></div>
            </div>

            @php
                $allMembers = collect($team)->flatten();
                $pembina = $allMembers->filter(fn($m) => str_contains(strtolower($m->position), 'pembina') || str_contains(strtolower($m->position), 'inisiator') || $m->group->value === 'pembina');
                $direktur = $allMembers->reject(fn($m) => $pembina->pluck('id')->contains($m->id))->filter(fn($m) => str_contains(strtolower($m->position), 'direktur'));
                $sekretaris = $allMembers->reject(fn($m) => $pembina->pluck('id')->contains($m->id) || $direktur->pluck('id')->contains($m->id))->filter(fn($m) => str_contains(strtolower($m->position), 'sekretaris'));
                $usedIds = $pembina->pluck('id')->merge($direktur->pluck('id'))->merge($sekretaris->pluck('id'));
                $anggota = $allMembers->reject(fn($m) => $usedIds->contains($m->id));
            @endphp

            {{-- 1. Pembina --}}
            @if ($pembina->count() > 0)
                <div class="mb-20">
                    <div class="text-center mb-10">
                        <h2 style="font-size: 2.25rem; font-weight: 800; color: #ffffff; text-shadow: 0 3px 8px rgba(0,0,0,0.7); tracking-wide: 0.025em;">Pembina</h2>
                        <div style="width: 60px; height: 3px; background-color: #4ade80; margin: 0.5rem auto 0; border-radius: 9999px;"></div>
                    </div>
                    <div class="flex justify-center flex-wrap gap-8">
                        @foreach ($pembina as $member)
                            <div class="w-full max-w-md">
                                <x-team-card :member="$member" featured="true" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- 2. Direktur --}}
            @if ($direktur->count() > 0)
                <div class="mb-20">
                    <div class="text-center mb-10">
                        <h2 style="font-size: 2.25rem; font-weight: 800; color: #ffffff; text-shadow: 0 3px 8px rgba(0,0,0,0.7); tracking-wide: 0.025em;">Direktur</h2>
                        <div style="width: 60px; height: 3px; background-color: #4ade80; margin: 0.5rem auto 0; border-radius: 9999px;"></div>
                    </div>
                    <div class="flex justify-center flex-wrap gap-8">
                        @foreach ($direktur as $member)
                            <div class="w-full max-w-md">
                                <x-team-card :member="$member" featured="true" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- 3. Sekretaris --}}
            @if ($sekretaris->count() > 0)
                <div class="mb-20">
                    <div class="text-center mb-10">
                        <h2 style="font-size: 2.25rem; font-weight: 800; color: #ffffff; text-shadow: 0 3px 8px rgba(0,0,0,0.7); tracking-wide: 0.025em;">Sekretaris</h2>
                        <div style="width: 60px; height: 3px; background-color: #4ade80; margin: 0.5rem auto 0; border-radius: 9999px;"></div>
                    </div>
                    <div class="flex justify-center flex-wrap gap-8">
                        @foreach ($sekretaris as $member)
                            <div class="w-full max-w-md">
                                <x-team-card :member="$member" featured="true" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- 4. Anggota --}}
            @if ($anggota->count() > 0)
                <div class="mb-20">
                    <div class="text-center mb-10">
                        <h2 style="font-size: 2.25rem; font-weight: 800; color: #ffffff; text-shadow: 0 3px 8px rgba(0,0,0,0.7); tracking-wide: 0.025em;">Anggota</h2>
                        <div style="width: 60px; height: 3px; background-color: #4ade80; margin: 0.5rem auto 0; border-radius: 9999px;"></div>
                    </div>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($anggota as $member)
                            <x-team-card :member="$member" />
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>
</x-layout>
