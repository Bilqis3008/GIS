<?php

use App\Models\Publication;

Publication::query()->delete();

$pubs = [
    [
        'title' => 'Laporan Tahunan GIS 2025: Akselerasi Kemitraan Ekologis & Perhutanan Sosial Sumsel',
        'slug' => 'laporan-tahunan-gis-2025',
        'year' => 2025,
        'description' => 'Ringkasan capaian program kehutanan sosial, pendampingan kelompok tani, dan dampak konservasi lanskap Muara Enim.',
        'is_published' => true,
    ],
    [
        'title' => 'Kajian Potensi Karbon dan Cadangan Gambut Kabupaten Muara Enim',
        'slug' => 'kajian-potensi-karbon-muara-enim',
        'year' => 2025,
        'description' => 'Studi komprehensif metodologi perhitungan stok karbon dan pemetaan vegetasi penyangga ekosistem.',
        'is_published' => true,
    ],
    [
        'title' => 'Policy Brief: Rekomendasi Regulasi Perlindungan Keanekaragaman Hayati Sumsel',
        'slug' => 'policy-brief-regulasi-kehati-sumsel',
        'year' => 2024,
        'description' => 'Naskah kebijakan publik untuk mendorong regulasi daerah pro-lingkungan dan perlindungan koridor satwa.',
        'is_published' => true,
    ],
    [
        'title' => 'Panduan Praktis Agroforestri dan Pertanian Organik Bagi Kelompok Tani Hutan',
        'slug' => 'panduan-praktis-agroforestri-kth',
        'year' => 2024,
        'description' => 'Buku saku teknik budidaya ramah lingkungan, pembuatan kompos hayati, dan pengolahan hasil panen.',
        'is_published' => true,
    ],
];

foreach ($pubs as $p) {
    Publication::create($p);
}

echo "Publications seeded: " . Publication::count() . "\n";
