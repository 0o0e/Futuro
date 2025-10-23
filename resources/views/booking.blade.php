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

            <div id="watertaxi-section" class="mt-4" style="display:none;">
                <h4 class="mb-3">Kies je bestemming (vertrek: Dordrecht)</h4>
            <select name="watertaxi_route_id" id="watertaxi_route_id" class="form-select"
                    @if(session('service') == 'Watertaxi') required @endif>
                <option value="">-- Kies een bestemming --</option>
                @foreach($watertaxiRoutes as $route)
                    <option value="{{ $route->id }}"
                        data-duration="{{ $route->duration }}"
                        data-price="{{ $route->price }}"

                        @if(session('watertaxi_route_id') == $route->id) selected @endif
                    >
                        {{ $route->destination }} — {{ $route->duration }} — €{{ $route->price }}
                    </option>
                @endforeach
            </select>


                <div id="watertaxi-summary" class="mt-3" style="display:none;">
                    <div class="card border-0 shadow-sm bg-light p-3">
                        <h5 class="mb-3 text-center">Reisoverzicht</h5>
                        <p><strong>Vertrekpunt:</strong> Dordrecht Merwekade</p>
                        <p><strong>Bestemming:</strong> <span id="summary-destination"></span></p>
                        <p><strong>Reistijd:</strong> <span id="summary-duration"></span></p>
                        <p><strong>Prijs:</strong> €<span id="summary-price"></span></p>
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
    const watertaxiSection = document.getElementById('watertaxi-section');
    const routeSelect = document.getElementById('watertaxi_route_id');
    const summaryDiv = document.getElementById('watertaxi-summary');
    const destSpan = document.getElementById('summary-destination');
    const durSpan = document.getElementById('summary-duration');
    const priceSpan = document.getElementById('summary-price');

    function toggleWatertaxi() {
        watertaxiSection.style.display = serviceSelect.value === 'Watertaxi' ? 'block' : 'none';
    }

    function updateSummary() {
        const selected = routeSelect.options[routeSelect.selectedIndex];
        if (selected && selected.value) {
            destSpan.textContent = selected.text.split('—')[0].trim();
            durSpan.textContent = selected.dataset.duration;
            priceSpan.textContent = selected.dataset.price;
            summaryDiv.style.display = 'block';
        } else {
            summaryDiv.style.display = 'none';
        }
    }

    serviceSelect.addEventListener('change', toggleWatertaxi);
    routeSelect.addEventListener('change', updateSummary);
    toggleWatertaxi();
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
                    <label for="time" class="form-label">Begin Tijd</label>

                    <select id="time_start" name="time_start" class="form-control" required>
                        <option value="">-- Kies een tijd --</option>

                        @for ($hour = 10; $hour < 22; $hour++)
                            @for ($minute = 0; $minute < 60; $minute += 30)
                                <option value="{{ sprintf('%02d:%02d', $hour, $minute) }}">
                                    {{ sprintf('%02d:%02d', $hour, $minute) }}
                                </option>
                            @endfor
                        @endfor
                    </select>



                    @if(session('service') !== 'Watertaxi')

                    <label for="time" class="form-label">Eind Tijd</label>

                    <select id="time_end" name="time_end" class="form-control" required>
                        <option value="">-- Kies een tijd --</option>

                        @for ($hour = 10; $hour < 22; $hour++)
                            @for ($minute = 0; $minute < 60; $minute += 30)
                                <option value="{{ sprintf('%02d:%02d', $hour, $minute) }}">
                                    {{ sprintf('%02d:%02d', $hour, $minute) }}
                                </option>
                            @endfor
                        @endfor
                    </select>
                    @endif



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
                <div>
                    <input type="radio" id="prosecco" name="arrangement" value="prosecco" required>
                    <label for="prosecco">Prosecco o Vino a Bordo</label>
                </div>

                <div>
                    <input type="radio" id="picnic" name="arrangement" value="picnic">
                    <label for="picnic">Picknick of Lunch a bordo</label>
                </div>

                <div>
                    <input type="radio" id="olala" name="arrangement" value="olala">
                    <label for="olala">Olala Chocola e Barca</label>
                </div>

                <div>
                    <input type="radio" id="bistro" name="arrangement" value="bistro">
                    <label for="bistro">Bistro twee 33 e Barca</label>
                </div>

                <div>
                    <input type="radio" id="barca" name="arrangement" value="barca">
                    <label for="barca">Barca e Vino</label>
                </div>
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

                @if(session('service') == 'Watertaxi')
                    <input type="hidden" name="watertaxi_route_id" value="{{ session('watertaxi_route_id') }}">
                @endif


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
        @if(!empty($data['arrangement']))
            <p><strong>Arrangement:</strong> {{ $data['arrangement'] }}</p>
        @endif

        <p><strong>Naam:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Opmerking:</strong>{{ $data['opmerking']  }}</p>
        <p class="success"></p>
    </div>
    </div>
    @endif

</body>
</html>
