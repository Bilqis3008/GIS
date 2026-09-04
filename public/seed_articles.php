<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Activity;
use App\Enums\ActivityType;
use Illuminate\Support\Str;

$articles = [
    [
        'title' => 'Menghijaukan Kembali Pesisir Muara Enim: Refleksi Peran Pemuda dalam Konservasi Lahan',
        'excerpt' => 'Pemuda memegang peranan krusial dalam menjaga keseimbangan alam. Di Muara Enim, inisiatif generasi muda mulai mengubah lahan kritis menjadi hijau kembali.',
        'body' => '<p>Sumatera Selatan, khususnya Kabupaten Muara Enim, bukan hanya kaya akan sumber daya energi, tetapi juga memiliki potensi ekologi yang luar biasa. Namun, eksploitasi alam yang berkepanjangan telah meninggalkan jejak lahan kritis yang mengkhawatirkan. Di sinilah peran pemuda menjadi sangat krusial. Merujuk pada filosofi Batanghari Sembilan, setiap upaya penyelamatan hulu harus dibarengi dengan aksi nyata di tingkat tapak yang diinisiasi oleh masyarakat setempat, tak terkecuali generasi mudanya.</p><p>Generasi muda Muara Enim tidak boleh hanya berpangku tangan melihat perubahan bentang alam di sekitar mereka. Keterlibatan aktif dalam penanaman pohon, restorasi lahan kritis, dan kampanye peduli lingkungan melalui platform digital adalah langkah-langkah strategis yang harus terus didorong. Melalui kolaborasi dengan organisasi non-pemerintah seperti Yayasan Green Invite Sembilan, para pemuda mulai mendapatkan wadah untuk berekspresi sekaligus berkontribusi nyata. Langkah ini membuktikan bahwa gerakan kepemudaan bukan sekadar wacana, melainkan aksi konkrit yang berdampak positif pada ekosistem lokal.</p><p>Kini saatnya bagi pemuda di seluruh Sumatera Selatan untuk bangkit dan mengambil kendali. Jangan biarkan warisan kita untuk generasi mendatang berupa daratan tandus dan sungai yang tercemar. Mari kita bersama-sama mewujudkan Muara Enim yang lebih hijau dan lestari. Bergabunglah dalam setiap aksi konservasi di lingkungan Anda!</p>'
    ],
    [
        'title' => 'Agroforestri: Menjembatani Kepentingan Ekonomi dan Ekologi di Sumatera Selatan',
        'excerpt' => 'Sistem wanatani atau agroforestri menjadi solusi cerdas bagi petani lokal untuk tetap produktif secara ekonomi tanpa harus merusak kelestarian hutan alam.',
        'body' => '<p>Konflik antara pelestarian lingkungan dan kebutuhan ekonomi masyarakat seringkali menjadi tantangan terbesar dalam pengelolaan kawasan hutan di Sumatera Selatan. Sebagian besar masyarakat di sekitar hutan menggantungkan hidupnya pada hasil alam. Namun, ekspansi perkebunan monokultur terkadang mengancam keanekaragaman hayati dan merusak siklus hidrologi lokal. Sebagai jawaban atas persoalan ini, perhutanan sosial dengan model agroforestri (wanatani) hadir sebagai jalan tengah yang efektif.</p><p>Agroforestri memungkinkan masyarakat menanam tanaman bernilai ekonomi, seperti kopi atau karet, di sela-sela tegakan pohon kehutanan tanpa perlu melakukan penebangan liar. Di Kabupaten Muara Enim, praktik ini mulai menunjukkan hasil yang menjanjikan. Tanaman sela yang dipadukan dengan komoditas buah-buahan lokal tidak hanya menjaga kekuatan struktur tanah dari erosi, tetapi juga memberikan pendapatan rotasi bagi para petani. Dalam ekosistem yang terintegrasi ini, perusahaan dapat memberikan dukungan benih, akademisi menyumbang inovasi pemupukan berbasis organik, sedangkan pemerintah menjamin legalitas kelola lahan bagi komunitas.</p><p>Model ini harus kita dorong sebagai sistem yang arus utama (mainstream) di sektor kehutanan Sumsel. Mari kita apresiasi dan dukung produk-produk pertanian hasil dari praktik agroforestri ramah lingkungan. Dengan membeli produk lokal dari petani komunitas, kita turut serta menjaga detak jantung hutan kita.</p>'
    ],
    [
        'title' => 'Sinergi Dunia Usaha dan Komunitas: CSR sebagai Katalisator Pemulihan Hutan',
        'excerpt' => 'Tanggung Jawab Sosial Perusahaan (CSR) yang tepat sasaran dapat menjadi motor penggerak percepatan restorasi ekosistem lanskap di Muara Enim.',
        'body' => '<p>Sumatera Selatan, khususnya wilayah Muara Enim, merupakan pusat dari berbagai aktivitas industri strategis. Di balik roda ekonomi yang terus berputar, terselip tanggung jawab besar terhadap pelestarian kawasan resapan air. Salah satu instrumen paling potensial yang belum dioptimalkan sepenuhnya adalah dana Tanggung Jawab Sosial Perusahaan (Corporate Social Responsibility/CSR). CSR tidak seharusnya hanya berfokus pada pembangunan infrastruktur fisik atau acara seremonial semata, tetapi perlu dialihkan secara masif pada pemulihan bentang alam.</p><p>Ketika perusahaan berani mengambil langkah agresif untuk mengintegrasikan program CSR dengan inisiatif restorasi hutan, hasilnya bisa sangat luar biasa. Dukungan finansial yang disalurkan melalui yayasan penggiat lingkungan lokal, seperti GIS, memungkinkan pengadaan bibit kualitas tinggi, pelatihan kapasitas warga, hingga pemantauan lahan jangka panjang. Kolaborasi ini mengubah paradigma: perusahaan bukan lagi dilihat semata-mata sebagai entitas pengeksploitasi, melainkan mitra aktif pelestari lingkungan. Harmonisasi ini merupakan pengejawantahan sejati dari pelestarian ekosistem daratan hulu menuju hilir.</p><p>Kepada para pelaku industri di Muara Enim dan sekitarnya, ubahlah dana sosial Anda menjadi investasi hijau yang berkelanjutan. Karena bisnis yang sehat hanya bisa tumbuh di atas alam yang seimbang. Mari wujudkan program kemitraan perlindungan lahan sekarang juga.</p>'
    ],
    [
        'title' => 'Dari Hulu ke Hilir: Merawat Siklus Air Muara Enim Melalui Konservasi Rimba',
        'excerpt' => 'Deforestasi di dataran tinggi berdampak langsung pada debit air di hilir. Pemulihan kawasan resapan di Muara Enim adalah kunci ketersediaan air bersih.',
        'body' => '<p>Air adalah komponen kehidupan yang mengikat setiap makhluk hidup. Di koridor ekologi Batanghari Sembilan, ketersediaan air di kawasan hilir sungai sangat bergantung pada pepohonan di kawasan hulu dan dataran tinggi penyangga. Sayangnya, pembukaan tutupan hutan di wilayah tangkapan air Muara Enim telah memicu berbagai masalah ekologi ganda: kekeringan di musim kemarau dan kerawanan banjir saat curah hujan tinggi. Hal ini membuktikan bahwa tanpa hutan rawa dan pepohonan keras, tanah kehilangan fungsinya sebagai spons raksasa penyerap air.</p><p>Intervensi untuk memperbaiki siklus hidrologi ini membutuhkan waktu dan kesabaran. Salah satu pendekatan konkret adalah reboisasi di wilayah-wilayah perbatasan sungai dan pemukiman (riparian). Di sinilah pentingnya peran komunitas untuk menanam jenis pohon endemik penyerap air. Namun, ini tidak cukup jika hanya menjadi aksi sepihak. Perlindungan kawasan resapan harus ditetapkan dan dikawal oleh kebijakan tata ruang pemerintah yang ketat. Kolaborasi akademisi untuk memetakan akuifer tanah juga sangat dibutuhkan agar target penanaman menjadi presisi.</p><p>Penyelamatan sumber daya air adalah usaha tanpa henti. Kepada seluruh masyarakat dan pihak berwenang, mari selamatkan sungai-sungai kita dengan menyetop penebangan liar di hulu. Dukung terus perluasan kawasan hijau dan sadari bahwa air yang mengalir ke rumah kita adalah hasil dari pohon-pohon yang berdiri tegak.</p>'
    ],
    [
        'title' => 'Pendekatan Kultural dalam Perlindungan Hutan: Belajar dari Kearifan Lokal',
        'excerpt' => 'Masyarakat tradisional di Sumatera Selatan memiliki kearifan luhur tentang cara mengelola dan menjaga batas-batas alam dengan penuh hormat.',
        'body' => '<p>Dalam wacana konservasi modern, kita seringkali melupakan satu elemen esensial yang telah hidup ratusan tahun: kearifan lokal. Masyarakat Sumatera Selatan sejak dahulu telah mengadopsi prinsip perlindungan alam dalam adat dan budayanya, yang secara implisit melarang eksploitasi rakus. Misalnya, adanya wilayah hutan adat atau "rimbo larangan" yang tidak boleh ditebang untuk menjaga pasokan air serta kelangsungan hidup satwa endemik. Nilai-nilai inilah yang sebenarnya sejalan dengan hukum ekologi kontemporer yang kini kita perjuangkan dengan payah.</p><p>Pendekatan kultural ini perlu dibangkitkan kembali di berbagai pelosok, termasuk Kabupaten Muara Enim. Mencegah kebakaran hutan atau perluasan lahan ilegal bisa jauh lebih efektif ketika kita melibatkan tokoh-tokoh adat dan pimpinan agama lokal untuk menyuarakan bahwa "merusak alam adalah tindakan melawan norma asasi kehidupan". Ketika aktivis, pemerintah, dan pemangku adat duduk dalam satu lingkaran kolaborasi, pesan perlindungan alam akan lebih mudah dicerna dan dipatuhi oleh masyarakat di basis terbawah ketimbang regulasi formal semata.</p><p>Oleh karenanya, meramu strategi kampanye lingkungan tidak boleh tercabut dari akar budayanya. Mari kita rangkul kembali identitas kultural tersebut; lestarikan bumi dengan bahasa cinta yang diajarkan oleh leluhur kita demi menjaga Sumatera Selatan yang harmonis.</p>'
    ],
    [
        'title' => 'Potensi Karbon: Ekonomi Hijau yang Menjanjikan dari Perhutanan Sosial',
        'excerpt' => 'Selain hasil hutan bukan kayu, perdagangan karbon membuka peluang ekonomi baru bagi komunitas penjaga hutan di wilayah Muara Enim.',
        'body' => '<p>Dunia sedang berpacu mengatasi perubahan iklim, dan Indonesia, khususnya provinsi Sumatera Selatan, memiliki andil besar dalam aksi reduksi gas rumah kaca. Di sinilah tersimpan sebuah potensi yang masih jarang disentuh: komodifikasi layanan ekosistem, khususnya serapan karbon (carbon sink). Ketika masyarakat di Muara Enim diberikan hak perhutanan sosial dan secara konsisten menjaga agar pohon tidak ditebang, udara bersih yang mereka hasilkan sebenarnya memiliki nilai ekonomi tinggi di pasar karbon global.</p><p>Peluang ekonomi baru ini menuntut pemahaman dan persiapan kapasitas yang sangat mumpuni. Para akademisi dan pihak ketiga seperti Yayasan GIS dapat memfasilitasi pengenalan proyek percontohan REDD+ skala lokal bagi para kelompok tani hutan. Melalui verifikasi karbon, penduduk desa bisa mendapatkan kompensasi langsung sebagai bentuk insentif karena telah menjaga tutupan kawasan tetap utuh. Mekanisme ini jelas menggeser doktrin lama, meyakinkan bahwa membiarkan pohon hidup justru jauh lebih menguntungkan daripada mengubahnya menjadi sebatang gelondongan kayu belaka.</p><p>Ini bukan hanya tentang uang, tetapi tentang menciptakan skema keberlanjutan. Mari jadikan wacana perdagangan karbon sebagai katalisator perlindungan alam desa kita. Dukung para pegiat lokal untuk meningkatkan kapasitas mereka, sehingga masa depan ekologi dan ekonomi dapat saling menyokong.</p>'
    ],
    [
        'title' => 'Edukasi Ekologi Sejak Dini: Menumbuhkan "Biodiversity Warriors" di Sekolah',
        'excerpt' => 'Masa depan pelestarian lingkungan Sumsel ada di tangan generasi penerus. Pendidikan lingkungan harus masuk ke dalam ruang kelas secara nyata, bukan sekadar teori.',
        'body' => '<p>Salah satu krisis laten dalam perlindungan ekologi adalah putusnya transmisi pengetahuan dari generasi terdahulu kepada generasi saat ini. Anak-anak yang tumbuh di kawasan industrialisasi sering kali terasing dari alam. Di Muara Enim, di mana lanskapnya memperlihatkan dinamika kompleks antara alam dan tambang, pendidikan lingkungan hidup bagi anak-anak usia sekolah tidak bisa lagi ditunda. Kita membutuhkan barisan "Biodiversity Warriors"—pahlawan-pahlawan muda keanekaragaman hayati yang sejak dini dilatih memahami betapa integralnya elemen air, tanah, dan vegetasi.</p><p>Praktik edukasi lingkungan yang mengakar tidaklah melulu di dalam kelas, melainkan harus berupa eksplorasi langsung ke alam bebas dan menelusuri alur sungai-sungai yang bermuara di Batanghari Sembilan. Melalui program kolaborasi antara dinas pendidikan, lembaga swadaya, dan sekolah, anak-anak diajarkan cara membibit pohon, mengidentifikasi satwa spesies kunci, serta mendaur ulang sampah organik. Pengalaman sensorik dan kognitif inilah yang akan membekaskan empati dan kepedulian yang mendalam, membentuk mereka menjadi calon pengambil keputusan yang visioner di masa depan.</p><p>Penyelamatan lingkungan adalah usaha lintas generasi. Kepada para pendidik dan orang tua, bawalah alam mendekat kepada anak-anak kita. Berikan mereka literasi lingkungan, karena di tangan merekalah nasib nafas Hutan Sumatera Selatan nantinya dipertaruhkan.</p>'
    ],
];

echo "Mulai menambahkan artikel ke database...\n";
$i = 1;
foreach ($articles as $article) {
    try {
        $activity = Activity::create([
            'title' => $article['title'],
            'slug' => Str::slug($article['title']) . '-' . rand(1000, 9999), // Prevent overlapping slugs
            'type' => ActivityType::Artikel,
            'excerpt' => $article['excerpt'],
            'body' => $article['body'],
            'published_at' => now()->subHours($i * 2), // staggered dates
            'is_published' => true,
        ]);
        echo "[$i] Berhasil menambahkan: {$activity->title}\n";
    } catch (\Exception $e) {
        echo "[$i] Gagal menambahkan: " . $e->getMessage() . "\n";
    }
    $i++;
}

echo "Selesai!\n";
