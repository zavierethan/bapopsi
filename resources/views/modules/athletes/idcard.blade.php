<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ID Card Atlet</title>

    <!-- Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- Style -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
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
            display: flex;
            justify-content: center;
        }

        .idcard-footer {
            color: #888;
            font-size: 14px;
            margin-top: 8px;
        }

        .btn-download {
            margin-top: 20px;
            background: #22b573;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-download:hover {
            background-color: #1b9a5f;
        }

        @media print {
            .btn-download {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Kartu ID -->
    <div class="idcard" id="idcard">
        <div class="idcard-header">
            PORDA KABUPATEN<br>BANDUNG XVI 2025
        </div>
        <div>
            <img
                src="{{ $atlet->pas_foto ? asset('storage/' . $atlet->pas_foto) : 'https://ui-avatars.com/api/?name=' . urlencode($atlet->nama_lengkap) }}"
                class="idcard-photo"
                alt="Foto {{ $atlet->nama_lengkap }}">
        </div>
        <div class="idcard-name">{{ $atlet->nama_lengkap }}</div>
        <div class="idcard-sport">
            {{ $atlet->cabang_olahraga }} - {{ $atlet->asal ?? ($atlet->nama_sekolah ?? '-') }}
        </div>
        <div class="idcard-id">
            ID: {{ 'PORDA-' . str_pad($atlet->id, 5, '0', STR_PAD_LEFT) }}
        </div>
        <div class="idcard-qr">
            <div id="qrcode"></div>
        </div>
        <div class="idcard-footer">
            Scan untuk verifikasi
        </div>
    </div>

    <!-- Tombol Download PDF -->
    <button onclick="downloadAsPDF()" class="btn-download">Download PDF</button>

    <!-- Script QR + PDF -->
    <script>
        const qrUrl = @json($qrUrl ?? 'https://example.com/verifikasi');

        new QRCode(document.getElementById("qrcode"), {
            text: qrUrl,
            width: 100,
            height: 100
        });

        async function downloadAsPDF() {
            const element = document.getElementById("idcard");

            // Render ke canvas
            const canvas = await html2canvas(element, {
                scale: 2,
                useCORS: true
            });

            const imgData = canvas.toDataURL("image/jpeg", 1.0);

            const pdf = new jspdf.jsPDF({
                orientation: "portrait",
                unit: "mm",
                format: [canvas.height * 0.264583, canvas.width * 0.264583]
            });

            pdf.addImage(imgData, 'JPEG', 0, 0);
            pdf.save('{{ \Illuminate\Support\Str::slug($atlet->nama_lengkap) . ".pdf" }}');
        }
    </script>

</body>
</html>
