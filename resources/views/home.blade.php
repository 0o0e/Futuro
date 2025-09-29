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
            overflow-x: hidden;
        }

        .hero {
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .hero video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.7;
            z-index: -1;
        }

        nav {
            width: 100%;
            background-color: #4C807F;
            padding: 20px 0;
            text-align: center;
            top: 0;
            left: 0;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-size: 15px;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
        }

        nav a:hover {
            border-bottom: 2px solid white;
            padding-bottom: 5px;
        }

        .viewport-header {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .logo {
            max-width: 150px;
            margin-bottom: -15px;
            margin-top: -15px;
        }

        .hero-text {
            font-size: 50px;
            text-align: center;
            color: #ffffff;
            margin: 20px 0;
            line-height: 1.2;
            font-weight: bold;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
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

.wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.wave svg {
    position: relative;
    display: block;
    width: 100%;
    height: 250px;
}

.wave path {
    fill: #ffffff; /* wave color */
}


    </style>
</head>

<body>

    <div class="hero">
        <video playsinline autoplay muted loop poster="polina.jpg" id="bgvid">
            <source src="video.mp4" type="video/mp4">
        </video>

        <nav>
            <img src="logo.png" alt="Futuro Logo" class="logo">

            <a href="#" class="active">HOME</a>
            <a href="#">RONDVAARTEN</a>
            <a href="#">ARRANGEMENTEN</a>
            <a href="#">OVER FUTURO</a>
            <a href="#">RESERVEREN</a>
            <a href="#">CONTACT</a>
        </nav>

        <div class="viewport-header">
            <div class="hero-text">
                Welkom aan boord<br>bij Futuro
            </div>
            <a href="{{ route('booking') }}" class="booking-button">Boek Nu</a>
        </div>


<div class="wave">
  <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
    <path d="M0,160
             C240,20 480,300 720,160
             C960,20 1200,300 1440,160
             L1440,320 L0,320 Z"></path>
  </svg>
</div>

    </div>

</body>
</html>
