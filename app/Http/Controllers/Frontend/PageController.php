<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\TeamMember;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function tentang(): View
    {
        return view('frontend.pages.tentang', [
            'pages' => Page::all()->keyBy('key'),
            'team' => TeamMember::with('media')->orderBy('order')->get()->groupBy(fn ($m) => $m->group->value),
        ]);
    }

    public function struktur(): View
    {
        return view('frontend.pages.struktur', [
            'team' => TeamMember::with('media')->orderBy('order')->get()->groupBy(fn ($m) => $m->group->value),
        ]);
    }

    public function aksi(): View
    {
        return view('frontend.pages.aksi');
    }

    public function aksiDetail(string $slug): View
    {
        $programs = [
            'kehutanan' => [
                'title' => 'Jaga Rimba Muara Enim',
                'sub' => 'Konservasi & Restorasi',
                'desc' => 'Berfokus pada pelindungan kawasan hutan dan penanaman pohon endemik khas Sumatera Selatan. Ekosistem hutan yang sehat berperan vital dalam menjaga keseimbangan iklim global dan menjadi rumah bagi keanekaragaman hayati kita. Melalui skema perhutanan sosial, kami memberdayakan masyarakat agar mampu menjaga ekosistem sekaligus memajukan kesejahteraan lokal.',
                'image' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?q=80&w=1920&auto=format&fit=crop'
            ],
            'pertanian' => [
                'title' => 'Tani Organik Bumi Sriwijaya',
                'sub' => 'Pertanian Berkelanjutan',
                'desc' => 'Mendorong praktik pertanian ramah lingkungan dan organik bagi para petani lokal di Muara Enim. Kami terus mengedukasi pengurangan bahan kimia berbahaya demi menjaga kesuburan lahan dalam jangka panjang serta memproduksi hasil panen yang lebih sehat.',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1920&auto=format&fit=crop'
            ],
            'perkebunan' => [
                'title' => 'Harmoni Kebun Sumsel',
                'sub' => 'Agrikultur Bijak',
                'desc' => 'Menerapkan metode ketahanan agrikultur yang berkelanjutan pada sektor persawitan dan perkebunan di Sumatera Selatan. Pemanfaatan lahan dilakukan secara bijaksana untuk meminimalisasi deforestasi, mengurangi degradasi tanah, serta mendukung produktivitas alamiah.',
                'image' => 'https://images.unsplash.com/photo-1591741535018-d042766c62eb?q=80&w=1920&auto=format&fit=crop'
            ],
            'perubahan-iklim' => [
                'title' => 'Aksi Iklim Tapak Bumi',
                'sub' => 'Mitigasi & Adaptasi',
                'desc' => 'Terjun langsung ke wilayah pedesaan untuk menghadapi dampak pemanasan global di area rentan Muara Enim. Kami membangun ketangguhan masyarakat melalui edukasi adaptasi dan mitigasi iklim yang terukur guna melindungi komunitas dari cuaca ekstrem.',
                'image' => 'https://images.unsplash.com/photo-1519999482648-25049ddd37b1?q=80&w=1920&auto=format&fit=crop'
            ],
            'advokasi-kebijakan' => [
                'title' => 'Kemitraan Kebijakan Ekologis',
                'sub' => 'Kawal Regulasi Hijau',
                'desc' => 'Bersinergi aktif bersama Pemerintah Daerah Muara Enim dan Provinsi untuk mengawal regulasi lingkungan. Kami memfasilitasi dialog publik demi melahirkan kebijakan inklusif yang pro-kelestarian alam, mengedepankan hak perlindungan lingkungan sebagai pondasi pembangunan berkelanjutan.',
                'image' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=1920&auto=format&fit=crop'
            ],
            'biodiversity-warriors' => [
                'title' => 'Laskar Konservasi Swarnadwipa',
                'sub' => 'Pelibatan Pemuda',
                'desc' => 'Menggandeng generasi muda dan relawan lokal dalam aksi nyata melindungi flora dan fauna endemik Sumatera Selatan. Kami yakin energi pemuda adalah garda terdepan perlindungan keanekaragaman hayati, menjadikan aksi konservasi sebagai tren yang membawa dampak abadi.',
                'image' => 'https://images.unsplash.com/photo-1564750975191-0fa8dbfa2096?q=80&w=1920&auto=format&fit=crop'
            ],
            'investasi-hijau' => [
                'title' => 'Katalis Bisnis Berkelanjutan',
                'sub' => 'Pendanaan Ramah Lingkungan',
                'desc' => 'Mengembangkan skema pendanaan inovatif yang mendukung operasional UMKM dan bisnis berwawasan lingkungan. Kami menjembatani aliran investasi hijau yang menghidupkan ekonomi sirkular masyarakat, meningkatkan kesejahteraan tanpa harus mengorbankan kelestarian sumber daya.',
                'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=1920&auto=format&fit=crop'
            ],
            'esi' => [
                'title' => 'Indeks Sosial Lingkungan (ESI)',
                'sub' => 'Penilaian Diferensial',
                'desc' => 'Menghadirkan parameter ukur untuk menilai efektivitas sosial dan ekologis dari setiap inisiatif keberlanjutan. Data ESI yang transparan ini menjadi acuan presisi dalam melakukan analisis tata ruang yang berwawasan lingkungan dan proyeksi masa depan di Sumatera Selatan.',
                'image' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?q=80&w=1920&auto=format&fit=crop'
            ],
            'karbon-trading' => [
                'title' => 'Potensi Hutan & Gambut Sumsel',
                'sub' => 'Nilai Ekonomi Karbon',
                'desc' => 'Mengedukasi kelompok tani hutan tentang skema dan peluang perdagangan karbon dari ekosistem hutan serta pengelolaan basah lahan gambut yang berkelanjutan. Ini adalah wujud insentif nyata bagi warga Muara Enim yang bertindak sebagai agen pelindung paru-paru bumi di lini terdepan.',
                'image' => 'https://images.unsplash.com/photo-1473448912268-2022ce9509d8?q=80&w=1920&auto=format&fit=crop'
            ],
        ];

        if (!array_key_exists($slug, $programs)) {
            abort(404);
        }

        return view('frontend.pages.aksi-detail', [
            'program' => $programs[$slug],
            'slug' => $slug
        ]);
    }

    public function terkini(): View
    {
        return view('frontend.pages.terkini');
    }

    public function even(): View
    {
        return view('frontend.pages.even');
    }
}
