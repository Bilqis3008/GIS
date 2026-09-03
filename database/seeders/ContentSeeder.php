<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\ImpactStat;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // --- Program kerja ---
        $programs = [
            [
                'title' => 'Green Urban Tani — Pengelolaan Sampah & Kompos',
                'slug' => 'green-urban-tani',
                'icon' => 'heroicon-o-arrow-path',
                'order' => 1,
                'summary' => 'Mengolah sampah organik perkotaan menjadi kompos bernilai guna bersama komunitas tani urban.',
                'body' => '<p>Green Urban Tani adalah program pengelolaan sampah organik yang sudah berjalan. Sampah dipilah dan diolah menjadi kompos untuk mendukung pertanian urban di Muara Enim. Program ini menjadi bukti kerja nyata GIS dalam menurunkan timbulan sampah sekaligus menghasilkan produk bermanfaat.</p>',
            ],
            [
                'title' => 'Pemanfaatan FABA — Batako & Paving Block',
                'slug' => 'pemanfaatan-faba',
                'icon' => 'heroicon-o-cube',
                'order' => 2,
                'summary' => 'Mengolah limbah FABA (fly ash & bottom ash) menjadi batako dan paving block. Saat ini pada tahap penyiapan kapasitas.',
                'body' => '<p>Program pemanfaatan FABA mengubah limbah abu batu bara menjadi material konstruksi seperti batako dan paving block. Kapasitas produksi yang direncanakan masih dalam tahap penyiapan dan belum berproduksi penuh — angka kapasitas ditampilkan terpisah sebagai rencana dan target.</p>',
            ],
            [
                'title' => 'Budidaya Kelor (Moringa)',
                'slug' => 'budidaya-kelor',
                'icon' => 'heroicon-o-sparkles',
                'order' => 3,
                'summary' => 'Pengembangan demplot kelor sebagai tanaman bernilai gizi dan potensi manfaat lingkungan.',
                'body' => '<p>GIS mengembangkan demplot budidaya kelor sebagai tanaman bernilai gizi tinggi. Potensi kelor dalam menyerap karbon dan manfaat lingkungan lainnya masih pada tahap kajian dan riset, bukan capaian terukur. Proyeksi panen ditampilkan sebagai rencana, sesuai kondisi riil yang masih berupa demplot.</p>',
            ],
            [
                'title' => 'Edukasi & Advokasi Iklim',
                'slug' => 'edukasi-advokasi-iklim',
                'icon' => 'heroicon-o-megaphone',
                'order' => 4,
                // R2: edukasi/advokasi, BUKAN "carbon credit services".
                'summary' => 'Seminar dan kampanye seputar isu iklim, SDGs, dan carbon credit untuk meningkatkan kesadaran publik.',
                'body' => '<p>GIS menyelenggarakan seminar dan kegiatan edukasi mengenai isu iklim, Sustainable Development Goals (SDGs), dan konsep carbon credit. Fokus program ini adalah edukasi dan advokasi — meningkatkan kesadaran dan kapasitas masyarakat — bukan menjalankan proyek karbon tersertifikasi.</p>',
            ],
            [
                'title' => 'Air Bersih & Sanitasi',
                'slug' => 'air-bersih-sanitasi',
                'icon' => 'heroicon-o-beaker',
                'order' => 5,
                'summary' => 'Mendorong akses air bersih dan sanitasi yang sehat bagi masyarakat di sekitar wilayah kerja.',
                'body' => '<p>Program air bersih dan sanitasi mengarah pada peningkatan akses masyarakat terhadap air bersih serta praktik sanitasi yang sehat, sebagai bagian dari upaya menjaga ekosistem dan kesehatan lingkungan.</p>',
            ],
        ];
        foreach ($programs as $p) {
            Program::updateOrCreate(['slug' => $p['slug']], $p + ['is_published' => true]);
        }

        // --- Angka dampak (ImpactStat). R1: pisah tegas realized vs planned. ---
        $stats = [
            // REALIZED — Green Urban Tani (kompos), sudah berjalan.
            [
                'label' => 'Sampah dikelola', 'value' => '15 ton', 'status' => 'realized',
                'period' => 'per bulan', 'note' => 'Program Green Urban Tani',
                'source_label' => 'Laporan Kegiatan Green Urban Tani', 'order' => 1,
            ],
            [
                'label' => 'Kompos diproduksi', 'value' => '3–4 ton', 'status' => 'realized',
                'period' => 'per bulan', 'note' => 'Hasil olahan sampah organik',
                'source_label' => 'Laporan Kegiatan Green Urban Tani', 'order' => 2,
            ],
            // PLANNED — kapasitas rencana / proyeksi, BUKAN capaian.
            [
                'label' => 'Kapasitas batako & paving', 'value' => '500 unit', 'status' => 'planned',
                'period' => 'per hari', 'note' => 'Kapasitas rencana, belum produksi penuh',
                'source_label' => 'Profil Yayasan GIS 2023', 'order' => 3,
            ],
            [
                'label' => 'FABA terolah', 'value' => '1,5 ton', 'status' => 'planned',
                'period' => 'per minggu', 'note' => 'Kapasitas rencana',
                'source_label' => 'Profil Yayasan GIS 2023', 'order' => 4,
            ],
            [
                'label' => 'Panen kelor (proyeksi)', 'value' => '1,5 ton', 'status' => 'planned',
                'period' => 'per panen', 'note' => 'Proyeksi literatur; kondisi riil masih demplot',
                'source_label' => 'Profil Yayasan GIS 2023', 'order' => 5,
            ],
        ];
        foreach ($stats as $s) {
            ImpactStat::updateOrCreate(['label' => $s['label']], $s);
        }

        // --- Mitra (Partner). Logo menyusul via admin; strip menampilkan nama bila logo kosong. ---
        $partners = [
            ['name' => 'Pemerintah Kabupaten Muara Enim', 'category' => 'pemerintah', 'order' => 1],
            ['name' => 'KADIN Kabupaten Muara Enim', 'category' => 'usaha', 'order' => 1],
            ['name' => 'Universitas Sriwijaya', 'category' => 'kampus', 'order' => 1],
            ['name' => 'Komunitas Green Urban Tani', 'category' => 'komunitas', 'order' => 1],
        ];
        foreach ($partners as $p) {
            Partner::updateOrCreate(['name' => $p['name']], $p);
        }

        // --- Berita / kegiatan (Activity) ---
        $activities = [
            [
                'title' => 'Seminar SDGs dan Carbon Credit untuk Pelaku Usaha',
                'slug' => 'seminar-sdgs-carbon-credit',
                'type' => 'kegiatan',
                'excerpt' => 'GIS menggelar seminar edukasi mengenai SDGs dan konsep carbon credit bagi pelaku usaha di Muara Enim.',
                'body' => '<p>Yayasan Green Invite Sembilan menyelenggarakan seminar edukasi mengenai Sustainable Development Goals (SDGs) dan konsep carbon credit. Kegiatan ini bertujuan meningkatkan pemahaman pelaku usaha terhadap isu keberlanjutan, bukan menjual kredit karbon.</p>',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Pelatihan Pengomposan Bersama Green Urban Tani',
                'slug' => 'pelatihan-pengomposan-green-urban-tani',
                'type' => 'kegiatan',
                'excerpt' => 'Warga dilatih memilah dan mengolah sampah organik menjadi kompos bersama komunitas tani urban.',
                'body' => '<p>Program Green Urban Tani mengadakan pelatihan pengomposan bagi warga. Sampah organik dipilah dan diolah menjadi kompos yang dapat dimanfaatkan kembali untuk pertanian urban.</p>',
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Demplot Kelor Memasuki Tahap Pengembangan',
                'slug' => 'demplot-kelor-pengembangan',
                'type' => 'berita',
                'excerpt' => 'Demplot budidaya kelor GIS terus dikembangkan sebagai kajian tanaman bernilai gizi dan potensi lingkungan.',
                'body' => '<p>Demplot budidaya kelor yang dikembangkan GIS memasuki tahap pengembangan lanjutan. Potensi manfaat lingkungan kelor masih dalam kajian dan riset.</p>',
                'published_at' => now()->subDays(35),
            ],
        ];
        foreach ($activities as $a) {
            Activity::updateOrCreate(['slug' => $a['slug']], $a + ['is_published' => true]);
        }
    }
}
