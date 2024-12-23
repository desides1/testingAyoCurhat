$(function () {
    $(document).on("click", "#add", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");

        form.submit();

        Swal.fire({
            icon: "success",
            title: "Data berhasil disimpan",
            showConfirmButton: false,
            timer: 5000,
        });
    });

    $(document).on("click", "#edit-account", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");

        Swal.fire({
            title: "Yakin Ingin Menyimpan Perubahan Pada Akun Ini?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: "Data akun berhasil diperbarui!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000,
                });
            }
        });
    });

    $(document).on("click", "#edit-profile", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");

        Swal.fire({
            title: "Apakah Anda Yakin Ingin Menyimpan Perubahan?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: "Profil Anda berhasil diperbarui!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000,
                });
            }
        });
    });

    $(document).on("click", "#active", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");

        Swal.fire({
            title: "Yakin Ingin Mengaktifkan Akun Ini?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: "Akun berhasil diaktifkan!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000,
                });
            }
        });
    });

    $(document).on("click", "#inactive", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");

        Swal.fire({
            title: "Yakin Ingin Menonaktifkan Akun Ini?",
            text: "Tindakan ini membuat petugas kehilangan akses ke dalam sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: "Akun berhasil dinonaktifkan!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000,
                });
            }
        });
    });

    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var form = $(this).closest("form");

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Tindakan ini akan menghapus akun petugas dari sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire({
                    title: "Data berhasil dihapus!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000,
                });
            }
        });
    });

    $(function () {
        $(document).on("click", "#add-reporting", function (e) {
            e.preventDefault();
            var form = $(this).closest("form");

            Swal.fire({
                title: "Yakin Ingin Menambahkan Laporan Pengaduan?",
                text: "Pastikan semua data yang Anda inputkan benar",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tinjau Kembali",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                        title: "Data berhasil ditambahkan!",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 5000,
                    });
                }
            });
        });

        $(document).on("click", "#archive", function (e) {
            e.preventDefault();
            var form = $(this).closest("form");

            form.submit();

            Swal.fire({
                icon: "success",
                title: "Data berhasil diarsipkan!",
                showConfirmButton: false,
                timer: 5000,
            });
        });

        $(document).on("click", "#publish", function (e) {
            e.preventDefault();
            var form = $(this).closest("form");

            form.submit();

            Swal.fire({
                icon: "success",
                title: "Data berhasil dipublish!",
                showConfirmButton: false,
                timer: 5000,
            });
        });

        $(document).on("click", "#logout-link", function (e) {
            e.preventDefault();
            var form = $("#logout-form");

            Swal.fire({
                title: "Yakin Ingin Keluar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
