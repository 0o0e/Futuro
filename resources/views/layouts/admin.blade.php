<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>@yield('title','Admin Dashboard')</title>


        <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            position: fixed;
            top: 0;
            width: 220px;
            height: 100vh;
            background-color: #1e293b;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 20px;
            color: #38bdf8;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background-color: #334155;
            color: #fff;
        }

        .sidebar a.active {
            background-color: #0ea5e9;
            color: rgb(168, 125, 125);
        }

        .logout {
            margin-top: auto;
            background-color: #dc2626;
            text-align: center;
        }

        .logout:hover {
            background-color: #b91c1c;
        }

        .content {
            margin-left: 220px;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 24px;
            color: #1e293b;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.calendar') }}">Kalender</a>

        @if (auth()->user()->role === 'owner')
            <a href="{{ route('admin.user.create') }}">Nieuwe Gebruiker</a>
        @endif

        <a href="{{ route('admin.reservation.create') }}">Nieuwe reservering</a>

        <a href="{{ route('admin.reservations') }}">Reserveringen</a>

        <a href="{{ route('admin.discount-codes.index') }}">Kortingscodes</a>
        
        <a href="{{ route('admin.logout') }}" onclick="return confirm('uitloggen?');">Uitloggen</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
