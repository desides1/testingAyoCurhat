<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <h3 style="margin-bottom: 5px;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h3>
                    <h3 style="margin: 0;">SATUAN TUGAS PENCEGAHAN DAN PENANGANAN KEKERASAN SEKSUAL POLITEKNIK NEGERI BANYUWANGI</h3>
                    <p style="margin-top: 10px;">Jl. Raya Jember kilometer 13 Labanasem, Kabat, Banyuwangi, 68461</p>
                    <p style="margin-top: 10px;">Telepon/WhatsApp: 082139443575; Email: satgasppks@poliwangi.ac.id</p>
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
            <td>Tanggal</td>
            <td> : {{ date('d-m-Y', strtotime($reporting->created_at)) }}</td>
        </tr>
    </table>

    <h4>I. Identitas Pelapor</h4>
    <table cellpadding="4">
        <tr>
            <td>1. Nama</td>
            <td> : {{ $reporting->reportingUser->name }}</td>
        </tr>
        <tr>
            <td>2. Status Pelapor</td>
            <td> : {{ ucfirst($reporting->reporter_as) }}</td>
        </tr>
        <tr>
            <td>3. Jenis Kelamin </td>
            <td> : {{ ucfirst($reporting->reportingUser->gender) }}</td>
        </tr>
        <tr>
            <td>4. Nomor Telepon </td>
            <td> : {{ $reporting->reportingUser->phone_number }}</td>
        </tr>
        <tr>
            <td>5. Email </td>
            <td> : {{ $reporting->reportingUser->email }}</td>
        </tr>
        <tr>
            <td>7. Alamat Lengkap</td>
            <td> : {{ $reporting->reportingUser->complete_address }}</td>
        </tr>
    </table>
</body>

</html>