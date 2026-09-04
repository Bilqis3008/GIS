<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Activity;
use App\Enums\ActivityType;
use Illuminate\Support\Str;

// 1. Change all existing 'artikel' to 'berita'
$updated = Activity::where('type', ActivityType::Artikel)->update(['type' => ActivityType::Berita]);
echo "Changed $updated existing articles to 'berita' (Siaran Pers).\n";

// 2. Insert the new article
$title = "Merawat Jantung Batanghari Sembilan: Kolaborasi Nyata Menjaga Hujan dan Hutan Sumatera Selatan";
$body = "<p>Menelusuri sejarah panjang ekologi Sumatera Selatan tidak akan pernah terlepas dari filosofi luhur <em>Batanghari Sembilan</em>. Sembilan sungai besar yang mengalir membelah daratan Sriwijaya ini bukan sekadar urat nadi perairan, melainkan pilar penyangga kehidupan. Layaknya sebuah tubuh, sungai ini bertumpu pada \"jantung\" yang menopangnya dengan air jernih dan udara segar: yakni hamparan tutupan hutan yang terjaga. Namun, di tengah pesatnya dinamika pembangunan dan pergeseran lanskap di Sumatera Selatan, termasuk di kawasan Muara Enim, hutan kita terus menghadapi tantangan berat berupa ancaman degradasi lahan yang menggerus fungsi ekologisnya secara perlahan. Realitas tutupan hutan hari ini menuntut kita memikirkan ulang relasi antara manusia dengan alam, bahwa merawat wilayah hilir sebuah sungai tidak bermakna tanpa konservasi yang kuat di bagian hulu.</p><p>Tantangan di lapangan sungguh nyata dan tidak bisa disederhanakan. Mulai dari menurunnya fungsi hidrologi kawasan akibat alih fungsi lahan besar-besaran, hingga masih minimnya penerapan sistem wanatani (agroforestri) yang ramah lingkungan di tengah masyarakat. Solusi dari permasalahan ini tidak dapat disandarkan pada satu atau dua pihak saja, melainkan membutuhkan ekosistem kolaborasi multipihak yang berakar pada semangat <em>Perhutanan Sosial</em>. Saat masyarakat lokal diberikan akses dan kapasitas untuk mengelola lahan pinggiran hutan secara berkelanjutan—seperti sistem tumpangsari unggulan yang tidak menebang kayu inti—mereka tidak hanya menjaga hutan untuk tetap bernapas, tetapi juga memberdayakan ketahanan ekonomi keluarga. Di sinilah sinergi terjalin: Pemerintah daerah menyiapkan payung kebijakan; kalangan akademisi meramu riset untuk bibit dan teknik tanam yang tepat; dunia usaha memberikan dukungan melalui investasi hijau dan CSR; sementara lembaga kolaborator seperti Yayasan Green Invite Sembilan (GIS) hadir mendampingi masyarakat sebagai garda terdepan penjaga bumi.</p><p>Oleh karena itu, menjaga kelestarian bukit dan rimba Sumatera Selatan adalah menjaga masa depan anak cucu kita dari ancaman krisis hidrologi. Ini adalah panggilan untuk bertindak bersama. Kepada para pemangku kebijakan, perusahaan, akademisi, dan seluruh masyarakat Bumi Sriwijaya—khususnya di Muara Enim—mari ambil peran. Dukung inisiatif perhutanan sosial, investasikan energi pada ekonomi hijau, dan mulai wujudkan kepedulian melalui aksi-aksi kecil berbasis komunitas. Bergabunglah bersama kami dalam jejaring kebaikan, merawat bumi, karena dari hulu sungai yang lestari akan mengalir kesejahteraan yang tak pernah henti hingga ke muara.</p>";
$excerpt = "Menelusuri sejarah panjang ekologi Sumatera Selatan tidak akan pernah terlepas dari filosofi luhur Batanghari Sembilan, di mana merawat hulu adalah kunci menjaga kehidupan.";

$activity = Activity::create([
    'title' => $title,
    'slug' => Str::slug($title),
    'type' => ActivityType::Artikel,
    'excerpt' => $excerpt,
    'body' => $body,
    'published_at' => now(),
    'is_published' => true,
]);

echo "Created new article: {$activity->title}\n";
