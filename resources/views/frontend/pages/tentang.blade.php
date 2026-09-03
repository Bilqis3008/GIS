<x-layout title="Tentang" description="Profil, visi-misi, struktur organisasi, dan legalitas Yayasan Green Invite Sembilan (GIS).">
    {{-- Hero Section with Background (Siapa Kami + Visi Misi) --}}
    <section id="siapa-kami" class="relative scroll-mt-24" style="background-image: url('{{ asset('images/bg-siapakami.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat; min-height: 100vh; padding: 6rem 0; margin-bottom: 3rem;">
        <style>
            .prose-gis-invert :is(h2, h3) { color: white !important; margin-top: 2rem; margin-bottom: 0.75rem; font-size: 1.5rem; }
            .prose-gis-invert p { color: rgba(255, 255, 255, 0.95) !important; font-size: 1.05rem; line-height: 1.7; margin-bottom: 1rem; }
            .prose-gis-invert ul { color: rgba(255, 255, 255, 0.95) !important; font-size: 1.05rem; margin-bottom: 1rem; padding-left: 1.5rem; list-style-type: disc; }
            
            .dark-card {
                background-color: rgba(28, 46, 38, 0.55);
                border-radius: 1.5rem;
                padding: 2.5rem;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
                backdrop-filter: blur(8px);
                border: 1px solid rgba(255,255,255,0.15);
                width: 100%;
                margin: 0 auto;
            }
            @media (min-width: 768px) {
                .dark-card { width: 85%; padding: 3.5rem; }
            }
            @media (min-width: 1024px) {
                .dark-card { width: 75%; }
            }
        </style>
        
        <div class="absolute inset-0 bg-black/10"></div> {{-- Subtle overlay for contrast --}}

        <div class="mx-auto w-full max-w-[1200px] px-5 relative z-10 flex flex-col gap-16">
            
            {{-- Profil / Siapa Kami --}}
            @if ($profil = $pages->get('profil'))
                <div class="dark-card">
                    <p style="color: #4ade80; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem; font-size: 0.875rem; text-align: center;">Tentang</p>
                    <h1 style="font-size: 2.5rem; font-weight: 700; color: white; line-height: 1.2; margin-bottom: 0.5rem; text-align: center;">Yayasan Green Invite Sembilan (GIS)</h1>
                    <h2 style="font-size: 1.75rem; font-weight: 600; color: rgba(255,255,255,0.9); margin-bottom: 1.5rem; text-align: center;">{{ $profil->title }}</h2>
                    <div class="prose-gis-invert">{!! $profil->body !!}</div>
                </div>
            @endif

            {{-- Visi & Misi (Terletak di bawah Siapa Kami, di atas Nilai-Nilai Dasar) --}}
            <div id="visi-misi" class="flex flex-col gap-8 scroll-mt-24 mt-12 md:mt-16">
                @if ($visi = $pages->get('visi'))
                    <div style="background-color: white; border-radius: 1.5rem; padding: 3rem; box-shadow: 0 15px 50px -12px rgba(0,0,0,0.25); border: 1px solid #f3f4f6;" class="flex flex-col md:flex-row items-center gap-8 md:gap-12 relative overflow-hidden">
                        <div class="w-full md:w-1/2 text-center md:text-left z-10">
                            <h2 style="color: #166534; font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem;">{{ $visi->title }}</h2>
                            <div style="font-size: 1.25rem; line-height: 1.8; color: #1f2937;">{!! $visi->body !!}</div>
                        </div>
                        <div class="w-full md:w-1/2 flex justify-center z-10">
                            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&w=600&q=80" alt="Ilustrasi Visi" style="max-height: 280px; object-fit: cover; border-radius: 1rem; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);">
                        </div>
                    </div>
                @endif

                @if ($misi = $pages->get('misi'))
                    <div style="background-color: white; border-radius: 1.5rem; padding: 3rem; box-shadow: 0 15px 50px -12px rgba(0,0,0,0.25); border: 1px solid #f3f4f6;" class="relative overflow-hidden">
                        <h2 style="color: #166534; font-size: 2.25rem; font-weight: 700; margin-bottom: 2rem; text-align: center;">{{ $misi->title }}</h2>
                        <div style="font-size: 1.125rem; line-height: 1.8; color: #374151;">{!! $misi->body !!}</div>
                    </div>
                @endif
            </div>

        </div>
    </section>

    @if ($nilai = $pages->get('nilai'))
        <section id="nilai" class="mx-auto max-w-[1200px] px-5 pb-20 scroll-mt-24">
            <div class="rounded-2xl bg-cream p-8 md:p-10 shadow-sm border border-orange-100">
                <h2 class="text-2xl font-bold text-ink mb-4 text-center">{{ $nilai->title }}</h2>
                <div class="prose-gis mt-3 mx-auto max-w-3xl">{!! $nilai->body !!}</div>
            </div>
        </section>
    @endif

</x-layout>
