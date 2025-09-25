<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Georgia', serif;
        }

        body, html {
            height: 100%;
        }

        .menu {
            background: url('bg.png') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        nav{
            width: 100%;
            background-color:#4C807F;
            padding: 20px 0;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
        }

        nav a{
            text-decoration: none;
            color: white;
            font-size:15px;
            margin: 10px;
        }

        nav a:hover{
            border-bottom: 2px solid white;
            padding-bottom: 5px;
        }

        .logo {
            margin-top: 120px;
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
        .hero-text {
            font-size: 50px;
            text-align: center;
            color: #4C807F;
            margin-top: 50px;
            line-height: 1.2;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="menu">
        <nav>
            <a href="#" class="active">HOME</a>
            <a href="#">RONDVAARTEN</a>
            <a href="#">ARRANGEMENTEN</a>
            <a href="#">OVER FUTURO</a>
            <a href="#">RESERVEREN</a>
            <a href="#">CONTACT</a>
        </nav>
        <img src="logo.png" alt="Futuro Logo" class="logo">

        <div class="hero-text">
            Welkom aan boord<br>bij Futuro
        </div>


        <a href="{{ route('booking') }}" class="booking-button">Boek Nu</a>

    </div>

</body>
</html>
