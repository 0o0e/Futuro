<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Verdana', sans-serif;
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
    }


    .video-bg{
        position:absolute;
        inset:0;
        z-index:0;
        overflow:hidden;
    }

    .video-bg video{
        position:absolute;
        top:50%; left:50%;
        transform:translate(-50%,-50%);
        min-width:100%;
        min-height:100%;
        width:auto;
        height:auto;
        object-fit:cover;
        display:block;
    }

    .video-overlay{
        position:absolute;
        inset:0;
        background: rgba(0,0,0,0.50);
        z-index:1;
        pointer-events:none;
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
        z-index: 10;
        position: fixed;

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

    .logo {
        max-width: 150px;
        margin: -15px 20px -15px 0;
    }

    .viewport-header {
        position: absolute;
        top: 32%;
        left: 10%;
        transform: translateY(-50%);
        color: white;
        text-align: left;
        z-index:7;

    }

    .hero-text {
        font-size: 67px;
        font-weight: bold;
        line-height: 1.2;
                max-width: 1200px;

        margin-bottom: 20px;
        /* text-shadow: 2px 2px 6px rgba(0,0,0,0.5); */
    }

    .hero-subtext {
        margin-top: -70px;
        font-size: 19px;
        /* margin-bottom: 30px; */
        text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
        margin-left: 870px;
        /* max-width: 340px; */
        right: 10%;
        z-index:7;
        text-align: left;
        align-content: right;



    }

    .booking-button {
        display: inline-block;
        padding: 15px 40px;
        background-color: #4C807F;
        color: white;
        text-decoration: none;
        font-size: 20px;
        border-radius: 30px;
        font-weight: bold;
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
        z-index:9;

    }

    .wave svg {
      position: relative;
      display: block;
      width: 100%;
      height: 250px;
    }

    .wave path {
      fill: #ffffff;
    }


  </style>
</head>
<body>

    <div class="hero">

        <div class="video-bg">
        <video playsinline autoplay muted loop>
        <source src="video.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        </div>

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
            <div class="hero-text">BOEK VANDAAG NOG UW RONDVAART</div>

            <div class="hero-subtext">ONTDEK DORDRECHT, HET NATIONALE <br> PARK DE BIESBOSCH EN HET HISTORISCHE <br> STADSCENTRUM.</div>
            <a href="{{ route('booking') }}" class="booking-button">BOOK NOW</a>
            </div>

            <div class="wave">
            <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path d="M0,160 C240,20 480,300 720,160 C960,20 1200,300 1440,160 L1440,320 L0,320 Z"></path>
            </svg>
        </div>

    </div>
</body>
</html>
