<?php

namespace App\Livewire;

use Livewire\Component;

class EducationPage extends Component
{
    /** @var array<int, array<string, mixed>> */
    public array $materials = [
        [
            'icon' => 'target',
            'title' => 'Menata Masa Depan, Menentukan Arah Kehidupan',
            'time' => '3 menit baca',
            'intro' => 'Setiap remaja memiliki mimpi, potensi, dan kesempatan untuk meraih kehidupan yang lebih baik. Namun, impian tidak akan terwujud hanya dengan harapan. Dibutuhkan perencanaan yang jelas agar setiap langkah yang diambil hari ini membawa kita lebih dekat pada tujuan yang ingin dicapai.',
            'description' => 'Perencanaan masa depan membantu remaja mengenali potensi diri, menentukan target pendidikan dan karier, serta mempersiapkan kehidupan yang lebih mandiri dan berkualitas.',
            'quote' => 'Masa depan yang baik bukan sesuatu yang ditunggu, tetapi sesuatu yang dipersiapkan.',
            'benefits_title' => 'Manfaat Memiliki Rencana Masa Depan',
            'benefits' => [
                'Memiliki tujuan hidup yang jelas.',
                'Lebih fokus dalam belajar dan mengembangkan diri.',
                'Mampu mengambil keputusan dengan lebih bijak.',
                'Meningkatkan kesiapan menghadapi tantangan kehidupan.',
                'Menjadi lebih siap membangun keluarga di masa depan.',
            ],
        ],
        [
            'icon' => 'heart',
            'title' => 'Pendewasaan Usia Perkawinan, Bukan Sekadar Menunda Menikah',
            'time' => '4 menit baca',
            'intro' => 'Pendewasaan Usia Perkawinan (PUP) adalah upaya mempersiapkan kehidupan berkeluarga secara matang melalui kesiapan pendidikan, kesehatan, mental, sosial, dan ekonomi sebelum memasuki pernikahan.',
            'description' => 'PUP bukan tentang melarang atau menunda pernikahan tanpa alasan, melainkan memastikan bahwa setiap individu memiliki kesempatan untuk bertumbuh, belajar, dan mempersiapkan masa depannya terlebih dahulu.',
            'pre_marriage_title' => 'Mengapa Perlu Dipersiapkan?',
            'pre_marriage_intro' => 'Membangun keluarga merupakan tanggung jawab besar yang membutuhkan kesiapan dalam berbagai aspek kehidupan. Sebelum menikah, remaja perlu memiliki:',
            'requirements' => [
                ['icon' => '🎓', 'text' => 'Pendidikan yang memadai.'],
                ['icon' => '💼', 'text' => 'Rencana karier atau pekerjaan.'],
                ['icon' => '🧠', 'text' => 'Kematangan emosional.'],
                ['icon' => '❤️', 'text' => 'Kesehatan fisik dan reproduksi yang baik.'],
                ['icon' => '💰', 'text' => 'Kemandirian ekonomi.'],
            ],
            'pre_marriage_outro' => 'Ketika semua aspek tersebut dipersiapkan dengan baik, peluang untuk membangun keluarga yang harmonis dan sejahtera akan semakin besar.',
        ],
        [
            'icon' => 'alert',
            'title' => 'Ketika Mimpi Harus Berhenti di Tengah Jalan',
            'time' => '3 menit baca',
            'intro' => 'Pernikahan yang terjadi sebelum seseorang benar-benar siap sering kali membuat berbagai rencana masa depan menjadi lebih sulit diwujudkan.',
            'risks_title' => 'Remaja yang menikah terlalu dini berisiko menghadapi berbagai tantangan, seperti:',
            'risks' => [
                ['title' => 'Pendidikan Terhambat', 'description' => 'Banyak remaja harus menghentikan atau menunda pendidikan karena tanggung jawab baru yang harus dijalani.'],
                ['title' => 'Kesempatan Berkembang Menjadi Lebih Sempit', 'description' => 'Waktu untuk belajar, berorganisasi, mengembangkan keterampilan, dan mengejar cita-cita menjadi lebih terbatas.'],
                ['title' => 'Tantangan Ekonomi', 'description' => 'Kesiapan finansial yang belum matang dapat menimbulkan tekanan dalam kehidupan keluarga.'],
                ['title' => 'Risiko Kesehatan', 'description' => 'Kehamilan pada usia yang terlalu muda dapat meningkatkan risiko kesehatan bagi ibu maupun bayi.'],
            ],
            'quote' => 'Jangan biarkan keputusan hari ini membatasi kesempatan yang masih bisa kamu raih esok hari.',
        ],
        [
            'icon' => 'rocket',
            'title' => 'Dari Mimpi Menjadi Aksi',
            'time' => '3 menit baca',
            'steps_title' => 'Langkah Nyata Meraih Cita-Cita',
            'steps' => [
                [
                    'num' => 1,
                    'title' => 'Kenali Potensi Dirimu',
                    'description' => 'Setiap orang memiliki kelebihan yang berbeda. Temukan bidang yang membuatmu berkembang dan bersemangat.',
                ],
                [
                    'num' => 2,
                    'title' => 'Tentukan Target yang Jelas',
                    'description' => 'Tuliskan tujuan pendidikan, karier, dan pencapaian yang ingin diraih dalam lima tahun ke depan.',
                ],
                [
                    'num' => 3,
                    'title' => 'Tingkatkan Kompetensi',
                    'description' => 'Kembangkan kemampuan yang akan menjadi bekal masa depan, seperti:',
                    'skills' => [
                        'Komunikasi',
                        'Kepemimpinan',
                        'Literasi digital',
                        'Berpikir kritis',
                        'Kerja sama tim',
                    ],
                ],
                [
                    'num' => 4,
                    'title' => 'Cari Peluang dan Kesempatan',
                    'description' => 'Manfaatkan organisasi, pelatihan, beasiswa, lomba, dan berbagai pengalaman yang dapat mendukung pengembangan diri.',
                ],
                [
                    'num' => 5,
                    'title' => 'Berani Melangkah',
                    'description' => 'Langkah kecil yang dilakukan secara konsisten akan membawa perubahan besar di masa depan.',
                ],
            ],
        ],
    ];

    public function render()
    {
        return view('livewire.education-page')->layout('layouts.app', ['title' => 'Sudut Edukasi']);
    }
}
