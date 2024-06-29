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
                    <p style="margin: 0;">Telepon/WhatsApp: 082139443575; Email: satgasppks@poliwangi.ac.id</p>
                </center>
            </td>
        </tr>
    </table>
    <hr>
    <center style="margin-top: 20px; display: block;">
        <h3 style="margin-bottom: 25px;"><u>FORMULIR PENGADUAN</u></h3>
    </center>
    <table cellpadding="4">
        <tr>
            <td>Tanggal Pelaporan</td>
            <td> : {{ date('d-m-Y', strtotime($reporting->created_at)) }} </td>
        </tr>
    </table>

    <h4>A. Identitas Pelapor</h4>
    <table cellpadding="4">
        <tr>
            <td>Nama</td>
            <td> : {{ $reporting->reportingUser->name }}</td>
        </tr>
        <tr>
            <td>Status Pelapor</td>
            <td> : {{ ucfirst($reporting->reporter_as) }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td> : {{ ucfirst($reporting->reportingUser->gender) }}</td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td> : {{ $reporting->reportingUser->phone_number }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td> : {{ $reporting->reportingUser->email }}</td>
        </tr>
        <tr>
            <td>Alamat Lengkap</td>
            <td> : {{ $reporting->reportingUser->complete_address }}</td>
        </tr>
    </table>

    <h4>B. Rincian Pengaduan</h4>
    <table cellpadding="4">
        <tr>
            <td>Jenis Kasus</td>
            <td> : {{ $reporting->caseType->name }}</td>
        </tr>
        <tr>
            <td>Deskripsi Kasus</td>
            <td> : {{ $reporting->case_description }}</td>
        </tr>
        <tr>
            <td>Cerita Singkat Peristiwa</td>
            <td> : {{ $reporting->chronology }}</td>
        </tr>
        <tr>
            <td>Alasan Pengaduan</td>
            <td>
                <ol>
                    @foreach ($reporting->reportingReason as $reason)
                    <li>{{ $reason->name }}</li>
                    @endforeach
                </ol>
            </td>
        </tr>
        <tr>
            <td>Alasan Lainnya</td>
            <td> : {{ $reporting->optional_reporting_reason ?? '-'}}</td>
        </tr>
        <tr>
            <td>Identifikasi Kebutuhan Korban</td>
            <td>
                <ol>
                    @foreach ($reporting->victimRequirement as $req)
                    <li>{{ $req->name }}</li>
                    @endforeach
                </ol>
            </td>
        </tr>
        <tr>
            <td>Identifikasi Kebutuhan Lainnya</td>
            <td> : {{ $reporting->optional_victim_requirement ?? '-'}}</td>
        </tr>
    </table>

    <h4>C. Data Terlapor</h4>
    <table cellpadding="4">
        <tr>
            <td>Status Terlapor</td>
            <td> : {{ $reporting->reportedStatus->name }}</td>
        </tr>
        <tr>
            <td>Jenis Disabilitas</td>
            <td>
                <ol>
                    @foreach ($reporting->disabilityType as $disability)
                    <li>{{ $disability->name ?? '-' }}</li>
                    @endforeach
                </ol>
            </td>
        </tr>
        <tr>
            <td>Jenis Disabilitas Lainnya</td>
            <td> : {{ $reporting->optional_disability_type ?? '-' }}</td>
        </tr>
    </table>

    <h4>D. Informasi Kontak Pihak Lain Yang Dapat Dikonfirmasi</h4>
    <table cellpadding="4">
        <tr>
            <td>Nomor Telepon</td>
            <td> : {{ $reporting->optional_phone_number ?? '-' }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td> : {{ $reporting->optional_email ?? '-' }}</td>
        </tr>
    </table>
</body>

</html>