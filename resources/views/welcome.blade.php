<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ayo Curhat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-w8iqmrXZ5+V+u6NzN5O7m4/yAjcVfzt3fnjflwuuFCRiP9uOgkfn4s1Gj+nKC8fY" crossorigin="anonymous" />

    <!-- My Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/styleAwal.css') }}" />
    <link rel="icon" href="{{ asset('assets/images/pages/images/logo.png') }}">
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">
            <img src="{{ asset('assets/images/pages/images/logo.png') }}" width="60" height="60" alt="Logo" />
        </a>


        <div class="nav">

            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#features">Fitur</a></li>
                <li><a href="#rules">Konseling</a></li>
                <li> <a href="#about">Tentang Kami</a></li>
            </ul>


            <div class="navbar-extra">
                <div class="login">
                    <a href="{{ route('login') }}"><span id="login">Login</span></a>
                </div>
            </div>
            <div class="navbar-menu">
                <a href="#menu" id="menu"><img src="{{ asset('assets/images/pages/images/menu.svg') }}" alt=""></a>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
        <div class="row">
            <div class="content">
                <h1>AYO CURHAT BERSAMAKU!</h1>
                <p>
                    Selamat datang di platform pengaduan resmi Poliwangi, tempat bagi mahasiswa untuk menyuarakan
                    berbagai permasalahan yang dihadapi. Kami hadir untuk mendengarkan dan membantu menyelesaikan
                    keluhan Anda, dengan tujuan menciptakan lingkungan kampus yang lebih baik dan harmonis. Mari
                    bersama-sama membangun Poliwangi menjadi tempat yang nyaman untuk belajar dan berkembang. </p>
                <a href="{{ route('login') }}" class="cta">Mulai Curhat</a>
            </div>
            <div class="home-img">
                <img src="{{ asset('assets/images/pages/images/home.png') }}" />
            </div>

        </div>
    </section>
    <!-- Hero Section end -->

    <!-- Ulasan start -->
    <section id="review" class="review">
        <h1>Ulasan</h1>
        <p>
            Terdapat berbagai fitur dalam platform kami contohnya seperti melakukan pelaporan kekerasan seksual tanpa
            harus bertemu secara langsung oleh Satgas PPKS. Memberikan layanan konseling untuk para Tamu Satgas yang
            ingin menceritakan keluh kesahnya. Anda dapat mengekspresikan masalah yang anda alami, Semua privasi anda
            akan dijamin oleh Satgas PPKS.
        </p>
        <div class="row">
            <div class="review-img">
                <img src="{{ asset('assets/images/pages/images/ulasan1.png') }}" />
                <img src="{{ asset('assets/images/pages/images/ulasan2.png') }}" />
                <img src="{{ asset('assets/images/pages/images/ulasan3.png') }}" />
                <img src="{{ asset('assets/images/pages/images/ulasan4.png') }}" />
            </div>
        </div>

    </section>
    <!-- Ulasan end -->

    <!-- Features Section start -->
    <section id="features" class="features">
        <h1>Fitur</h1>
        <div class="row">
            <div class="menu-card">
                <img src="{{ asset('assets/images/pages/images/formPengaduan.svg') }}" class="menu-card-img" style="padding: 3.5rem 6vw" />
                <h3 class="menu-card-title">Form Pengaduan</h3>
            </div>
            <div class="menu-card">
                <img src="{{ asset('assets/images/pages/images/private1.png') }}" class="menu-card-img" />
                <h3 class="menu-card-title">Konseling</h3>
            </div>
            <div class="menu-card">
                <img src="{{ asset('assets/images/pages/images/Panggilan darurat.svg') }}" class="menu-card-img" style="padding: 4rem" />
                <h3 class="menu-card-title">Panggilan Darurat</h3>
            </div>
        </div>
    </section>
    <div class="line"></div>
    <!-- Features Section end -->

    <!-- Rules Section start -->
    <section id="rules" class="rules">
        <div class="row">
            <div class="rules-img">
                <img src="{{ asset('assets/images/pages/images/rules.png') }}" />
            </div>
            <div class="content">
                <h1>Konseling</h1>
                <p>
                    Fitur Konseling kami memberikan Anda akses langsung ke tim konselor dari Satgas PPKS POLIWANGI, yang
                    terdiri dari para profesional berpengalaman dan berdedikasi. Kami siap mendengarkan dan membantu
                    Anda menemukan solusi terbaik untuk setiap tantangan yang Anda hadapi. Privasi Anda adalah prioritas
                    kami, dan semua percakapan dijamin kerahasiaannya.
                </p>
                <label for=""><strong>Percayakan cerita Anda pada kami dan mulai langkah baru menuju
                        kesejahteraan bersama Satgas PPKS POLIWANGI</strong></label>
            </div>
        </div>
    </section>
    <!-- Rules Section end -->

    <!-- Footer start -->
    <footer>
        <section id="about">
            <div class="left">
                <div class="footer-img">
                    <img src="{{ asset('assets/images/pages/images/logoSatgasPPKS.svg') }}" />
                </div>

            </div>
            <div class="right">
                <h1>Tentang Kami</h1>
                <div class="contentFooter">
                    <div class="menu">
                        <h4 class="contentMenu">Halaman Utama</h4>
                        <a href="#home">Beranda</a>
                        <a href="#features">Fitur</a>
                        <a href="#rules">Konseling</a>
                        <a href="#about">Tentang Kami</a>
                    </div>

                    <div class="pelayanan">
                        <h4 class="contentMenu">Pelayanan</h4>
                        <a href="">
                            <p>Aman</p>
                        </a>
                        <a href="">
                            <p>Privasi</p>
                        </a>
                        <a href="">
                            <p>Dukungan</p>
                        </a>
                        <a href="">
                            <p>Komunikasi</p>
                        </a>
                    </div>

                    <div class="contact">
                        <div class="address" style="display: flex">
                            <a href="#" id="map"><i data-feather="map-pin"></i></a>
                            <a style="padding-left: 10px" href="https://goo.gl/maps/8pnqYp4d56Lzh9Su7" id="map">Jalan Raya Jember No.KM13, Kawang, Labanasem, Kec. Kabat, Kabupaten
                                Banyuwangi, Jawa Timur 68461</a>
                        </div>
                        <div class="email">
                            <a href="#" id="email"><i data-feather="mail"></i></a>
                            <a href="mailto:satgasppkspoliwangi@gmail.com" style="padding-left: 10px">satgasppkspoliwangi@gmail.com</a>
                        </div>
                        <div class="social-media">
                            <a href="#" id="instagram"><i data-feather="instagram"></i></a>
                            <a href="https://www.instagram.com/satgasppks_poliwangi/" style="padding-left: 10px" id="instagram">Satgas
                                PPKS Poliwangi</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <!-- Footer end -->

    <!-- Feather Icons-->
    <script>
        feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>