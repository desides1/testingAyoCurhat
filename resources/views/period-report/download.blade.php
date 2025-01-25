<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-color.png') }}" />

    <title>Ayo Curhat | {{ $title ?? '' }}</title>
</head>

<body>
    <table>
        <tr>
            <td>
                <img src="{{ public_path('/assets/images/logo/logo-poliwangi.png') }}" alt="" style="max-width: 80px;">
            </td>
            <td>
                <center>
                    <h4 style="margin-bottom: 2px;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h4>
                    <h4 style="margin: 0;">SATUAN TUGAS PENCEGAHAN DAN PENANGANAN KEKERASAN SEKSUAL POLITEKNIK NEGERI BANYUWANGI</h4>
                    <p style="margin: 0;">Jl. Raya Jember kilometer 13 Labanasem, Kabat, Banyuwangi, 68461</p>
                    <p style="margin: 0;">Telepon/WhatsApp: 082139443573; Email: satgasppks@poliwangi.ac.id</p>
                </center>
            </td>
        </tr>
    </table>

    <hr>

    <center style="margin-top: 20px; display: block;">
        <h3 style="margin-bottom: 25px;">LAPORAN DATA PENGADUAN</h3>
    </center>

    <h4>Periode: {{ $period }}</h4>

    <table cellpadding="4" border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Kasus</th>
                <th>Jumlah Pengaduan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($caseTypes as $caseType)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $caseType->name }}</td>
                <td>{{ $caseType->reportings_count ?? 0 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>