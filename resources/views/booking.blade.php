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

    @if($step == 1)
        <div class="container py-5">
            <h2 class="mb-4 text-center">Kies een service</h2>
            <div class="card shadow p-4">
                <form method="POST" action="{{ route('booking') }}">
                    @csrf
                    <input type="hidden" name="step" value="1">

                    <div class="mb-3">
                        <label for="service">Kies een service</label>
                        <select id="service" name="service" class="form-select" required>
                            <option value="">-- Kies een service --</option>
                            <option value="Rondvaart" {{ session('service') == 'Rondvaart' ? 'selected' : '' }}>Rondvaart</option>
                            <option value="Watertaxi" {{ session('service') == 'Watertaxi' ? 'selected' : '' }}>Watertaxi</option>
                        </select>
                    </div>

                    <div id="travel-planner" class="mt-4" style="display: none;">
                        <h4 class="mb-3">Plan je watertaxi rit</h4>

                        <div class="mb-3">
                            <label for="departure">Vertrekpunt</label>
                            <select id="departure" name="departure" class="form-select">
                                <option value="">-- Kies een vertrekpunt --</option>
                                <option value="Dordrecht Merwekade" {{ session('departure') == 'Dordrecht Merwekade' ? 'selected' : '' }}>Dordrecht Merwekade</option>
                                <option value="Papendrecht" {{ session('departure') == 'Papendrecht' ? 'selected' : '' }}>Papendrecht</option>
                                <option value="Zwijndrecht" {{ session('departure') == 'Zwijndrecht' ? 'selected' : '' }}>Zwijndrecht</option>
                                <option value="Alblasserdam" {{ session('departure') == 'Alblasserdam' ? 'selected' : '' }}>Alblasserdam</option>
                                <option value="Kinderdijk" {{ session('departure') == 'Kinderdijk' ? 'selected' : '' }}>Kinderdijk</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="destination">Bestemming</label>
                            <select id="destination" name="destination" class="form-select">
                                <option value="">-- Kies een bestemming --</option>
                                <option value="Papendrecht" {{ session('destination') == 'Papendrecht' ? 'selected' : '' }}>Papendrecht</option>
                                <option value="Zwijndrecht" {{ session('destination') == 'Zwijndrecht' ? 'selected' : '' }}>Zwijndrecht</option>
                                <option value="Hendrik Ido Ambacht" {{ session('destination') == 'Hendrik Ido Ambacht' ? 'selected' : '' }}>Hendrik Ido Ambacht</option>
                                <option value="Restaurant Kita in Hendrik Ido Ambacht" {{ session('destination') == 'Restaurant Kita in Hendrik Ido Ambacht' ? 'selected' : '' }}>Restaurant Kita in Hendrik Ido Ambacht</option>
                                <option value="Hotel Ara in Zwijndrecht" {{ session('destination') == 'Hotel Ara in Zwijndrecht' ? 'selected' : '' }}>Hotel Ara in Zwijndrecht</option>
                                <option value="Restaurant Le Barrage in Alblasserdam" {{ session('destination') == 'Restaurant Le Barrage in Alblasserdam' ? 'selected' : '' }}>Restaurant Le Barrage in Alblasserdam</option>
                                <option value="Alblasserdam" {{ session('destination') == 'Alblasserdam' ? 'selected' : '' }}>Alblasserdam</option>
                                <option value="Heeren aan de Haven Streefkerk" {{ session('destination') == 'Heeren aan de Haven Streefkerk' ? 'selected' : '' }}>Heeren aan de Haven Streefkerk</option>
                                <option value="Kinderdijk" {{ session('destination') == 'Kinderdijk' ? 'selected' : '' }}>Kinderdijk</option>
                                <option value="Rotterdam centrum" {{ session('destination') == 'Rotterdam centrum' ? 'selected' : '' }}>Rotterdam centrum</option>
                                <option value="Gorinchem" {{ session('destination') == 'Gorinchem' ? 'selected' : '' }}>Gorinchem</option>
                                <option value="Slot Loevestein" {{ session('destination') == 'Slot Loevestein' ? 'selected' : '' }}>Slot Loevestein</option>
                            </select>
                        </div>

                        <div id="travel-summary" class="mt-4" style="display:none;">
                            <div class="card border-0 shadow-sm bg-light p-3">
                                <h5 class="mb-3 text-center">Reisoverzicht</h5>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span><strong>Vertrek:</strong></span>
                                    <span id="departure-display"></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span><strong>Bestemming:</strong></span>
                                    <span id="destination-display"></span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span><strong>Reistijd:</strong></span>
                                    <span id="time-display"></span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><strong>Prijs:</strong></span>
                                    <span>€<span id="price-display"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="booking-button mt-4">Ga verder</button>
                </form>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const serviceSelect = document.getElementById('service');
            const travelPlanner = document.getElementById('travel-planner');
            const departureSelect = document.getElementById('departure');
            const destinationSelect = document.getElementById('destination');
            const travelSummary = document.getElementById('travel-summary');
            const departureDisplay = document.getElementById('departure-display');
            const destinationDisplay = document.getElementById('destination-display');
            const timeDisplay = document.getElementById('time-display');
            const priceDisplay = document.getElementById('price-display');

            const routes = {
                "Dordrecht Merwekade": {
                    "Papendrecht": { time: "15 minuten", price: 90 },
                    "Zwijndrecht": { time: "15 minuten", price: 90 },
                    "Hendrik Ido Ambacht": { time: "20 minuten", price: 110 },
                    "Restaurant Kita in Hendrik Ido Ambacht": { time: "20 minuten", price: 110 },
                    "Hotel Ara in Zwijndrecht": { time: "25 minuten", price: 120 },
                    "Restaurant Le Barrage in Alblasserdam": { time: "30 minuten", price: 130 },
                    "Alblasserdam": { time: "30 minuten", price: 130 },
                    "Heeren aan de Haven Streefkerk": { time: "50 minuten", price: 200 },
                    "Kinderdijk": { time: "45 minuten", price: 170 },
                    "Rotterdam centrum": { time: "1 uur", price: 240 },
                    "Gorinchem": { time: "1 uur", price: 240 },
                    "Slot Loevestein": { time: "1 uur 10 minuten", price: 250 },
                }
            };

            function toggleTravelPlanner() {
                travelPlanner.style.display = serviceSelect.value === 'Watertaxi' ? 'block' : 'none';
            }

            function updateTravelSummary() {
                const departure = departureSelect.value;
                const destination = destinationSelect.value;

                if (routes[departure] && routes[departure][destination]) {
                    const data = routes[departure][destination];
                    departureDisplay.textContent = departure;
                    destinationDisplay.textContent = destination;
                    timeDisplay.textContent = data.time;
                    priceDisplay.textContent = data.price;
                    travelSummary.style.display = 'block';
                } else {
                    travelSummary.style.display = 'none';
                }
            }

            serviceSelect.addEventListener('change', toggleTravelPlanner);
            departureSelect.addEventListener('change', updateTravelSummary);
            destinationSelect.addEventListener('change', updateTravelSummary);

            toggleTravelPlanner();
        });
        </script>
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

                selectAllow: function(selectInfo) {
                    let today = new Date();
                    today.setHours(0,0,0,0);

                    let minDate = new Date(today);
                    minDate.setDate(minDate.getDate() + 7);

                    return selectInfo.start >= minDate;
                },

                dayCellDidMount: function(info) {
                    let today = new Date();
                    today.setHours(0,0,0,0);

                    let blockDate = new Date(today);
                    blockDate.setDate(blockDate.getDate() + 7);

                    let cellDate = info.date;
                    cellDate.setHours(0,0,0,0);

                    if (cellDate >= today && cellDate <= blockDate) {
                        info.el.style.backgroundColor = '#ffcccc';
                        info.el.style.opacity = '0.7';
                        info.el.style.cursor = 'not-allowed'; 
                    }
                },

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
        <h1 class="mb-4 text-center">Kies uw arrangementen</h1>
        <div class="card shadow p-4">
            <form action="{{ route('booking') }}" method="POST">
                @csrf
                <input type="hidden" name="step" value="3">

                <div class="mb-3">
                    <label for="destination">Arrangement</label>
                    <select id="arrangement" name="arrangement" class="form-select">
                        <option value="">-- Kies een Arrangement --</option>
                        <option value="Bonbons">Bonbons</option>
                        <option value="Wijnisfijn">Wijnisfijn</option>
                    </select>
                </div>

                <button type="submit" class="booking-button">Ga verder</button>
            </form>
        </div>
    </div>
    @endif


    @if($step==4)
    <div class="container py-5">
        <h1 class="mb-4 text-center">Maak een Reservering</h1>
        <div class="card shadow p-4">
            <form action="{{ route('booking') }}" method="POST">
                @csrf
                <input type="hidden" name="step" value="4">

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


    @if($step == 5)
        <div class="container py-5">

    <div class="card shadow p-4">
        <h2>Boeking success</h2>
        <p><strong>Service:</strong> {{ $data['service'] }}</p>
        @if(!empty($data['departure']) && !empty($data['destination']))
            <p><strong>Vertrekpunt:</strong> {{ $data['departure'] }}</p>
            <p><strong>Bestemming:</strong> {{ $data['destination'] }}</p>
        @endif
        <p><strong>Datum:</strong> {{ $data['date'] }}</p>
        <p><strong>Tijd:</strong> {{ $data['time'] }}</p>
        <p><strong>Arrangement:</strong> {{ $data['arrangement'] }}</p>
        <p><strong>Naam:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Opmerking:</strong>{{ $data['opmerking']  }}</p>
        <p class="success"></p>
    </div>
    </div>
    @endif

</body>
</html>
