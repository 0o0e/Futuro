<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rondvaarten - Futuro</title>

   <style>

    :root {
    --primary: #4C807F;
    --primary2: #4C807F;
    /* 4C807F */
    --primary-light: #d7e4dc;
    --bg-light: #F5F7F6;
    --card-bg: #E4EEEC;
    --text-dark: #2E3D39;
    --white: #FFFFFF;
    --button: #7bc5bb;
    }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Verdana', sans-serif;
    }

    body, html {
        height: 100%;
        overflow-x: hidden;
        background-color: var(--white);
        color: var(--text-dark);
    }

    .hero {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
        contain: layout paint size;
        margin-bottom: 50px;
    }

    .video-bg{
        position:absolute;
        inset:0;
        z-index:0;
        overflow:hidden;
    }

    .video-bg video{
        object-fit: cover;
        width: 100%;
        height: 100%;
        will-change: transform;
        backface-visibility: hidden;
    }

    .video-overlay{
        position:absolute;
        inset:0;
        background: rgba(0,0,0,0.50);
        z-index:1;
        pointer-events:none;
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
    }

    .hero-subtext {
        margin-top: -70px;
        font-size: 19px;
        text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
        margin-left: 870px;
        text-align: left;
    }

    .booking-button {
        display: inline-block;
        padding: 15px 40px;
        font-size: 20px;
        border-radius: 30px;
        background-color: var(--button);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary), var(--button));
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.30);
        text-decoration: none;
        font-weight: bold;
        border: 2px solid var(--primary);
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .booking-button:hover {
        background-color: transparent;
        background: transparent;
        color: var(--white);
        border-color: var(--white);
    }

    .wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        z-index:9;
        bottom: -1px;
        transform: translateY(2px);
    }

    .wave svg {
      position: relative;
      display: block;
      width: 100%;
      height: 250px;
      margin-bottom: -7px;
    }

    .wave path {
      fill: #ffffff;
    }

    .scroll-container {
        display: flex;
        gap: 2rem;
        overflow-x: auto;
        padding: 50px 100px;
        scroll-behavior: smooth;
    }

    .scroll-container::-webkit-scrollbar {
        display: none;
    }

    .carousel-track {
        display: flex;
        gap: 2rem;
    }

    .card {
        width: 350px;
        flex-shrink: 0;
        background-color: var(--primary-light);
        height: 700px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        transition: transform 0.3s ease;
        border-radius: 20px;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }

    .card img {
        width: 100%; 
        height: 200px; 
        object-fit: cover;
    }
    
    .card-content {
        width: 100%; 
        padding: 1.5rem; 
        flex: 1;
    }

    .card-footer {
        padding: 1rem;
        background: var(--primary);
        text-align: center;
        color: var(--primary-light);
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }

    .card-footer:hover {
        background-color: var(--primary-light);
        color: var(--primary)
    }

    .intro {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 3rem;
        padding: 6rem 10vw;
        background: linear-gradient(180deg, #ffffff 0%, #eef3f1 100%);
    }

    .intro-image {
        width: 500px;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .intro-text {
        max-width: 600px;
        color: var(--primary);
    }

    .intro-text h2 {
        font-weight: 100;
        margin-bottom: 20px;
    }

    .intro-text p {
        line-height: 1.7;
        font-size: 1rem;
    }

    .card p{
        padding-right: 20px;
        padding-left: 20px;
        word-spacing: 2px;
        color: var(--text-dark);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .card h2{
        padding-right: 20px;
        padding-left: 20px;
        margin-bottom: 20px;
        font-size: 1.2rem;
        color: var(--primary);
        font-weight: 500;
    }

    .floating-button {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: var(--button);
        color: var(--white);
        font-weight: 600;
        text-decoration: none;
        padding: 14px 36px;
        border-radius: 4px;
        font-size: 1rem;
        background: linear-gradient(135deg, var(--primary), var(--button));
        letter-spacing: 0.5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        z-index: 1000;
        transition: background-color 0.25s ease, transform 0.25s ease;
    }

    .floating-button:hover {
        background-color: var(--primary-light);
        transform: translateY(-2px);
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.6);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        width: 90%;
        max-width: 1200px;
        height: 90%;
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 30px;
        cursor: pointer;
        font-weight: bold;
    }

    .booking-iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

  </style>
</head>
<body>

  <div class="hero">
    <div class="video-bg">
        <video playsinline autoplay muted loop preload="metadata">
            <source src="video.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    @include('includes.navbar')

    <div class="viewport-header">
      <div class="hero-text">RONDVAARTEN</div>
      <div class="hero-subtext">ONTDEK DE PRACHTIGE WATERWERELD VAN <br> DORDRECHT EN DE BIESBOSCH</div>
      <a href="#" class="booking-button" id="openBookingModal">RESERVEER NU</a>
    </div>

    <div class="wave">
      <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path d="M0,160 C240,20 480,300 720,160 C960,20 1200,300 1440,160 L1440,320 L0,320 Z"></path>
      </svg>
    </div>
  </div>

<section class="scroll-section">
  <div class="scroll-container" id="carousel">
    <div class="carousel-track" id="carouselTrack">

      <div class="card">
        <img src="/kopje1.png" alt="Historische Rondvaart">
        <div class="card-content">
          <h2>HISTORISCHE STADSTOUR</h2>
          <p>
Vaar door de historische binnenstad van Dordrecht en ontdek de rijke geschiedenis van de oudste stad van Holland.</p>
        </div>
        <div class="card-footer">Reserveer Nu</div>
      </div>

      <div class="card">
        <img src="/kopje2.png" alt="Biesbosch Rondvaart">
        <div class="card-content">
          <h2>BIESBOSCH NATUURTOUR</h2>
          <p>
Ontdek de unieke natuur van Nationaal Park De Biesbosch met zijn karakteristieke landschap en rijke fauna.</p>
        </div>
        <div class="card-footer">Reserveer Nu</div>
      </div>

      <div class="card">
        <img src="/kopje3.png" alt="Sunset Cruise">
        <div class="card-content">
          <h2>SUNSET CRUISE</h2>
          <p>
Geniet van een romantische avondvaart tijdens zonsondergang met uitzicht over het water.</p>
        </div>
        <div class="card-footer">Reserveer Nu</div>
      </div>

    </div>
  </div>
</section>

<section class="intro">
    <img class="intro-image" src="intro.png" alt="Rondvaarten intro">

    <div class="intro-text">
        <h2>Onze Rondvaarten</h2>
        <p>
            Elke rondvaart organiseren wij in overleg met u geheel naar uw persoonlijke wensen.
            <br><br>
            Van een intieme rondvaart voor twee personen tot een groepsuitje met wel 50 personen, alles is mogelijk aan boord van de Futuro.
        </p>
    </div>
</section>

<a href="{{ route('booking') }}" class="floating-button">Reserveer nu</a>

@include('includes.footer')

<script>
  window.addEventListener('load', () => {
    const container = document.querySelector('.scroll-container');
    if (container) {
      container.scrollLeft = (container.scrollWidth - container.clientWidth) / 2;
    }
  });
</script>

<div id="bookingModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <iframe src="{{ route('booking') }}" class="booking-iframe"></iframe>
  </div>
</div>

<script>
const modal = document.getElementById('bookingModal');
const openBtn = document.getElementById('openBookingModal');
const closeBtn = document.querySelector('.close');

openBtn.addEventListener('click', function(e) {
    e.preventDefault();
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
});

closeBtn.addEventListener('click', function() {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
});

window.addEventListener('click', function(e) {
    if (e.target === modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
});
</script>

</body>
</html>