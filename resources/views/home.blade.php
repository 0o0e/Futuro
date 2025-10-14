<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
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
    --button: #00BFA6;
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
        display: inline-block;
        background-color: var(--button);
        color: var(--white);
        background: linear-gradient(135deg, var(--primary), var(--button));

        text-decoration: none;
        font-size: 20px;
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



    .scroll-container::-webkit-scrollbar {
        display: none;

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

        border-radius: 30px;
        overflow: hidden;

    }
    .card:hover {
        transform: translateY(-5px);
    }

    .card img {
        width: 100%; height: 200px; object-fit: cover;

    }
    .card-content {
        width: 100%; padding: 1.5rem; flex: 1;

    }
    .card-content h3 { font-size: 1rem; color: #437462; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.5rem; }
    /* .card-content p { font-size: 0.9rem; line-height: 1.5; color: #2c3e50; } */
    .card-footer {
        padding: 1rem;
        background: var(--primary);
        text-align: center;
        color: var(--white);
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }


    .card-footer:hover {
        background-color: var(--primary-light);
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

    .hero,
    .scroll-container,
    .card {
        transform: translateZ(0);
        will-change: transform;


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
      <div class="hero-text">BOEK VANDAAG NOG UW RONDVAART</div>
      <div class="hero-subtext">ONTDEK DORDRECHT, HET NATIONALE <br> PARK DE BIESBOSCH EN HET HISTORISCHE <br> STADSCENTRUM.</div>
      <a href="{{ route('booking') }}" class="booking-button">RESERVEER NU</a>
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
        <img src="kopje1.png" alt="Watertaxi">
        <div class="card-content">
          <h2>DE BOOT VAN DE TOEKOMST</h2>
          <p>
De nieuwste innovatie heet Futuro, een duurzame boot
in ontwikkeling met hulp van studenten van de Duurzaamheidsfabriek, Da
Vinci en Lexlab. De Futuro combineert krachtige TIER III dieselmotoren met een elektrische voorstuwing, zodat er in natuurgebieden en havens volledig elektrisch gevaren kan worden.</p>
        </div>
        <div class="card-footer">Meer Informatie</div>
      </div>

      <div class="card">
        <img src="kopje2.png" alt="Vaardebon">
        <div class="card-content">
          <h2>WATERTAXI</h2>
          <p>
Of u nu een ontspannen ritje wilt maken over het water, een bijzondere bestemming wilt bereiken of gewoon filevrij wilt reizen met een prachtig uitzicht: Futuro staat voor u klaar. Onze comfortabele en moderne watertaxi is ideaal voor zowel zakelijke reizen als privé-uitjes.</p>
        </div>
        <div class="card-footer">Meer Informatie</div>
      </div>

      <div class="card">
        <img src="kopje3.png" alt="Wijn op het water">
        <div class="card-content">
          <h2>VAARDEBON</h2>
          <p>
Geef een origineel cadeau met een Vaardebon voor een rondvaart door historisch Dordrecht, een arrangement of watertaxidienst. Een
persoonlijke boodschap toevoegen is mogelijk. Let op: doorverkoop maakt de bon ongeldig.
Te koop via mail of telefoon - neem gerust contact met ons op voor meer informatie!</p>
        </div>
        <div class="card-footer">Meer Informatie</div>
      </div>

      <div class="card">
        <img src="kopje4.png" alt="Groepsvaart">
        <div class="card-content">
          <h2>WIJN OP HET WATER</h2>
          <p>
Wijn op het Water - Twee Smaakvolle Arrangementen
Prosecco o Vino a Bordo Geniet van een ontspannen rondvaart door de historische binnenstad van Dordrecht met een fles prosecco of wijn aan boord, geserveerd met plat en bruisend water.
Prijs: 1 fles €25, 2 flessen €45 (excl. vaartijd)</p>
        </div>
        <div class="card-footer">Meer Informatie</div>
      </div>

      <div class="card">
        <img src="kopje5.png" alt="Privé Rondvaart">
        <div class="card-content">
          <h2>OVER ONS</h2>
          <p>
Imbarcazione Barone - Gastvrijheid op het water sinds 2008
Het begon allemaal met de liefde voor een klassieke speedboot: de Nereide. Na een flinke opknapbeurt besloten Elio en Sirio Barone haar in te zetten voor rondvaarten - en zo was Imbarcazione Barone geboren. Al snel bleek hun passie verder te reiken dan
alleen varen.
-</p>
        </div>
        <div class="card-footer">Meer Informatie</div>
      </div>

    </div>
  </div>

</section>


<section class="intro">
    <img class="intro-image" src="intro.png" alt="intro image">

    <div class="intro-text">
        <h2>Wat kan u verwachten?</h2>
        <p>
            Elke rondvaart organiseren wij in overleg met u geheel naar uw persoonlijke wensen.
            <br></br>
            Zo kunt u op de pagina 'Arrangementen' uw rondvaart aanvullen met een uniek Dordts arrangement.
            <br></br>
            Van een prachtig plateau tot een compleet diner aan boord, het kan allemaal!
            <br></br>
            Ook kan uw rondvaart met een proeverij bij Rutte Distilleerderij, de Stadsbrouwerij of Olala Chocola worden aangevuld.
            <br></br>
            Of wat dacht u van een rondleiding in het Binnenvaartmuseum en Leefwerf De Biesbosch, het Dordts Patriciërshuis of de molen Kijck over den Dijck?
            <br></br>
            Ons enige uitgangspunt dat wij hanteren voor een rondvaart is dat het veilig moet zijn.
            <br></br>
            De Futuro is daarom gekeurd conform de eisen van het Rotterdamse Havenbedrijf. Daarnaast is uw schipper zeer ervaren en kan hij u van alles vertellen over Dordrecht, De Biesbosch en de dynamiek van het water.
            <br></br>
            U bent altijd welkom aan boord!
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
</body>
</html>
