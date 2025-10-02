<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js"></script>

    <style>
        #calendar {
            max-width: 900px;
            margin: 50px auto;
        }
    </style>
</head>
<body>

    <div style="text-align: right; margin: 20px;">
    <a href="{{ route('admin.logout') }}" onclick="return confirm('Are you sure you want to log out?');">
        Uitloggen
    </a>
</div>

    <div class="container">
        <div id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'nl',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today: 'Vandaag',
                    month: 'Maand',
                    week: 'Week',
                    day: 'Dag',
                    list: 'Lijst'
                },

                // Show all bookings
                events: @json($bookings),

                // Optional: prevent selection before today
                selectAllow: function(selectInfo) {
                    let today = new Date();
                    today.setHours(0,0,0,0);
                    return selectInfo.start >= today;
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
