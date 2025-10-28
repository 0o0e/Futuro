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
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }

        /* Mobile responsive styles */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .card {
                margin: 10px 0;
                padding: 15px;
            }
            
            #calendar {
                max-width: 100%;
                margin: 10px auto;
                padding: 15px;
            }
            
            .booking-button {
                padding: 12px 24px;
                font-size: 16px;
                margin-top: 20px;
            }
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

/* Mobile responsive arrangement options */
@media (max-width: 768px) {
    .arrangement-options {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    
    .arrangement-options .option-card {
        height: 250px;
    }
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
    transition: transform .35s cubic-bezier(.22,.9,.35,1), opacity .25s ease;
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
    background: linear-gradient(to top, rgba(0,0,0,.68), rgba(0,0,0,0));
    pointer-events: none;
}

.arrangement-options .option-card:has(input:checked) {
    border-color: transparent;
    box-shadow: 0 6px 22px rgba(76,128,127,0.12);
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
    background: rgba(76,128,127,0.95);
    color: #fff;
    font-weight: 700;
    font-size: 16px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.18);
}

.arrangement-options .option-card:focus {
    outline: none;
}

.time-buttons {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 6px;
    margin-bottom: 10px;
}

.time-btn {
    padding: 10px 0;
    background: #e9ecef;
    border-radius: 6px;
    font-weight: 600;
    border: 2px solid transparent;
    cursor: pointer;
    transition: .2s;
    text-align: center;
}

.time-btn:hover {
    background: #d4dadf;
}

.time-btn.selected {
    border-color: #4C807F;
    background: #cfe8e7;
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
    display: flex;
    flex-direction: row;
    gap: 80px;
}

#calendar {
    flex: 0 0 450px;
}

/* Mobile responsive booking layout */
@media (max-width: 768px) {
    .booking-layout {
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }
    
    #calendar {
        flex: none;
        width: 100%;
        max-width: 400px;
    }
    
    #time-section {
        flex-direction: column;
        gap: 20px;
        width: 100%;
        max-width: 400px;
    }
    
    .time-buttons {
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
    }
    
    .time-btn {
        padding: 8px 0;
        font-size: 14px;
    }
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
                    <span class="option-title">Vaardebon kopen</span>
                </label>

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
    const watertaxiSection = document.getElementById('watertaxi-section');
    const routeSelect = document.getElementById('watertaxi_route_id');
    const summaryDiv = document.getElementById('watertaxi-summary');
    const destSpan = document.getElementById('summary-destination');
    const durSpan = document.getElementById('summary-duration');
    const priceSpan = document.getElementById('summary-price');

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


    @if($step==2)
    <div class="container py-5">
        <h2 class="mb-4 text-center">Kies een datum</h2>
        <div class="card shadow p-4">
            <form method="POST" action="{{ route('booking') }}" id="time-form">
                @csrf
                <input type="hidden" name="step" value="2">
                <input type="hidden" id="date" name="date" required>

                @if($errors->has('time_end'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('time_end') }}
                    </div>
                @endif


                <div class="booking-layout">

                <div id="calendar"></div>

                <div id="time-section">

                    <div class="single-time">
                    <h5 class="mb-2">Begin Tijd</h5>
                    <div id="start-times" class="time-buttons"></div>
                    <input type="hidden" id="time_start" name="time_start" required>
                    </div>

                    <div class="single-time">
                    @if(session('service') !== 'Watertaxi')
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
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                unselectAuto: false,

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

            function generateTimes(){
                let times = [];
                for (let hour = 10; hour < 22; hour++) {
                    for (let min = 0; min < 60; min+=30) {
                        times.push(`${String(hour).padStart(2,'0')}:${String(min).padStart(2,'0')}`);
                    }
                }
                return times;
            }

            function makeButtons(containerId, times, hiddenFieldId){
                const container = document.getElementById(containerId);
                const hiddenField = document.getElementById(hiddenFieldId);

                container.innerHTML = "";

                times.forEach(time => {
                    const btn = document.createElement('div');
                    btn.classList.add('time-btn');
                    btn.innerText = time;

                    btn.addEventListener('click', () => {
                        container.querySelectorAll('.time-btn').forEach(b => b.classList.remove('selected'));
                        btn.classList.add('selected');
                        hiddenField.value = time;

                        // Validate start vs end time
                        if (containerId === 'end-times') {
                            const startTime = document.getElementById('time_start').value;
                            if (startTime && time <= startTime) {
                                alert('De eind tijd moet later zijn dan de start tijd.');
                                btn.classList.remove('selected');
                                hiddenField.value = '';
                                return;
                            }
                        }

                        // Disable/enable end time buttons based on start time
                        if (containerId === 'start-times') {
                            updateEndTimeButtons();
                            // Clear end time if it's now invalid
                            clearInvalidEndTime();
                        }
                    })

                    container.appendChild(btn);

                });
            }

            function clearInvalidEndTime() {
                const startTime = document.getElementById('time_start').value;
                const endTime = document.getElementById('time_end').value;
                
                if (startTime && endTime && startTime >= endTime) {
                    // Clear the selected end time
                    document.getElementById('time_end').value = '';
                    // Remove selected class from end time buttons
                    document.querySelectorAll('#end-times .time-btn').forEach(b => b.classList.remove('selected'));
                    alert('De eind tijd is gewist omdat deze eerder is dan de nieuwe start tijd.');
                }
            }

            function updateEndTimeButtons() {
                const startTime = document.getElementById('time_start').value;
                const endTimeBtns = document.querySelectorAll('#end-times .time-btn');

                endTimeBtns.forEach(btn => {
                    if (startTime && btn.innerText <= startTime) {
                        btn.style.opacity = '0.5';
                        btn.style.cursor = 'not-allowed';
                        btn.disabled = true;
                    } else {
                        btn.style.opacity = '1';
                        btn.style.cursor = 'pointer';
                        btn.disabled = false;
                    }
                });
            }

            const times = generateTimes();
            makeButtons('start-times', times, 'time_start');

            @if (session('service') !== 'Watertaxi')
            makeButtons('end-times', times, 'time_end');
            updateEndTimeButtons(); // Initialize end time buttons state
            @endif

            // Add form submission validation
            const form = document.getElementById('time-form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const startTime = document.getElementById('time_start').value;
                    const endTime = document.getElementById('time_end').value;
                    const service = '{{ session('service') }}';
                    
                    // Only validate if it's not a Watertaxi service
                    if (service !== 'Watertaxi') {
                        if (startTime && endTime && startTime >= endTime) {
                            e.preventDefault();
                            alert('De eind tijd moet later zijn dan de start tijd.');
                            return false;
                        }
                        
                        // Check if both times are selected
                        if (!startTime || !endTime) {
                            e.preventDefault();
                            alert('Selecteer zowel een start tijd als een eind tijd.');
                            return false;
                        }
                    } else {
                        // For Watertaxi, only start time is required
                        if (!startTime) {
                            e.preventDefault();
                            alert('Selecteer een start tijd.');
                            return false;
                        }
                    }
                });
            }

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

                <div class="arrangement-options">
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


                <div>
                    <label for="people">Aantal personen</label>
                    <input type="number" class="form-control" id="people" name="people" placeholder="Aantal personen..." >
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
