<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Factuur #{{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            font-size: 13px;
            line-height: 1.5;
            margin: 0;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #29715e;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header img {
            height: 70px;
        }

        .invoice-title {
            text-align: right;
        }

        .invoice-title h1 {
            font-size: 24px;
            margin: 0;
            color: #0077b6;
        }

        .invoice-title p {
            margin: 3px 0;
        }

        .details {
            margin-bottom: 25px;
        }

        .details p {
            margin: 3px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background-color: #23947f;
            color: #fff;
            text-align: left;
            padding: 10px;
        }

        td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .total {
            text-align: right;
            margin-top: 20px;
        }

        .total strong {
            font-size: 16px;
            color: #000;
        }

        .footer {
            margin-top: 50px;
            font-size: 12px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="header">
        @php
            $logoPath = public_path('logo_og.png');
            $logoData = base64_encode(file_get_contents($logoPath));
        @endphp
        <img src="data:image/png;base64,{{ $logoData }}" alt="Logo">
        <h2>Factuur #{{ $invoice->invoice_number }}</h2>
    </div>

    <div class="details">
        <p><strong>Naam:</strong> {{ $booking->name }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
        <p><strong>Service:</strong> {{ $booking->service }}</p>
        <p><strong>Datum:</strong> {{ \Carbon\Carbon::parse($booking->date)->format('d/m/Y') }}</p>
        <p><strong>Aantal Personen:</strong> {{ $booking->people }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Omschrijving</th>
                <th style="width: 150px;">Bedrag (€)</th>
            </tr>
        </thead>
<tbody>
    @php
        $items = [];
        $serviceLabel = '';

        // Base price
        $basePrice = $booking->price;

        // Handle the service label
        if ($booking->service === 'Rondvaart') {
            $start = strtotime($booking->time_start);
            $end = strtotime($booking->time_end);
            $hours = max(1, floor(($end - $start) / 3600));
            $serviceLabel = "Rondvaart {$hours} uur";
        } elseif ($booking->service === 'Watertaxi' && $booking->watertaxiRoute) {
            $serviceLabel = "Watertaxi - " . $booking->watertaxiRoute->name;
        } else {
            $serviceLabel = $booking->service;
        }

        // Arrangement definitions
        $arrangementLabels = [
            'prosecco' => 'Prosecco arrangement',
            'picnic' => 'Picknick arrangement',
            'olala' => 'Olala arrangement',
            'bistro' => 'Bistro arrangement',
            'barca' => 'Barca arrangement',
            'stadswandeling' => 'Stadswandeling',
        ];

        $arrangementPrices = [
            'prosecco' => 15,
            'picnic' => 20,
            'olala' => 18,
            'bistro' => 22,
            'barca' => 25,
            'stadswandeling' => 12,
        ];

        if ($booking->service === 'Rondvaart' && $booking->arrangement) {
            foreach ($arrangementPrices as $key => $price) {
                if ($booking->arrangement->$key == 1) {
                    $basePrice -= $price;
                }
            }
        }

        $items[] = [
            'description' => $serviceLabel,
            'price' => $basePrice,
        ];

        if ($booking->arrangement) {
            foreach ($arrangementLabels as $key => $label) {
                if ($booking->arrangement->$key == 1) {
                    $items[] = [
                        'description' => $label,
                        'price' => $arrangementPrices[$key],
                    ];
                }
            }
        }
    @endphp

    @foreach ($items as $item)
        <tr>
            <td>{{ $item['description'] }}</td>
            <td>{{ number_format($item['price'], 2, ',', '.') }}</td>
        </tr>
    @endforeach
</tbody>

    </table>

    <div class="total">
        <p><strong>Totaal te betalen: €{{ number_format($booking->price, 2, ',', '.') }}</strong></p>
        <p><strong>Vervaldatum:</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y') }}</p>
    </div>

    <div class="footer">
        <p>Bedankt voor uw reservering bij Futuro!</p>
    </div>
</body>
</html>
