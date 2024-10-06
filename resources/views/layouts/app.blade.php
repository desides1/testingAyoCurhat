<!doctype html>
<html lang="en" dir="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ayo Curhat | {{ $title ?? '' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-color.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@icon/dripicons/dripicons.css') }}">

    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/core/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/daygrid/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/timegrid/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/list/main.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/vendor/mapbox/mapbox-gl.css') }}" />

    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{ asset('assets/sweetalert/sweetalert2.min.css') }}">

    @yield('style')
</head>

<body class=" color-light ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        @include('partials.sidebar')
        @include('partials.navbar')
        <div class="content-page">
            @yield('content')
        </div>
    </div>
    <!-- Wrapper End-->

    @include('partials.footer')
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>

    @yield('script')

    <!-- Flextree Javascript-->
    <script src="{{ asset('assets/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('assets/js/tree.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('assets/js/table-treeview.js') }}"></script>

    <!-- Masonary Gallery Javascript -->
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>

    <!-- Mapbox Javascript -->
    <script src="{{ asset('assets/js/mapbox-gl.js') }}"></script>
    <script src="{{ asset('assets/js/mapbox.js') }}"></script>

    <!-- Fullcalender Javascript -->
    <script src="{{ asset('assets/vendor/fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/daygrid/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/timegrid/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/list/main.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('assets/js/vector-map-custom.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>
    <script src="{{ asset('assets/js/rtl.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>

    <!-- slider JavaScript -->
    <script src="{{ asset('assets/js/slider.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Sweetalert -->
    <script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert/sweetalert2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $(document).on('click', '#add', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                form.submit();

                Swal.fire({
                    icon: "success",
                    title: "Data berhasil disimpan",
                    showConfirmButton: false,
                    timer: 5000
                });
            });

            $(document).on('click', '#edit-account', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Yakin Ingin Menyimpan Perubahan Pada Akun Ini?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Data akun berhasil diperbarui!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            });

            $(document).on('click', '#edit-profile', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Apakah Anda Yakin Ingin Menyimpan Perubahan?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Profil Anda berhasil diperbarui!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            });

            $(document).on('click', '#active', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Yakin Ingin Mengaktifkan Akun Ini?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Akun berhasil diaktifkan!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            });

            $(document).on('click', '#inactive', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Yakin Ingin Menonaktifkan Akun Ini?",
                    text: 'Tindakan ini membuat petugas kehilangan akses ke dalam sistem',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Akun berhasil dinonaktifkan!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            });

            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Tindakan ini akan menghapus akun petugas dari sistem",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Data berhasil dihapus!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            });

            $(function() {
                $(document).on('click', '#add-reporting', function(e) {
                    e.preventDefault();
                    var form = $(this).closest('form');

                    Swal.fire({
                        title: "Yakin Ingin Menambahkan Laporan Pengaduan?",
                        text: "Pastikan semua data yang Anda inputkan benar",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya",
                        cancelButtonText: "Tinjau Kembali"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire({
                                title: "Data berhasil ditambahkan!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 5000
                            });
                        }
                    });
                });

                $(document).on('click', '#archive', function(e) {
                    e.preventDefault();
                    var form = $(this).closest('form');

                    form.submit();

                    Swal.fire({
                        icon: "success",
                        title: "Data berhasil diarsipkan!",
                        showConfirmButton: false,
                        timer: 5000
                    });
                });

                $(document).on('click', '#publish', function(e) {
                    e.preventDefault();
                    var form = $(this).closest('form');

                    form.submit();

                    Swal.fire({
                        icon: "success",
                        title: "Data berhasil dipublish!",
                        showConfirmButton: false,
                        timer: 5000
                    });
                });

                $(document).on('click', '#logout-link', function(e) {
                    e.preventDefault();
                    var form = $('#logout-form');

                    Swal.fire({
                        title: "Yakin Ingin Keluar?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya",
                        cancelButtonText: "Tidak"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>