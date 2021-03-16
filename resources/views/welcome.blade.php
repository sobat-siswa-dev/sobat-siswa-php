<!DOCTYPE html>
<html lang="en">

<head>
    <!-- SEO -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Sobat Siswa
    </title>
    <!-- Primary Meta Tags -->
    <meta name="title" content="Sobat Siswa">
    <meta name="description"
        content="Sistem informasi terintegrasi untuk mewujudkan sekolah pintar dan pendidikan yang lebih baik lagi.">
    <meta name="keywords"
        content="pendidikan,indonesia,sekolah pintar,smart school,sekolah,startup,karya anak bangsa, karya">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="revisit-after" content="3 days">
    <meta name="author" content="Sobat Siswa">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://sobatsiswa.id/">
    <meta property="og:title" content="Sobat Siswa">
    <meta property="og:description"
        content="Sistem informasi terintegrasi untuk mewujudkan sekolah pintar dan pendidikan yang lebih baik lagi ">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://sobatsiswa.id/">
    <meta property="twitter:title" content="Sobat Siswa">
    <meta property="twitter:description"
        content="Sistem informasi terintegrasi untuk mewujudkan sekolah pintar dan pendidikan yang lebih baik lagi ">
    <!-- Style Dependencies -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landingRes/css/style.css') }}">
    <link rel="icon" href="{{ asset('landingRes/img/mascot.png') }}" sizes="16x16">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigation">
        <div class="container py-2">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('landingRes/img/monogram-logo.svg') }}" alt="Sobat-Siswa-Logo" class="cs-nav-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto primary-font">
                    <li class="nav-item">
                        <a class="nav-link local-link" href="#main">Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link local-link" href="#advantage">Keunggulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link local-link" href="#feature">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link local-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link local-link" href="#socialMedia">Media Sosial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cta" href="{{ url('registration') }}">Bergabung</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Primary Section -->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-7 d-flex align-items-center">
                    <div class="content">
                        <img src="{{ asset('landingRes/img/monogram-logo.svg') }}" alt="Sobat-Siswa-Logo" class="logo-main-section">
                        <p class="primary-font mt-4 mb-4">
                            Sistem informasi <b>terintegrasi</b> untuk mewujudkan sekolah pintar dan pendidikan yang
                            lebih baik lagi
                        </p>
                        <a href="{{ url('registration') }}">
                            <button class="btn btn-primary">
                                Bergabung
                            </button>
                        </a>
                        &nbsp;
                        <a href="{{ url('login') }}">
                            <button class="btn btn-secondary">
                                Masuk <i class="fas fa-arrow-right"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="col-md-5 d-flex align-items-center">
                    <img src="{{ asset('landingRes/img/main-section-illustration.svg') }}" alt="Sobat-Siswa-Description"
                        class="illustration-main-section">
                </div>
            </div>
        </div>
    </section>
    <!-- Advantage Section -->
    <section id="advantage">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="title primary-font">
                        Keuntungan
                    </h3>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/map-icon.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Aksesibilitas
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Dapat diakses dimana saja dan kapan saja dengan mudah
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/map-icon.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Terjangkau
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Harga terjangkau dengan banyak layanan yang tersedia
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/map-icon.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Dinamis
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Layanan dapat disesuaikan dengan kebutuhan sekolahmu
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/map-icon.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Mudah
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Mudah digunakan oleh siswa maupun guru.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('landingRes/img/advantage-section-illustration.svg') }}" alt="Sobat-Siswa-Description"
                        class="illustration-advantage-section">
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section -->
    <div id="feature">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title primary-font">
                        Layanan
                    </h3>
                    <div class="row mt-4">
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-a.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Basis Data Sekolah
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Simpan data siswa, kelas, guru, serta sekolah di basis data yang bisa
                                            diakses kapanpun dan dimanapun.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-b.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Evaluasi Perilaku
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Evaluasi sikap perilaku siswa yang ada dengan data pelanggaran tata tertib
                                            di sekolahmu.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-c.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Pantau Presensi
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Pantau kehadiran dengan mudah, dilengkapi analisa, serta dapat dintegrasikan
                                            dengan mesin absensi.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-d.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Smart SPP
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Pembayaran SPP yang terkelola dan terintegrasi dengan ePayment dengan Smart
                                            SPP.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-e.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Kelas Online
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Pembelajaran, ujian, dan pengembangan minat bakat siswa menjadi lebih mudah
                                            dengan kelas online.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-f.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Bank Soal
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Simpan dan saling berbagi modul pembelajaran serta bank soal sekolahmu
                                            dengan mudah.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-g.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            eRaport
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Raport yang paperless serta dapat diakses dan dibagikan dengan mudah kepada
                                            orang tua dan siswa.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-h.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Analisis Nilai
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Analisis nilai dan pencapaian siswa dengan modul analisis nilai, dilengkapi
                                            dengan masukan untuk siswa.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4 mb-2">
                            <table class="topic">
                                <tr>
                                    <td>
                                        <img src="{{ asset('landingRes/img/feature-i.svg') }}" alt="" class="topic-icon">
                                    </td>
                                    <td>
                                        <h4 class="topic-title primary-font">
                                            Portal Sekolah
                                        </h4>
                                        <p class="topic-desc secondary-font">
                                            Profile serta kegiatan sekolah dapat terpublikasi serta mudah diakses dengan
                                            Portal Sekolah.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Section -->
    <div id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title primary-font">
                        Blog
                    </h3>
                    <div class="row mt-4 p-0" id="mediumBlogContent">
                        <div class="col-md-4">
                            <article>
                                <div class="article-thumbnail"
                                    style="background-image: url('https://cdn-images-1.medium.com/max/1024/1*fljyLilE4rlZaBsdU9hkfQ.jpeg');">
                                </div>
                                <div class="article-description">
                                    <div class="article-tags">
                                        <span><i class="fab fa-medium" aria-hidden="true"></i>&nbsp;&nbsp; Medium</span>
                                        <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; 07 May
                                            2020</span>
                                    </div>
                                    <h3 class="primary-font">
                                        Mengejar Penilaian Bukan Pemahaman
                                    </h3>
                                    <p class="secondary-font">
                                        Dunia semakin berkembang dan terus berubah. Namun dunia ini memiliki suatu hal
                                        yang tak pernah berubah. “Sikap manusia akan selalu terbentuk dari pendidikan,
                                        lingkungan dan pengalaman yang dirasakan” itu menjadi sebuah hukum yang tak
                                        pernah berubah dan tak akan pernah berubah.
                                    </p>
                                    <a href="https://medium.com/@edu.sobatsiswa/mengejar-penilaian-bukan-pemahaman-c2dcbf5c8e2b?source=rss-3085ff2713bd------2"
                                        class="primary-font">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article>
                                <div class="article-thumbnail"
                                    style="background-image: url('https://cdn-images-1.medium.com/max/1024/1*h96Eg9iH6hrzH61HCt0HVg.jpeg');">
                                </div>
                                <div class="article-description">
                                    <div class="article-tags">
                                        <span><i class="fab fa-medium" aria-hidden="true"></i>&nbsp;&nbsp; Medium</span>
                                        <span><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp; 11 Apr
                                            2020</span>
                                    </div>
                                    <h3 class="primary-font">
                                        Pendidikan Terlambat
                                    </h3>
                                    <p class="secondary-font">
                                        Pendidikan menjadi salah satu poros kemajuan dari sebuah peradaban. Tapi
                                        sayangnya saat ini pendidikan justru banyak tertinggal oleh berbagai kemajuan
                                        yang telah berhasil dikembangkan. Hal ini menjadikan adanya sebuah jarak antara
                                        lulusan dari dunia pendidikan dengan kebutuhan di dunia kerja dan Industri.
                                    </p>
                                    <a href="https://medium.com/@edu.sobatsiswa/pendidikan-terlambat-9e330817ca51?source=rss-3085ff2713bd------2"
                                        class="primary-font">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="socialMedia">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title primary-font">
                        Media Sosial
                    </h3>
                    <div class="row mt-4 p-0" id="instagramPostContent">
                        <div class="col-md-3">
                            <article>
                                <a href="https://www.instagram.com/p/B_E3FQYAQra" target="_blank">
                                    <div class="article-thumbnail">
                                        <img
                                            src="https://instagram.fcgk2-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/93359887_1092397201116782_8047173563609525289_n.jpg?_nc_ht=instagram.fcgk2-1.fna.fbcdn.net&amp;_nc_cat=102&amp;_nc_ohc=8CsM2UGSzFoAX8CDG5O&amp;oh=fb0f38838ddc62889327a347d0d51ae0&amp;oe=5EDFB38A">
                                    </div>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <a href="https://www.instagram.com/p/B-52mc3hb8e" target="_blank">
                                    <div class="article-thumbnail">
                                        <img
                                            src="https://instagram.fcgk2-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/93018193_593654594580399_6678101459110956679_n.jpg?_nc_ht=instagram.fcgk2-1.fna.fbcdn.net&amp;_nc_cat=103&amp;_nc_ohc=lVHoHBoyTGUAX_MpdiM&amp;oh=920c787abb359f87bbfbb00b63c6899e&amp;oe=5EE0F81C">
                                    </div>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <a href="https://www.instagram.com/p/B-1byTrAvbR" target="_blank">
                                    <div class="article-thumbnail">
                                        <img
                                            src="https://instagram.fcgk2-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/92662991_249534866199769_13422153647597528_n.jpg?_nc_ht=instagram.fcgk2-1.fna.fbcdn.net&amp;_nc_cat=101&amp;_nc_ohc=YxhfKFZgKpUAX-Lnwgg&amp;oh=75d0d436de34cf3e92d01f337785ae25&amp;oe=5EDE3320">
                                    </div>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <a href="https://www.instagram.com/p/B-wSySXgrK3" target="_blank">
                                    <div class="article-thumbnail">
                                        <img
                                            src="https://instagram.fcgk2-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/92300282_644494672767638_5090488774274070418_n.jpg?_nc_ht=instagram.fcgk2-1.fna.fbcdn.net&amp;_nc_cat=102&amp;_nc_ohc=cEabnrXJm_wAX9H3lgn&amp;oh=9243929710fae6d4d21d015db15a8ba7&amp;oe=5EDF28C2">
                                    </div>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <a href="https://www.instagram.com/p/B-q_Ynjgbkf" target="_blank">
                                    <div class="article-thumbnail">
                                        <img
                                            src="https://instagram.fcgk2-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/92020166_209673737002085_5927755985205560310_n.jpg?_nc_ht=instagram.fcgk2-1.fna.fbcdn.net&amp;_nc_cat=105&amp;_nc_ohc=4YynVHhtiecAX9jTs76&amp;oh=86a9984ea9bf7d580def4fa95ea01ed0&amp;oe=5EE073F0">
                                    </div>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <a href="https://www.instagram.com/p/B-lp9GIpjtN" target="_blank">
                                    <div class="article-thumbnail">
                                        <img
                                            src="https://instagram.fcgk2-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/91747709_3655761387827824_7964839514418424594_n.jpg?_nc_ht=instagram.fcgk2-1.fna.fbcdn.net&amp;_nc_cat=104&amp;_nc_ohc=7Oq_0bQhTykAX-RgqlK&amp;oh=1c308406900fe303bd45fb47855e621c&amp;oe=5EDE3509">
                                    </div>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <a href="https://www.instagram.com/p/B-WzzZjA6k1" target="_blank">
                                    <div class="article-thumbnail">
                                        <img
                                            src="https://instagram.fcgk2-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/91087891_872280363220049_4112779044120864289_n.jpg?_nc_ht=instagram.fcgk2-1.fna.fbcdn.net&amp;_nc_cat=105&amp;_nc_ohc=vLEKFjwQuywAX8ButAQ&amp;oh=de5a5ebeb46f8ffd6147fcc70e0247eb&amp;oe=5EDE22DD">
                                    </div>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <a href="https://www.instagram.com/p/B-UXEHWArew" target="_blank">
                                    <div class="article-thumbnail">
                                        <img
                                            src="https://instagram.fcgk2-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/91032838_279986252991510_3205277688399830403_n.jpg?_nc_ht=instagram.fcgk2-1.fna.fbcdn.net&amp;_nc_cat=106&amp;_nc_ohc=NR4fDa1duQoAX-Z660_&amp;oh=c0fc871ba2dea365644c90a6f324a1ec&amp;oe=5EDD5B09">
                                    </div>
                                </a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <img src="{{ asset('landingRes/img/white-logo.svg') }}" alt="" style="width: 180px;">
                </div>
                <div class="col-md-3 mb-3">
                    <h4 class="primary-font">
                        Tentang Kami
                    </h4>
                    <a href="#main" class="local-link secondary-font">
                        Beranda
                    </a>
                    <a href="#advantage" class="local-link secondary-font">
                        Keunggulan
                    </a>
                    <a href="#feature" class="local-link secondary-font">
                        Layanan
                    </a>
                    <a href="#blog" class="local-link secondary-font">
                        Blog
                    </a>
                    <a href="#socialMedia" class="local-link secondary-font">
                        Media Sosial
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <h4 class="primary-font">
                        Membership
                    </h4>
                    <a href="" class="secondary-font">
                        Panduan Pendaftaran
                    </a>
                    <a href="" class="secondary-font">
                        Ketentuan Penggunaan
                    </a>
                    <a href="" class="secondary-font">
                        Kebijakan Privasi
                    </a>
                    <a href="" class="secondary-font">
                        Pusat Bantuan
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <h4 class="primary-font">
                        Social Media
                    </h4>
                    <a href="https://instagram.com/sobatsiswa.id/" class="secondary-font">
                        <i class="fab fa-instagram-square"></i>&nbsp;&nbsp; Instagram
                    </a>
                    <a href="https://medium.com/@edu.sobatsiswa" class="secondary-font">
                        <i class="fab fa-medium"></i>&nbsp;&nbsp; Medium
                    </a>
                    <a href="mailto:edu.sobatsiswa@gmail.com" class="secondary-font">
                        <i class="fa fa-envelope"></i>&nbsp;&nbsp; Email
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/b65ba64238.js" crossorigin="anonymous"></script>
    <script src="{{ asset('landingRes/js/script.js') }}"></script>
</body>
</html>