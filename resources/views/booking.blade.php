<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .card {
            text-align: center;
        }

        .card form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .card .mb-3 {
            width: 100%;
        }
        .booking-button {
            display: inline-block;
            margin-top: 30px;
            padding: 15px 30px;
            background-color: #4C807F;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .booking-button:hover {
            background-color: #3a5f5e;
        }


        #calendar {
            max-width: 900px;
            margin: 20px auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }


    </style>
</head>
<body class="bg-light">

    @if($step==1)
    <div class="container py-5">
        <h2 class="mb-4 text-center">Kies een service</h2>
        <div class="card shadow p-4">
            <form method="POST" action="{{ route('booking') }}">
                @csrf
                <input type="hidden" name="step" value="1">

                <div>
                    <label for="rondvaart">Rondvaart</label>
                    <input type="checkbox" id="rondvaart" name="service" value="Rondvaart">
                </div>

                <div>
                    <label for="watertaxi">Watertaxi</label>
                    <input type="checkbox" id="watertaxi" name="service" value="Watertaxi">
                </div>

                <button type="submit" class="booking-button">Ga verder</button>
            </form>
        </div>
    </div>
    @endif


    @if($step==2)
    <div class="container py-5">
        <h2 class="mb-4 text-center">Kies een datum</h2>
        <div class="card shadow p-4">
            <form method="POST" action="{{ route('booking') }}">
                @csrf
                <input type="hidden" name="step" value="2">
                <input type="hidden" id="date" name="date" required>

                <div id="calendar"></div>

                <div class="mb-3 mt-4">
                    <label for="time" class="form-label">Tijd</label>
                    <select id="time" name="time" class="form-control" required>
                        <option value="">-- Kies een tijd --</option>
                        @for ($hour = 10; $hour < 22; $hour++)
                            @for ($minute = 0; $minute < 60; $minute += 30)
                                <option value="{{ sprintf('%02d:%02d', $hour, $minute) }}">
                                    {{ sprintf('%02d:%02d', $hour, $minute) }}
                                </option>
                            @endfor
                        @endfor
                    </select>
                </div>

                <button type="submit" class="booking-button">Ga verder</button>
            </form>
        </div>
    </div>

        <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            select: function(info) {
                document.getElementById('date').value = info.startStr;
            }
        });
        calendar.render();
    });
    </script>
    @endif


    @if($step==3)
    <div class="container py-5">
        <h1 class="mb-4 text-center">Maak een Reservering</h1>
        <div class="card shadow p-4">
            <form action="{{ route('booking') }}" method="POST">
                @csrf
                <input type="hidden" name="step" value="3">

                <div class="mb-3">
                    <label for="name" class="form-label">Naam</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Jouw naam" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mailadres</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="jij@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="opmerking" class="form-label">Opmerking</label>
                    <textarea class="form-control" id="opmerking" name="opmerking" rows="3" placeholder="Eventuele opmerkingen..."></textarea>
                </div>

                <button type="submit" class="booking-button">Verstuur Booking</button>
            </form>
        </div>
    </div>
    @endif


    @if($step == 4)
        <div class="container py-5">

    <div class="card shadow p-4">
        <h2>Boeking success</h2>
        <p><strong>Service:</strong> {{ $data['service'] }}</p>
        <p><strong>Datum:</strong> {{ $data['date'] }}</p>
        <p><strong>Tijd:</strong> {{ $data['time'] }}</p>
        <p><strong>Naam:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Opmerking:</strong>{{ $data['opmerking']  }}</p>
        <p class="success"></p>
    </div>
    </div>
    @endif

</body>
</html>
