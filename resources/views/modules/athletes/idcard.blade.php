<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ID Card Atlet</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 40px;
            background: #f5f6fa;
        }
        .idcard {
            width: 350px;
            border-radius: 16px;
            border: 1px solid #eee;
            padding: 24px;
            background: #fff;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .idcard-header {
            background: #22b573;
            color: #fff;
            border-radius: 12px;
            padding: 16px 0;
            font-weight: bold;
            font-size: 22px;
            margin-bottom: 16px;
        }
        .idcard-photo {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 4px solid #22b573;
            object-fit: cover;
            margin: 0 auto 16px auto;
        }
        .idcard-name {
            font-size: 22px;
            font-weight: bold;
            color: #222;
            margin-bottom: 4px;
        }
        .idcard-sport {
            color: #22b573;
            font-size: 18px;
            margin-bottom: 8px;
        }
        .idcard-id {
            background: #f5f6fa;
            border-radius: 8px;
            padding: 8px;
            margin: 16px 0;
            font-size: 18px;
            display: inline-block;
        }
        .idcard-qr {
            margin: 16px 0 0 0;
        }
        .idcard-footer {
            color: #888;
            font-size: 14px;
            margin-top: 8px;
        }
    </style>
</head>
<body>
<div class="idcard">
    <div class="idcard-header">
        PORDA KABUPATEN<br>BANDUNG XVI 2025
    </div>
    <div>
        <img src="{{ $atlet->pas_foto ? asset('storage/' . $atlet->pas_foto) : 'https://ui-avatars.com/api/?name=' . urlencode($atlet->nama_lengkap) }}" class="idcard-photo" alt="Foto Atlet">
    </div>
    <div class="idcard-name">{{ $atlet->nama_lengkap }}</div>
    <div class="idcard-sport">{{ $atlet->cabang_olahraga }} - {{ $atlet->asal ?? $atlet->nama_sekolah }}</div>
    <div class="idcard-id">ID: {{ 'PORDA-' . str_pad($atlet->id, 5, '0', STR_PAD_LEFT) }}</div>
    <div class="idcard-qr">
        <div id="qrcode"></div>
    </div>
    <div class="idcard-footer">
        Scan untuk verifikasi
    </div>
</div>
<script>
    const qrUrl = @json($qrUrl);
    new QRCode(document.getElementById("qrcode"), {
        text: qrUrl,
        width: 100,
        height: 100
    });
</script>
</body>
</html> 