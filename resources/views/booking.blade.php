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
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
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
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }



        .service-options {
            display: flex;
            gap: 1px;
            margin-bottom: 20px;
            justify-content: center;
        }


        .option-card {
            flex: 1;
            max-width: 400px;
            display: block;
            cursor: pointer;
            border: 4px solid transparent;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }


        .option-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .option-card:has(input:checked) {
            border-color: #4C807F;
            box-shadow: 0 0 0 0.5px #4C807F, 0 8px 16px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }

        .option-card input[type="radio"] {
            display: none;
        }

        .option-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .option-card:hover img {
            transform: scale(1.03);
        }

        .option-title {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 15px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
            color: white;
            font-size: 1.4rem;
            font-weight: 300;
            z-index: 10;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }




        .arrangement-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-bottom: 20px;
            align-items: stretch;
        }

        .arrangement-options .option-card {
            position: relative;
            width: 100%;
            height: 300px;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            cursor: pointer;
            border: 1px solid transparent;
            transition: box-shadow .22s ease, border-color .22s ease;
            display: flex;
            align-items: stretch;
        }


        .arrangement-options .option-card input[type="radio"] {
            display: none;
            pointer-events: none;
        }


        .arrangement-options .option-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transform: translateZ(0);
            transition: transform .35s cubic-bezier(.22, .9, .35, 1), opacity .25s ease;
        }

        .arrangement-options .option-card:hover img {
            transform: scale(1.06);
        }

        .arrangement-options .option-card .option-title {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 14px;
            text-align: center;
            color: #fff;
            font-weight: 600;
            font-size: 1.15rem;
            background: linear-gradient(to top, rgba(0, 0, 0, .68), rgba(0, 0, 0, 0));
            pointer-events: none;
        }

        .arrangement-options .option-card:has(input:checked) {
            border-color: transparent;
            box-shadow: 0 6px 22px rgba(76, 128, 127, 0.12);
        }

        .arrangement-options .option-card:has(input:checked) img {
            opacity: 50%;
        }

        .arrangement-options .option-card:has(input:checked)::after {
            content: "✓";
            position: absolute;
            top: 12px;
            right: 12px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(76, 128, 127, 0.95);
            color: #fff;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.18);
        }

        .arrangement-options .option-card:focus {
            outline: none;
        }

        .time-buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 6px;
            margin-bottom: 10px;
        }

        .time-btn {
            padding: 10px 0;
            background: #b8ecc7;
            border-radius: 6px;
            font-weight: 600;
            border: 2px solid transparent;
            cursor: pointer;
            transition: .2s;
            text-align: center;
        }

        .time-btn:hover {
            background: #99cd9c;
        }

        .time-btn.selected {
            border-color: #4C807F;
            background: #99cd9c;
            /* cfe8e7 */
        }

        #calendar {
            width: 450px !important;
            margin: 0;
        }



        .booking-layout {
            display: flex;
            flex-direction: row;
            gap: 30px;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        #time-section {
            margin-left: 60px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        #calendar {
            flex: 0 0 450px;
        }

        #time-section {
            display: flex;
            flex-direction: row;
            gap: 80px;
        }


        .time-btn.unavailable {
            background: #f8d7da;
            border-color: #f5c2c7;
            color: #842029;
            cursor: not-allowed;
            opacity: 0.95;
        }


        .time-btn.unavailable.selected {
            box-shadow: none;
            border-color: #842029;
        }


        .form-label.required::after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-light">
    @if ($step == 1)
        <div class="container py-5">
            <h2 class="mb-4 text-center">Kies een service</h2>
            <div class="card shadow p-4">
                <form method="POST" action="{{ route('booking') }}">
                    @csrf
                    <input type="hidden" name="step" value="1">


                    <div class="arrangement-options">
                        <label class="option-card">
                            <input type="radio" name="service" value="Rondvaart" required>
                            <img src="/rondvaart.png" alt="Rondvaart">
                            <span class="option-title">Rondvaart</span>
                        </label>

                        <label class="option-card">
                            <input type="radio" name="service" value="Watertaxi" required>
                            <img src="/watertaxi.png" alt="Watertaxi">
                            <span class="option-title">Watertaxi</span>
                        </label>

                        <label class="option-card">
                            <input type="radio" name="service" value="vaardebon" required>
                            <img src="/images/vaardebon/vaardebon.png" alt="Watertaxi">

                            <span class="option-title">Vaardebon kopen</span>
                        </label>

                    </div>

                    <div id="people-section" class="mt-3" style="display:none;">
                        <label for="people" class="form-label">Aantal personen</label>
                        <input type="number" id="people" name="people" class="form-control"
                            placeholder="Aantal personen" min="1" max="12">
                    </div>


                    <div id="watertaxi-section" class="mt-4" style="display:none;">
                        <h4 class="mb-3">Kies je bestemming (vertrek: Dordrecht)</h4>
                        <select name="watertaxi_route_id" id="watertaxi_route_id" class="form-select"
                            @if (session('service') == 'Watertaxi') required @endif>
                            <option value="">-- Kies een bestemming --</option>
                            @foreach ($watertaxiRoutes as $route)
                                <option value="{{ $route->id }}" data-duration="{{ $route->duration }}"
                                    data-price="{{ $route->price }}" @if (session('watertaxi_route_id') == $route->id) selected @endif>
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
            document.addEventListener('DOMContentLoaded', function() {
                const watertaxiSection = document.getElementById('watertaxi-section');
                const routeSelect = document.getElementById('watertaxi_route_id');
                const summaryDiv = document.getElementById('watertaxi-summary');
                const destSpan = document.getElementById('summary-destination');
                const durSpan = document.getElementById('summary-duration');
                const priceSpan = document.getElementById('summary-price');

                const peopleSection = document.getElementById('people-section');
                const peopleInput = document.getElementById('people');


                const serviceRadios = document.querySelectorAll('input[name="service"]');

                function toggleWatertaxi() {
                    const selected = document.querySelector('input[name="service"]:checked');
                    if (selected && selected.value === 'Watertaxi') {
                        watertaxiSection.style.display = 'block';
                        routeSelect.required = true;
                    } else {
                        watertaxiSection.style.display = 'none';
                        routeSelect.required = false;
                    }
                    togglePeopleInput();
                }

                function togglePeopleInput() {
                    const selected = document.querySelector('input[name="service"]:checked');
                    if (selected && (selected.value === 'Watertaxi' || selected.value === 'Rondvaart')) {
                        peopleSection.style.display = 'block';
                        peopleInput.required = true;
                    } else {
                        peopleSection.style.display = 'none';
                        peopleInput.required = false;
                    }
                }


                function updateSummary() {
                    const selectedOption = routeSelect.options[routeSelect.selectedIndex];
                    if (selectedOption && selectedOption.value) {
                        destSpan.textContent = selectedOption.text.split('—')[0].trim();
                        durSpan.textContent = selectedOption.dataset.duration;
                        priceSpan.textContent = selectedOption.dataset.price;
                        summaryDiv.style.display = 'block';
                    } else {
                        summaryDiv.style.display = 'none';
                    }
                }

                serviceRadios.forEach(radio => {
                    radio.addEventListener('change', toggleWatertaxi);
                });

                routeSelect.addEventListener('change', updateSummary);

                toggleWatertaxi();
            });
        </script>

    @endif


    @if ($step == 2)
        <div class="container py-5">
            <h2 class="mb-4 text-center">Kies een datum</h2>
            <div class="card shadow p-4">
                <form method="POST" action="{{ route('booking') }}">
                    @csrf
                    <input type="hidden" name="step" value="2">
                    <input type="hidden" id="date" name="date" required>


                    <div class="booking-layout">

                        <div id="calendar"></div>

                        <div id="time-section">

                            <div class="single-time">
                                <h5 class="mb-2">Begin Tijd</h5>
                                <div id="start-times" class="time-buttons"></div>
                                <input type="hidden" id="time_start" name="time_start" required>
                            </div>

                            <div class="single-time">
                                @if (session('service') !== 'Watertaxi')
                                    <h5 class="mb-2">Eind Tijd</h5>
                                    <div id="end-times" class="time-buttons"></div>
                                    <input type="hidden" id="time_end" name="time_end" required>
                                @endif
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="booking-button">Ga verder</button>
                </form>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const bookingsByDate = @json($bookingsByDate);

                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    unselectAuto: false,
                    initialView: 'dayGridMonth',
                    selectable: true,

                    selectAllow: function(selectInfo) {
                        let today = new Date();
                        today.setHours(0, 0, 0, 0);
                        let minDate = new Date(today);
                        minDate.setDate(minDate.getDate() + 7);
                        return selectInfo.start >= minDate;
                    },

                    dayCellDidMount: function(info) {
                        let today = new Date();
                        today.setHours(0, 0, 0, 0);
                        let blockDate = new Date(today);
                        blockDate.setDate(blockDate.getDate() + 7);

                        let cellDate = info.date;
                        cellDate.setHours(0, 0, 0, 0);

                        if (cellDate >= today && cellDate <= blockDate) {
                            info.el.style.backgroundColor = '#ffcccc';
                            info.el.style.opacity = '0.7';
                            info.el.style.cursor = 'not-allowed';
                        }
                    },

                    select: function(info) {
                        const selectedDate = info.startStr;
                        document.getElementById('date').value = info.startStr;
                        markUnavailable(selectedDate);
                    }
                });
                calendar.render();

                function generateTimes() {
                    let times = [];
                    for (let hour = 8; hour < 23; hour++) {
                        times.push(`${String(hour).padStart(2,'0')}:00`);
                    }
                    return times;
                }

                function toMinutes(t) {
                    const [h, m] = t.split(':').map(Number);
                    return h * 60 + m;
                }

                function markUnavailable(dateStr) {
                    const bookings = bookingsByDate[dateStr] || [];
                    const startBtns = document.querySelectorAll('#start-times .time-btn');
                    const endBtns = document.querySelectorAll('#end-times .time-btn');

                    clearButtons(startBtns);
                    clearButtons(endBtns);

                    bookings.forEach(booking => {
                        const start = toMinutes(booking.start);
                        const end = toMinutes(booking.end || '23:00');

                        startBtns.forEach(btn => {
                            const t = toMinutes(btn.dataset.time);
                            if (t >= start && t < end) {
                                makeUnavailable(btn);
                            }
                        });
                        endBtns.forEach(btn => {
                            const t = toMinutes(btn.dataset.time);
                            if (t > start && t <= end) {
                                makeUnavailable(btn);
                            }
                        });
                    });
                }

                function clearButtons(btns) {
                    btns.forEach(btn => {
                        btn.classList.remove('unavailable', 'selected');
                        btn.disabled = false;
                    });
                }

                function makeUnavailable(btn) {
                    btn.classList.add('unavailable');
                    btn.disabled = true;
                }

                // Create time buttons
                function makeButtons(containerId, times, hiddenFieldId) {
                    const container = document.getElementById(containerId);
                    const hiddenField = document.getElementById(hiddenFieldId);
                    container.innerHTML = "";

                    times.forEach(time => {
                        const btn = document.createElement('div');
                        btn.classList.add('time-btn');
                        btn.innerText = time;
                        btn.dataset.time = time;

                        btn.addEventListener('click', () => {
                            if (btn.classList.contains('unavailable')) return;
                            container.querySelectorAll('.time-btn').forEach(b => b.classList.remove(
                                'selected'));
                            btn.classList.add('selected');
                            hiddenField.value = time;

                            if (containerId === 'start-times') {
                                updateEndTimes(time);
                            }
                        });
                        container.appendChild(btn);
                    });
                }

                function updateEndTimes(startTime) {
                    const selectedDate = document.getElementById('date').value;
                    const bookings = bookingsByDate[selectedDate] || [];
                    const endBtns = document.querySelectorAll('#end-times .time-btn');
                    const startMin = toMinutes(startTime);

                    endBtns.forEach(btn => {
                        const endMin = toMinutes(btn.dataset.time);
                        let isBlocked = false;

                        if (endMin <= startMin) {
                            isBlocked = true;
                        }

                        bookings.forEach(booking => {
                            const bookingStart = toMinutes(booking.start);
                            const bookingEnd = toMinutes(booking.end || '23:00');

                            if (startMin < bookingEnd && endMin > bookingStart) {
                                isBlocked = true;
                            }
                        });

                        if (isBlocked) {
                            makeUnavailable(btn);
                        } else {
                            btn.classList.remove('unavailable');
                            btn.disabled = false;
                        }
                    });
                }

                const times = generateTimes();
                makeButtons('start-times', times, 'time_start');

                @if (session('service') !== 'Watertaxi')
                    makeButtons('end-times', times, 'time_end');
                @endif
            });
        </script>

    @endif



    @if ($step == '2_vaardebon')
        <div class="container py-5">

            <h2 class="mb-4 text-center">Kies duur voor uw Vaardebon</h2>
            <div class="card shadow p-4">
                <form action="{{ route('booking') }}" method="POST">
                    @csrf

                    <input type="hidden" name="step" value="2_vaardebon">

                    <div class="mb-3">
                        <div class="arrangement-options">
                            <label class="option-card">
                                <input type="radio" name="hours" value="1" required>
                                <img src="/images/vaardebon/1uur.png" alt="1 uur">
                                <span class="option-title">1 uur - €175</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="hours" value="2" required>
                                <img src="/images/vaardebon/2uur.png" alt="2 uur">
                                <span class="option-title">2 uur - €330</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" name="hours" value="3" required>
                                <img src="/images/vaardebon/3uur.png" alt="3 uur">
                                <span class="option-title">3 uur - €470</span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="booking-button">Ga verder</button>
                </form>
            </div>
        </div>
    @endif


    @if ($step == '3_vaardebon')
        <div class="container py-5">
            <h1 class="mb-4 text-center">Kies een arrangement</h1>

            <div class="card shadow p-4">
                <form action="{{ route('booking') }}" method="POST">
                    @csrf
                    <input type="hidden" name="step" value="3_vaardebon">

                    <div class="mb-3">
                        <div class="arrangement-options">


                            <label class="option-card">
                                <input type="radio" name="arrangement" value="geen" required>
                                <img src="/prosecco.png" alt="Prosecco">
                                <span class="option-title">Geen Arrangement</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="prosecco" name="arrangement" value="prosecco" required>
                                <img src="/prosecco.png" alt="Prosecco">
                                <span class="option-title">Prosecco o Vino a Bordo</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="picnic" name="arrangement" value="picnic">
                                <img src="/picnic.png" alt="picnic">
                                <span class="option-title">Picknick of Lunch a bordo</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="olala" name="arrangement" value="olala">
                                <img src="/olala.png" alt="olala">
                                <span class="option-title">Olala Chocola e Barca</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="bistro" name="arrangement" value="bistro">
                                <img src="/bistro.png" alt="bistro">
                                <span class="option-title">Bistro twee 33 e Barca</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="barca" name="arrangement" value="barca">
                                <img src="/barca.png" alt="barca">
                                <span class="option-title">Barca e Vino</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="stadswandeling" name="arrangement" value="stadswandeling">
                                <img src="/stadswandeling.png" alt="stadswandeling">
                                <span class="option-title">Stadswandeling</span>
                            </label>

                        </div>
                    </div>

                    <button type="submit" class="booking-button">Ga verder</button>
                </form>
            </div>
        </div>
    @endif


    @if ($step == '4_vaardebon')
        <div class="container py-5">
            <h1 class="mb-4 text-center">verstuur</h1>
            <div class="card shadow p-4 mb-4">
                <form action="{{ route('booking') }}" method="POST">
                    @csrf
                    <input type="hidden" name="step" value="4_vaardebon">


                    <div class="mb-3">
                        <label for="name" class="form-label required">Naam</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Jouw naam" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label required">E-mailadres</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="jij@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label required">Telefoon nummer</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            placeholder="06 12345678" required>
                    </div>

                    <button type="submit" class="booking-button">Verstuur</button>


                </form>


            </div>
        </div>
    @endif

    @if ($step == 3)
        <div class="container py-5">
            <h1 class="mb-4 text-center">Kies uw arrangementen</h1>
            <div class="card shadow p-4">
                <form action="{{ route('booking') }}" method="POST">
                    @csrf
                    <input type="hidden" name="step" value="3">

                    <div class="mb-3">


                        <div class="arrangement-options">


                            <label class="option-card">
                                <input type="radio" name="arrangement" value="none" required>
                                <img src="/prosecco.png" alt="Prosecco">
                                <span class="option-title">Geen Arrangement</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="prosecco" name="arrangement" value="prosecco" required>
                                <img src="/prosecco.png" alt="Prosecco">
                                <span class="option-title">Prosecco o Vino a Bordo</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="picnic" name="arrangement" value="picnic">
                                <img src="/picnic.png" alt="picnic">
                                <span class="option-title">Picknick of Lunch a bordo</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="olala" name="arrangement" value="olala">
                                <img src="/olala.png" alt="olala">
                                <span class="option-title">Olala Chocola e Barca</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="bistro" name="arrangement" value="bistro">
                                <img src="/bistro.png" alt="bistro">
                                <span class="option-title">Bistro twee 33 e Barca</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="barca" name="arrangement" value="barca">
                                <img src="/barca.png" alt="barca">
                                <span class="option-title">Barca e Vino</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="stadswandeling" name="arrangement" value="stadswandeling">
                                <img src="/stadswandeling.png" alt="stadswandeling">
                                <span class="option-title">Stadswandeling</span>
                            </label>

                            <label class="option-card">
                                <input type="radio" id="has_table" name="arrangement" value="has_table">
                                <span class="option-title">Tafel aan boord (zelf eten meenemen)</span>
                            </label>


                        </div>


                    </div>


                    <button type="submit" class="booking-button">Ga verder</button>
                </form>
            </div>
        </div>
    @endif
    @if ($step == 4)
        <div class="container py-5">
            <h1 class="mb-4 text-center">Maak een Reservering</h1>
            <div class="card shadow p-4">
                <form action="{{ route('booking') }}" method="POST">
                    @csrf
                    <input type="hidden" name="step" value="4">

                    <div class="mb-3">
                        <label for="name" class="form-label required">Naam</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ session('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label required">E-mailadres</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ session('email') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label required">Telefoon nummer</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            value="{{ session('phone') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adres</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ session('address') }}">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Stad</label>
                        <input type="text" name="city" id="city" class="form-control"
                            value="{{ session('city') }}">
                    </div>
                    <div class="mb-3">
                        <label for="postcode" class="form-label">postcode</label>
                        <input type="text" name="postcode" id="postcode" class="form-control"
                            value="{{ session('postcode') }}">
                    </div>
                    <div class="mb-3">
                        <label for="opmerking" class="form-label">Opmerking</label>
                        <textarea class="form-control" id="opmerking" name="opmerking" rows="3">{{ session('opmerking') }}</textarea>
                    </div>

                    <button type="submit" class="booking-button">Bekijk Reserveringsoverzicht</button>
                </form>
            </div>
        </div>
    @endif




    @if ($step == 5)
        <div class="container py-5">

            <h1 class="mb-4 text-center">Bevestig Reservering</h1>

            <div class="container py-5">
                <div class="card shadow p-4 mb-4">
                    <h4 class="mb-3">Reserveringsoverzicht</h4>

                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td><strong>Service</strong></td>
                                <td>{{ $data['service'] ?? '' }}</td>
                                <td></td>
                            </tr>

                            @if ($data['service'] == 'Rondvaart')
                                <tr>
                                    <td><strong>Datum</strong></td>
                                    <td>{{ \Carbon\Carbon::parse($data['date'])->format('d/m/Y') }}</td>
                                    <td>{{ $data['people'] ?? '' }}p</td>
                                </tr>

                                <tr>
                                    <td>Begin Tijd</td>
                                    <td>{{ $data['time_start'] ?? '' }}</td>
                                    <td>{{ $data['service_price'] ?? 0 }}€</td>
                                </tr>

                                @if (!empty($data['time_end']))
                                    <tr>
                                        <td>Eind Tijd</td>
                                        <td>{{ $data['time_end'] }}</td>
                                        <td></td>
                                    </tr>
                                @endif

                                @if (!empty($data['arrangement']))
                                    <tr>
                                        <td>Arrangement</td>
                                        <td>{{ $data['arrangement'] }}</td>
                                        <td>{{ $data['arrangement_price'] ?? 0 }}€</td>
                                    </tr>
                                @endif
                            @elseif($data['service'] == 'Watertaxi')
                                <tr>
                                    <td>Datum</td>
                                    <td>{{ \Carbon\Carbon::parse($data['date'])->format('d/m/Y') }}</td>
                                    <td>{{ $data['people'] ?? '' }}p</td>
                                </tr>
                                <tr>
                                    <td>Vertrekpunt</td>
                                    <td>{{ $data['departure'] ?? '' }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Bestemming</td>
                                    <td>{{ $data['destination'] ?? '' }}</td>
                                    <td>{{ $data['price'] ?? 0 }}€</td>
                                </tr>
                                <tr>
                                    <td>Begin Tijd</td>
                                    <td>{{ $data['time_start'] ?? '' }}</td>
                                    <td></td>
                                </tr>
                            @endif

                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                                <td>
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-end"><strong>Totaal</strong></td>
                                <td><strong>{{ $data['price'] ?? 0 }}€</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card shadow p-4 mb-4">
                    <h4 class="mb-3">overzicht</h4>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Service</td>
                                <td>{{ $data['service'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Datum</td>
                                <td>{{ \Carbon\Carbon::parse($data['date'])->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <td>Tijd</td>
                                <td>{{ $data['time_start'] }} @if (!empty($data['time_end']))
                                        - {{ $data['time_end'] }}
                                    @endif
                                </td>
                            </tr>
                            @if (!empty($data['arrangement']))
                                <tr>
                                    <td>Arrangement</td>
                                    <td>{{ $data['arrangement'] }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>Naam</td>
                                <td>{{ $data['name'] }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $data['email'] }}</td>
                            </tr>
                            <tr>
                                <td>Telefoon</td>
                                <td>{{ $data['phone'] }}</td>
                            </tr>
                            <tr>
                                <td>Adres</td>
                                <td>{{ $data['address'] }}, {{ $data['postcode'] }}, {{ $data['city'] }}</td>
                            </tr>
                            <tr>
                                <td>Opmerking</td>
                                <td>{{ $data['opmerking'] }}</td>
                            </tr>
                            {{-- <tr>
                                <td><strong>Totaal</strong></td>
                                <td><strong>{{ $data['price'] ?? 0 }}€</strong></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div class="card shadow p-4">
                    <form action="{{ route('booking') }}" method="POST">
                        @csrf
                        <input type="hidden" name="step" value="5">
                        <button type="submit" class="booking-button">Definitief Boeken</button>
                    </form>
                </div>
            </div>

    @endif

</body>

</html>
