<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Atlet</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }
        th {
            background: #f0f0f0;
        }
        .text-left { text-align: left; }
        img {
            width: 50px;
            height: 60px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    @foreach($groupedData as $cabor => $atlets)
        <h3 style="text-align: center;">ALBUM PEMAIN</h3>
        <p style="text-align: center;">CABOR: {{ $cabor }}</p>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Atlet</th>
                    <th>Cabang Olahraga</th>
                    <th>No. Kls Pertandingan</th>
                    <th>Tanggal Lahir</th>
                    <th>Asal Sekolah</th>
                    <th>Kls</th>
                    <th>NISN</th>
                    <th>Pas Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atlets as $index => $atlet)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $atlet->nama_lengkap }}</td>
                        <td>{{ $atlet->cabang_olahraga }}</td>
                        <td></td>
                        <td>{{ $atlet->tanggal_lahir }}</td>
                        <td>{{ $atlet->nama_sekolah ?? '' }}</td>
                        <td></td>
                        <td>{{ $atlet->nisn ?? '' }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    @endforeach

</body>
</html>
