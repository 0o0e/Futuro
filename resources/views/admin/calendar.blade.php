@extends('layouts.admin')

@section('title','Kalender')

@section('content')
<div class="calendar-container">
    <div class="calendar-card">
        <div id="calendar"></div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js"></script>

<style>
.calendar-container {
    max-width: 1100px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: 'Inter', 'Segoe UI', sans-serif;
}

.calendar-title {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color: #3b3b3b;
}

.calendar-card {
    background-color: #fefefe;
    border-radius: 16px;
    box-shadow: 0 6px 25px rgba(0,0,0,0.1);
    padding: 25px;
    transition: transform 0.2s;
}


.fc-event {
    border-radius: 12px !important;
    padding: 6px 10px !important;
    font-size: 0.9rem;
    font-weight: 600;
    color: #fff !important;
    border: none !important;
    background-color: #5a67d8 !important;
}

.fc-event:hover {
    background-color: #434190 !important;
    cursor: pointer;
}

.fc .fc-toolbar-title {
    font-size: 1.5rem;
    color: #2d3748;
    font-weight: 600;
}

.fc-button {
    background-color: #edf2f7 !important;
    color: #2d3748 !important;
    border: none !important;
    border-radius: 8px !important;
    padding: 5px 12px !important;
    font-weight: 500;
}

.fc-button:hover {
    background-color: #e2e8f0 !important;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'nl',
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        buttonText: {
            today: 'Vandaag',
            month: 'Maand',
            week: 'Week',
            day: 'Dag',
            list: 'Lijst'
        },
        events: @json($bookings),
        selectable: true,
        selectAllow: function(selectInfo) {
            let today = new Date();
            today.setHours(0,0,0,0);
            return selectInfo.start >= today;
        },
        eventClick: function(info) {
            alert('Boeking: ' + info.event.title + '\nDatum: ' + info.event.start.toLocaleDateString());
        }
    });

    calendar.render();
});
</script>
@endsection
