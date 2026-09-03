<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class FoundationSeeder extends Seeder
{
    public function run(): void
    {
        // --- Site settings (key-value singleton). NPWP/rekening sengaja TIDAK ada (R4). ---
        $settings = [
            'hero_title' => 'Aksi Nyata untuk Lingkungan Berkelanjutan',
            'hero_subtitle' => 'Yayasan Green Invite Sembilan (GIS) menggerakkan kolaborasi lintas sektor untuk pengelolaan sampah, pemanfaatan limbah, dan edukasi iklim di Kabupaten Muara Enim.',
            'brand_bridge' => 'GIS adalah identitas digital Yayasan Green Invite Sembilan, lembaga lingkungan berbasis kolaborasi di Kabupaten Muara Enim.',
            'problem_statement' => 'Krisis iklim, tumpukan sampah dan limbah, keterbatasan air bersih, serta tekanan terhadap ekosistem dan energi adalah persoalan nyata di daerah. GIS hadir untuk menjawabnya lewat aksi lapangan yang terukur dan kemitraan yang sehat.',
            'address' => 'Jl. Tembesu No. 2, Kelurahan Pasar I, Kecamatan Muara Enim, Kabupaten Muara Enim, Sumatera Selatan',
            'email' => 'kontak@gis.or.id',
            'phone' => '+62 811-0000-0000',
            'whatsapp' => '628110000000',
            'social_instagram' => 'https://instagram.com/',
            'social_facebook' => '',
            'social_youtube' => '',
            'footer_text' => 'Lembaga lingkungan berbasis kolaborasi di Kabupaten Muara Enim, Sumatera Selatan.',
            'legal_akta' => 'Akta Pendirian Nomor 07 Tahun 2023, Notaris Eka Octha Reza, S.H., M.H., M.Kn.',
            'legal_kemenkumham' => 'Pengesahan KEMENKUMHAM AHU-0005984.AH.01.04 Tahun 2023',
        ];
        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // --- Halaman statis (Page) ---
        $pages = [
            [
                'key' => 'profil',
                'title' => 'Profil Yayasan',
                'body' => '<p>Yayasan Green Invite Sembilan (GIS) adalah lembaga lingkungan hidup berbasis kolaborasi yang berkedudukan di Kabupaten Muara Enim, Sumatera Selatan. GIS hadir sebagai wadah aksi nyata dalam menggerakkan sinergi lintas sektor menggandeng pemerintah, dunia usaha, akademisi, dan komunitas lokal untuk mengatasi krisis iklim.</p><h3>Filosofi Green Invite Sembilan (GIS)</h3><p>Melambangkan komitmen dan cita-cita terhadap pelestarian alam, keberlanjutan lingkungan yang berkeadilan merujuk pada identitas geografis dan budaya Sumatera Selatan yang dikenal dengan sebutan Batanghari Sembilan yang dialiri oleh sembilan (9) anak sungai. Angka 9 menjadi simbol bahwa gerakan GIS terhadap kepedulian lingkungan di bumi Sumatera Selatan mengalir sejauh aliran sungai Batanghari Sembilan.</p><p>Yayasan Green Invite Sembilan (GIS) berdiri sejak Tahun 2023 dengan Akta Pendirian: Nomor 07 Tahun 2023, Notaris: Eka Octha Reza, S.H., M.H., M.Kn. Keputusan Menteri Hukum Dan Hak Asasi Manusia Republik Indonesia: Nomor AHU-0005984.AH.01.04 Tahun 2023</p>',
            ],
            [
                'key' => 'visi',
                'title' => 'Visi GIS',
                'body' => '<p class="text-xl italic font-medium text-center text-gray-800 mb-6">"Mewujudkan lingkungan yang sehat, bersih, dan berkelanjutan di Kabupaten Muara Enim melalui kolaborasi lintas sektor."</p>',
            ],
            [
                'key' => 'misi',
                'title' => 'Misi GIS',
                'body' => '<ul class="space-y-4"><li>Mengelola sampah dan memanfaatkan limbah menjadi produk bernilai.</li><li>Mendorong budidaya tanaman bermanfaat bagi masyarakat dan ekosistem.</li><li>Mengampanyekan isu lingkungan, iklim, dan pembangunan berkelanjutan (Sustainable Development Goals).</li><li>Membangun kemitraan yang sehat dengan pemerintah, dunia usaha, kampus, dan komunitas.</li></ul>',
            ],
            [
                'key' => 'nilai',
                'title' => 'Nilai Dasar',
                'body' => '<ul><li><strong>Kolaborasi</strong> — bekerja bersama lintas sektor, bukan sendiri.</li><li><strong>Integritas</strong> — memisahkan dengan jujur antara capaian yang sudah berjalan dan rencana.</li><li><strong>Manfaat nyata</strong> — mengutamakan dampak yang dapat dirasakan masyarakat.</li><li><strong>Keberlanjutan</strong> — menjaga ekosistem untuk generasi mendatang.</li></ul>',
            ],
            [
                'key' => 'legalitas',
                'title' => 'Legalitas',
                // R4: hanya nomor akta & pengesahan KEMENKUMHAM. Tanpa NPWP/rekening.
                'body' => '<p>Yayasan Green Invite Sembilan berbadan hukum resmi:</p><ul><li><strong>Akta Pendirian:</strong> Nomor 07 Tahun 2023, Notaris Eka Octha Reza, S.H., M.H., M.Kn.</li><li><strong>Pengesahan KEMENKUMHAM:</strong> AHU-0005984.AH.01.04 Tahun 2023</li></ul>',
            ],
        ];
        foreach ($pages as $page) {
            Page::updateOrCreate(['key' => $page['key']], $page);
        }

        // --- Struktur organisasi (TeamMember) ---
        $members = [
            ['name' => 'Iwan Kurniawan', 'position' => 'Inisiator', 'group' => 'pembina', 'order' => 1, 'bio' => 'Dewan Pembina Yayasan GIS'],
            ['name' => 'Prof. Dr. Ir. Muhammad Said, M.Sc', 'position' => 'Dewan Pakar', 'group' => 'pakar', 'order' => 1, 'bio' => 'Universitas Sriwijaya'],
            ['name' => 'Sigit Eko Raharjo', 'position' => 'Sekretaris', 'group' => 'pengurus', 'order' => 2, 'bio' => 'Sekretaris Yayasan GIS'],
        ];
        foreach ($members as $m) {
            TeamMember::updateOrCreate(['name' => $m['name']], $m);
        }
    }
}
