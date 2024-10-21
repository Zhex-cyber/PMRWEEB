<?php
// Mengatur lokal menjadi Indonesia
\Carbon\Carbon::setLocale('id');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Surat Keterangan Sakit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1, p {
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .content {
            width: 80%;
            margin: 0 auto;
        }

        .header, .footer {
            text-align: center;
        }

        .header h2 {
            margin-bottom: 5px;
        }

        .content-table {
            margin-top: 20px;
        }

        .content-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .content-table table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
        }

        .kop-surat {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
            position: relative;
        }

        .kop-surat img {
            width: 140px; /* Ukuran logo disesuaikan */
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
            margin-top: 30px;
        }

        .school-info {
            display: inline-block;
            width: calc(100% - 120px); /* Menghindari tumpang tindih dengan logo */
            text-align: center;
        }

        hr {
            border: 1px solid black;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Kop Surat Section -->
    <div class="kop-surat">
        <img src="{{ public_path('Assets/Frontend/img/smkn1kawalii.png') }}" alt="School Logo">
        <div class="school-info">
            <h2>SMK Negeri 1 Kawali</h2>
            <p>Jl.Talagasari, No.35 Kawalimukti, Kawali Kabupaten Ciamis Jawa Barat 46252</p>
            <p>Telp: (0265) 791727 | Email: smkn1kawali@gmail.com</p>
        </div>
    </div>

    <hr>

    <p>Nomor: {{ $pasiens->nomor_surat }}</p>

    <p>Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>

    <p>Kepada Yth,</p>
    <p>Bapak/Ibu Orang Tua/Wali</p>
    <p>Di tempat</p>

    <p>Dengan hormat,</p>
    <p>Berdasarkan hasil pemeriksaan kesehatan yang telah dilakukan oleh tim Palang Merah Remaja (PMR) SMKN 1 Kawali Kepada:</p>

    <div class="content-table">
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $pasiens->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>NIS</th>
                <td>{{ $pasiens->nis }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $pasiens->kelas }}</td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td>{{ $pasiens->jurusan }}</td>
            </tr>
            <tr>
                <th>Tanggal Masuk UKS</th>
                <td>{{ \Carbon\Carbon::parse($pasiens->tanggal_pemeriksaan)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th>Keterangan Sakit</th>
                <td>{{ $pasiens->keterangan }}</td>
            </tr>
        </table>
    </div>

    <p>Dengan ini, kami memberikan keterangan bahwa siswa tersebut:</p>
    <ul>
        <li>Dalam keadaan sakit </li>
        <li>Sakit yang di alami: {{ $pasiens->keterangan }}</li>
        <li>Diharapkan untuk  {{ $pasiens->status ?? '[puskesmas/rumah sakit]' }}</li>
    </ul>

    <p>Demikian surat keterangan ini kami sampaikan, agar dapat digunakan sebagaimana mestinya.</p>

    <div class="footer">
        <p>Hormat kami,</p>
        <br><br><br>
        <p><strong>PMR WIRA SMKN 1 Kawali</strong></p>
    </div>

</body>
</html>
