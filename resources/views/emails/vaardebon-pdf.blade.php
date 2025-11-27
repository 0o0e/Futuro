<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 40px;
            background: #f7f7f7;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            border: 2px solid #4C807F;
            max-width: 600px;
            margin: auto;
            text-align: center;
        }

        h1 {
            margin-bottom: 10px;
            color: #4C807F;
            font-size: 28px;
        }

        .line {
            margin: 20px auto;
            width: 60%;
            border-top: 1px solid #4C807F;
        }

        .info {
            font-size: 18px;
            margin: 10px 0;
        }

        .label {
            font-weight: bold;
            color: #4C807F;
        }

        .code-box {
            margin: 25px auto;
            padding: 12px;
            border: 2px dashed #4C807F;
            font-size: 24px;
            letter-spacing: 2px;
            font-weight: bold;
            display: inline-block;
        }

        img {
            width: 250px;
            height: auto;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="card">
        <h1>Vaardebon</h1>
        @php
            $logoPath = public_path('logo_og.png');
            $logoData = base64_encode(file_get_contents($logoPath));
        @endphp
        <img src="data:image/png;base64,{{ $logoData }}" alt="Logo">



        <div class="line"></div>

        <p class="info">
            <span class="label">Prijs:</span> €{{ number_format($discount_code->amount, 2, ',', '.') }}
        </p>

        <p class="info">
            <span class="label">Arrangement:</span>
            {{ $discount_code->arrangement ?? 'Rondvaart' }}
        </p>

        <p class="label" style="margin-top: 25px;">Code:</p>
        <div class="code-box">
            {{ $discount_code->code }}
        </div>

        <div class="line"></div>

        <p style="font-size: 14px; color: #555;">
            Deze waardebon kan worden gebruikt bij Futuro Rondvaart.
        </p>
    </div>

</body>

</html>
