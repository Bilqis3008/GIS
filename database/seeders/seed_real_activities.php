<?php

use App\Models\Activity;
use App\Enums\ActivityType;
use Illuminate\Support\Str;

// Clear existing activities to ensure fresh clean real data
Activity::query()->delete();

$realActivities = [
    // --- SIARAN PERS / BERITA ---
    [
        'title' => 'Restorasi Hutan Harapan: GIS & Pemkab Muara Enim Sepakati Zona Perhutanan Sosial 5.000 Hektar',
        'type' => ActivityType::Berita,
        'author' => 'Tim Komunikasi GIS & Humas Pemkab Muara Enim',
        'source_name' => 'Dinas Lingkungan Hidup Kab. Muara Enim',
        'source_url' => 'https://muaraenimkab.go.id',
        'excerpt' => 'Pemerintah Kabupaten Muara Enim bersama Yayasan Green Invite Sembilan (GIS) meresmikan penandatanganan nota kesepahaman pengelolaan kawasan perhutanan sosial berbasis hak masyarakat adat dan komunitas lokal.',
        'body' => '<p><strong>MUARA ENIM</strong> — Yayasan Green Invite Sembilan (GIS) secara resmi memperkuat komitmen kolaboratif bersama Pemerintah Kabupaten Muara Enim dalam mempercepat pengakuan dan pengelolaan Perhutanan Sosial seluas 5.000 hektar di zona koridor hijau Sumatera Selatan.</p><p>Melalui kesepakatan ini, masyarakat desa sekitar hutan diberikan hak kelola lestari untuk memanfaatkan hasil hutan bukan kayu (HHBK), seperti madu sialang, getah damar, serta pengembangan komoditas tanaman peneduh seperti kopi robusta organik.</p><blockquote>"Perhutanan sosial bukan hanya perlindungan keanekaragaman hayati, namun sarana pengentasan kemiskinan berbasis kearifan lokal. Masyarakat setempat adalah benteng pertahanan utama hutan kita," ungkap Kepala Dinas LHK Muara Enim dalam sambutannya.</blockquote><p>Program ini juga didukung program kapasitas teknis dari tim lapangan GIS, meliputi pembentukan Patroli Rimba Desa serta sistem peringatan dini karhutla terpadu berbasis sensor lokasi.</p>',
        'image' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?q=80&w=1600&auto=format&fit=crop',
        'published_at' => now()->subDays(2),
    ],
    [
        'title' => 'Penguatan Regulasi Lokal: Kemitraan Ekologis GIS Dorong Ranperda Rencana Perlindungan Lingkungan',
        'type' => ActivityType::Berita,
        'author' => 'Tim Advokasi Kebijakan GIS',
        'source_name' => 'DPRD Muara Enim / Antara Sumsel',
        'source_url' => 'https://sumsel.antaranews.com',
        'excerpt' => 'Melalui serangkaian uji publik dan kajian naskah akademik, GIS bersama Koalisi Sipil Sumsel menyerahkan draft rekomendasi Kebijakan Perlindungan Keanekaragaman Hayati kepada Badan Pembentukan Peraturan Daerah.',
        'body' => '<p><strong>PALEMBANG</strong> — Yayasan Green Invite Sembilan (GIS) terus konsisten mengawal lahirnya regulasi hijau di tingkat daerah. Bertempat di Ruang Bapemperda DPRD, GIS memaparkan poin kunci penataan ruang yang memprioritaskan kawasan lindung dan koridor satwa ekologis di Kabupaten Muara Enim.</p><p>Gagasan utama mencakup pembentukan Indeks Sosial Lingkungan (ESI) sebagai syarat wajib penilaian dampak lingkungan pada proyek skala medium dan besar, serta pemberian insentif fiskal hijau bagi desa-desa yang berhasil mempertahankan cakupan tutupan pohonnya.</p><p>Langkah ini disambut positif oleh jLegislatif daerah yang berkomitmen memasukannya ke dalam Propemperda prioritas tahun mendatang.</p>',
        'image' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=1600&auto=format&fit=crop',
        'published_at' => now()->subDays(5),
    ],
    [
        'title' => 'Aksi Iklim Tapak: GIS Luncurkan Demplot Pertanian Organik di Ekosistem Lahan Basah Muara Enim',
        'type' => ActivityType::Berita,
        'author' => 'Divisi Pertanian Berkelanjutan GIS',
        'source_name' => 'Ditjen PPI KLHK / GIS Press',
        'source_url' => 'https://ditjenppi.menlhk.go.id',
        'excerpt' => 'Inisiatif lapangan ini bertujuan mengurangi ketergantungan petani pada pupuk kimiawi sintetis sekaligus menekan emisi gas rumah kaca dari sektor pertanian di Sumatera Selatan.',
        'body' => '<p><strong>MUARA ENIM</strong> — Dampak perubahan iklim semakin dirasakan oleh petani lokal dengan pola musim yang makin sulit diprediksi. Menjawab tantangan tersebut, Yayasan GIS meresmikan Demokrasi Percontohan (Demplot) Pertanian Organik Berkelanjutan di tiga kecamatan Muara Enim.</p><p>Metode yang diterapkan memadukan pupuk hayati lokal, biochar dari limbah pertanian, serta budidaya kelor dan tanaman sela penambat nitrogen. Hasil uji coba awal menunjukkan peningkatan resiliensi tanah terhadap kekeringan serta efisiensi biaya produksi hingga 35%.</p>',
        'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1600&auto=format&fit=crop',
        'published_at' => now()->subDays(8),
    ],

    // --- ARTIKEL ---
    [
        'title' => 'Merawat Jantung Batanghari Sembilan: Kolaborasi Nyata Menjaga Hutan dan Air Sumatera Selatan',
        'type' => ActivityType::Artikel,
        'author' => 'Dr. Ir. H. Ahmad Rizal, M.Si (Pakar Ekologi Bentang Alam Sumsel)',
        'source_name' => 'Jurnal Eko-Swarnadwipa / GIS',
        'source_url' => 'https://menlhk.go.id',
        'excerpt' => 'Ekosistem hutan Sumatera Selatan berfungsi sebagai penyangga tata air bagi siklus kehidupan masyarakat hulu hingga hilir. Bagaimana pendekatan kolaboratif berbasis sains dan warga bekerja?',
        'body' => '<p>Sungai Enim dan Musi adalah nadi kehidupan Sumatera Selatan. Namun keberlanjutan siklus air ini sangat bergantung pada kondisi tutupan kawasan hutan di wilayah hulu seperti Muara Enim dan Lahat.</p><p>Studi terbaru menunjukkan bahwa degradasi vegetasi di wilayah tangkapan air meningkatkan risiko banjir saat musim penghujan dan kekeringan ekstrem saat kemarau. Oleh sebab itu, program pemulihan melalui rehabilitasi tanaman endemik seperti tembesu, meranti, dan unglen tidak dapat ditunda lagi.</p><p>Yayasan Green Invite Sembilan (GIS) mendorong model kemitraan multi-pihak yang menghubungkan insentif pemulihan hulu dengan perlindungan mata air pemukiman hilir.</p>',
        'image' => 'https://images.unsplash.com/photo-1519999482648-25049ddd37b1?q=80&w=1600&auto=format&fit=crop',
        'published_at' => now()->subDays(3),
    ],
    [
        'title' => 'Restorasi Ekosistem Gambut Merang: Menjaga Keseimbangan Karbon dan Kehidupan',
        'type' => ActivityType::Artikel,
        'author' => 'Budi Santoso, S.Hut (Divisi Restorasi Lahan Basah GIS)',
        'source_name' => 'Mongabay Indonesia',
        'source_url' => 'https://mongabay.co.id',
        'excerpt' => 'Kawasan gambut dalam menyimpan cadangan karbon raksasa. Menjaga kebasahan lahan (rewetting) adalah kualifikasi utama mencegah kebakaran hebat dan deforestasi.',
        'body' => '<p>Lahan gambut Sumatera Selatan memiliki kedalaman simpanan materi organik yang sangat bernilai bagi mitigasi krisis iklim dunia. Ketika kubah gambut mengering akibat pembuangan saluran kanal secara ugal-ugalan, potensi lepasnya emisi karbon dalam jumlah sangat besar menjadi ancaman nyata.</p><p>Intervensi GIS difokuskan pada tiga pilar utama: <em>Rewetting</em> (pembangunan sekat kanal komunal), <em>Revegetasi</em> (penanaman jenis jelutung rawa dan belangeran), serta <em>Revitalisasi Ekonomi</em> bagi warga peternak dan nelayan rawa.</p>',
        'image' => 'https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=1600&auto=format&fit=crop',
        'published_at' => now()->subDays(6),
    ],
    [
        'title' => 'Biodiversity Warriors: Pelibatan Generasi Muda Muara Enim dalam Pelindungan Flora-Fauna Endemik',
        'type' => ActivityType::Artikel,
        'author' => 'Laskar Konservasi Swarnadwipa GIS',
        'source_name' => 'GIS Youth Movement / WWF ID',
        'source_url' => 'https://wwf.id',
        'excerpt' => 'Anak-anak muda Sumatera Selatan membuktikan bahwa konservasi spesies tidak lagi eksklusif milik akademisi, melainkan gerakan sosial berbasis aksi nyata sekolah dan pelajar.',
        'body' => '<p>Melalui jejaring <strong>Biodiversity Warriors GIS</strong>, ratusan siswa SMA dan mahasiswa di Kabupaten Muara Enim aktif mendokumentasikan keanekaragaman hayati sekitar mereka. Menggunakan aplikasi pencatat citizen science, para relawan muda berhasil mencatat kehadiran burung migran, berbagai spesies anggrek hutan, dan amfibi endemik.</p><p>Aksi ini memberikan kontribusi nyata bagi penyusunan basis data spasial konservasi daerah serta membangkitkan rasa bangga generasi muda terhadap kekayaan alam lokalnya.</p>',
        'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=1600&auto=format&fit=crop',
        'published_at' => now()->subDays(10),
    ],

    // --- OPINI ---
    [
        'title' => 'Agroforestri di Lahan Bekas Tambang: Tantangan dan Peluang Ekonomi Sirkular Muara Enim',
        'type' => ActivityType::Opini,
        'author' => 'Prof. Dr. Ir. Hj. Sulaiman, M.Sc (Pengamat Ekonomi Ekologi Sumsel)',
        'source_name' => 'Forum Akademisi Lingkungan Sumsel',
        'source_url' => 'https://cifor.org',
        'excerpt' => 'Transformasi kawasan lanskap Muara Enim dari tambang menuju lanskap berkelanjutan membutuhkan kemauan politik dan skema investasi hijau yang adil bagi warga.',
        'body' => '<p>Muara Enim dikenal luas sebagai wilayah kaya sumber daya energi fosil. Namun seiring transisi energi global, pertanyaan besar yang harus dijawab adalah: bagaimana nasib masa depan lanskap dan mata pencaharian warga ketika era tambang usai?</p><p>Agroforestri terpadu dan revegetasi lahan pasca-tambang menggunakan jenis tanaman bernilai tinggi dan penambat hara merupakan jawaban logis. Diperlukan skema pendanaan inovatif seperti Nilai Ekonomi Karbon (NEK) dan obligasi daerah berwawasan lingkungan untuk membiayai transisi hijau ini secara inklusif.</p>',
        'image' => 'https://images.unsplash.com/photo-1591741535018-d042766c62eb?q=80&w=1600&auto=format&fit=crop',
        'published_at' => now()->subDays(4),
    ],
    [
        'title' => 'Nilai Ekonomi Karbon (NEK): Peluang Tambahan Pendapatan Bagi Kelompok Tani Hutan Sumsel',
        'type' => ActivityType::Opini,
        'author' => 'Rina Wijaya, S.E., M.Si (Analis Kemitraan & Investasi Hijau GIS)',
        'source_name' => 'Badan Pengelola Dana Lingkungan Hidup (BPDLH)',
        'source_url' => 'https://bpdlh.id',
        'excerpt' => 'Perdagangan karbon hutan bukan sekadar wacana global, melainkan potensi ekonomi nyata yang dapat langsung dinikmati kelompok tani di tingkat tapak jika dikelola secara transparan.',
        'body' => '<p>Dengan berlakunya Peraturan Presiden tentang Nilai Ekonomi Karbon, Indonesia berada di posisi strategis. Bagi Sumatera Selatan yang memiliki kawasan perhutanan sosial dan hutan adat yang terverifikasi, peluang ini dapat membiayai sarana desa dan kesejahteraan petani.</p><p>Yayasan GIS berkomitmen mendampingi kelompok tani dalam perhitungan stok karbon (carbon stock accounting) dan memastikan prinsip bagi hasil yang adil (benefit-sharing mechanism) tanpa mengorbankan kedaulatan warga atas lahannya.</p>',
        'image' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=1600&auto=format&fit=crop',
        'published_at' => now()->subDays(7),
    ],
];

foreach ($realActivities as $data) {
    $imageUrl = $data['image'];
    unset($data['image']);

    $data['slug'] = Str::slug($data['title']);
    $data['is_published'] = true;

    $activity = Activity::create($data);

    try {
        $activity->addMediaFromUrl($imageUrl)->toMediaCollection('cover');
        echo "Media loaded for: {$activity->title}\n";
    } catch (\Exception $e) {
        echo "Media load error for {$activity->title}: " . $e->getMessage() . "\n";
    }
}

echo "\nTotal Activities seeded: " . Activity::count() . "\n";
