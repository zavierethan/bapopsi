<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Name Tag</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .nametag {
            width: 280px;
            height: 420px;
            border: 2px dashed #000;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            position: relative;
        }

        .photo {
            width: 90px;
            height: 110px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .nama {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .cabor {
            font-size: 14px;
            margin-bottom: 15px;
        }

        .qrcode {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        #downloadBtn {
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

<div>
    <div id="nametag" class="nametag">


        <div id="qrcode" class="qrcode"></div>
    </div>

    <button id="downloadBtn">Download PDF</button>
</div>

<script>
    const qrUrl = "https://www.google.com"; // URL harus lengkap

    // Render QR Code
    const qrCode = new QRCode(document.getElementById("qrcode"), {
        text: qrUrl,
        width: 100,
        height: 100
    });

    // Tombol Download PDF
    document.getElementById("downloadBtn").addEventListener("click", () => {
        const element = document.getElementById("nametag");

        html2pdf().set({
            margin: 0,
            filename: 'nametag.pdf',
            image: { type: 'jpeg', quality: 1 },
            html2canvas: {
                scale: 2,
                useCORS: true
            },
            jsPDF: {
                unit: 'pt',
                format: [170.08, 255.12], // [width, height]
                orientation: 'portrait'
            }
        }).from(element).save();
    });
</script>



</body>
</html>
