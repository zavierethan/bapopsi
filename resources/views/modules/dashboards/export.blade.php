<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Atlet</title>
    <style>
    body {
        font-family: sans-serif;
        font-size: 12px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 4px;
    }

    .text-center {
        text-align: center;
    }

    th {
        background: #f0f0f0;
    }

    .text-left {
        text-align: left;
    }

    img {
        width: 50px;
        height: 60px;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <h3 style="text-align: center;">Perolehan Medali Atlet</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Atlet</th>
                <th>L/P</th>
                <th>Cabang Olahraga</th>
                <th>Nomor Cabang Olahraga</th>
                <th>Perolehan Medali</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 0; @endphp
            @foreach($data as $data)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $data->nama_lengkap }}</td>
                <td class="text-center">{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->cabang_olahraga }}</td>
                <td>{{ $data->kelas_olahraga ?? '' }}</td>
                <td class="text-center">{{ $data->perolehan_medali ?? '' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>

</body>

</html>
