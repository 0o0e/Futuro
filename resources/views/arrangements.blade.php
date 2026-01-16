<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

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

    body,
    html {
        height: 100%;
        overflow-x: hidden;
        background-color: var(--white);
        color: var(--text-dark);
    }

    .scroll-container::-webkit-scrollbar {
        display: none;

    }

    .card {
        width: 350px;
        flex-shrink: 0;
        background-color: var(--primary-light);
        max-height: 580px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);

        border-radius: 20px;
        overflow: hidden;

    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;

    }

    .card-content {
        width: 100%;
        padding: 0.5rem;
        flex-grow: 1;
        padding-top: 20px;
        /* CRITICAL: Takes up all available vertical space */
        overflow: auto;
        /* NEW: Makes content scrollable if it exceeds space */


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
        aspect-ratio: 1 / 1;
        /* 🔹 makes it square */
        position: relative;
        flex-shrink: 0;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
    }

    /* Image always fills the card */
    .card img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Overlay (hidden by default) */
    .card-overlay {
        position: absolute;
        inset: 0;
        background: rgba(53, 92, 82, 0.55);
        /* dark overlay */
        color: white;

        display: flex;
        flex-direction: column;
        justify-content: space-between;

        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* Show overlay on hover */
    .card:hover .card-overlay {
        opacity: 1;
    }

    /* Text styling */
    .card-content {
        padding: 1.5rem;
    }

    .card-content h2 {
        font-size: 1.1rem;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    .card-content p {
        font-size: 0.9rem;
        line-height: 1.4;
    }

    /* Footer inside overlay */
    .card-footer {
        padding: 1rem;
        text-align: center;
        background: rgba(255, 255, 255, 0.15);
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }

    .card-footer:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    h2 {
        margin: 30px;
        margin-left: 100px;
        margin-right: 100px;

        line-height: 1.6;
        margin-bottom: 40px;
        text-align: center;
    }

    .info-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 80px 100px;
        display: flex;
        flex-direction: column;
        gap: 80px;
    }

    .info-block {
        display: flex;
        align-items: center;
        gap: 60px;
    }

    .info-block.reverse {
        flex-direction: row-reverse;
    }

    .info-text {
        flex: 1;
    }

    .info-text h3 {
        font-size: 0.9rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        margin-bottom: 1rem;
        color: #2E3D39;
    }

    .info-text p {
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1rem;
        max-width: 480px;
    }

    .info-button {
        margin-top: 1rem;
        padding: 10px 20px;
        background: transparent;
        border: 1px solid #2E3D39;
        cursor: pointer;
        font-size: 0.85rem;
        transition: all 0.3s;
    }

    .info-button:hover {
        background: #2E3D39;
        color: white;
    }

    .info-image {
        flex: 1;
    }

    .info-image img {
        width: 100%;
        height: auto;
        border-radius: 6px;
        object-fit: cover;
    }

    /* ===========================
   MOBILE FIXES
   =========================== */

    /* tablets + phones */
    @media (max-width: 900px) {

        /* =====================
       TITELS
    ===================== */
        h2 {
            margin: 16px;
            font-size: 1.35rem;
        }

        /* =====================
       CAROUSEL / CARDS
    ===================== */
        .scroll-container {
            padding: 20px 16px;
            gap: 12px;
        }

        .card {
            width: 240px;
            aspect-ratio: 3 / 4;
            border-radius: 16px;
        }

        /* overlay altijd zichtbaar */
        .card-overlay {
            opacity: 1;
            background: linear-gradient(to top,
                    rgba(53, 92, 82, 0.9),
                    rgba(53, 92, 82, 0.4));
        }

        .card-content {
            padding: 14px;
        }

        .card-content h2,
        .card-content h3 {
            font-size: 0.9rem;
            margin-bottom: 6px;
        }

        .card-content p {
            font-size: 0.8rem;
            line-height: 1.35;
            margin: 0;
        }

        /* MAX 3 regels tekst per kaart */


        /* =====================
       INFO SECTIONS
    ===================== */
        .info-section {
            padding: 30px 16px;
            gap: 30px;
        }

        .info-block,
        .info-block.reverse {
            flex-direction: column;
            gap: 0;
            background: var(--bg-light);
            border-radius: 16px;
            padding: 20px;
        }

        /* 🔥 VERWIJDER AFBEELDINGEN OP MOBIEL */
        .info-image {
            display: none;
        }

        .info-text {
            text-align: center;
        }

        .info-text h3 {
            font-size: 0.85rem;
            letter-spacing: 0.12em;
            margin-bottom: 10px;
        }

        .info-text p {
            font-size: 0.85rem;
            line-height: 1.45;
            margin-bottom: 8px;
        }

        .info-button {
            margin-top: 14px;
            padding: 12px 20px;
            font-size: 0.8rem;
            border-radius: 8px;
        }

        /* TITELS */
        h2 {
            margin: 16px;
            font-size: 1.35rem;
        }

        /* CAROUSEL / CARDS */
        .scroll-container {
            padding: 20px 16px;
            gap: 12px;
        }

        .card {
            width: 240px;
            aspect-ratio: 3 / 4;
            border-radius: 16px;
        }


        /* overlay hidden by default */
        .card-overlay {
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        /* show when JS adds 'show' */
        .card-overlay.show {
            opacity: 1;
        }

        .card-content {
            padding: 14px;
        }

        .card-content h2,
        .card-content h3 {
            font-size: 0.95rem;
            margin-bottom: 6px;
        }


        /* overlay hidden by default */
        .card-overlay {
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        /* show when JS adds 'show' */
        .card-overlay.show {
            opacity: 1;
        }

        .card-content p {
            font-size: 0.85rem;
            line-height: 1.5;
            margin: 0;
            /* REMOVE line-clamp so all text is visible */
            display: block;
            overflow: visible;
        }

        /* INFO SECTIONS */
        .info-section {
            padding: 30px 16px;
            gap: 30px;
        }

        .info-block,
        .info-block.reverse {
            flex-direction: column;
            gap: 20px;
            background: var(--bg-light);
            border-radius: 16px;
            padding: 20px;
        }

        .info-image {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        .info-image img {
            width: 100%;
            border-radius: 12px;
            object-fit: cover;
        }

        .info-text {
            text-align: center;
        }

        .info-text h3 {
            font-size: 0.9rem;
            letter-spacing: 0.12em;
            margin-bottom: 8px;
        }

        .info-text p {
            font-size: 0.85rem;
            line-height: 1.45;
            margin-bottom: 8px;
        }

        .info-button {
            margin: 14px auto 0 auto;
            padding: 12px 20px;
            font-size: 0.85rem;
            border-radius: 8px;
        }

        .card-content p {
            display: -webkit-box;
            -webkit-line-clamp: 10;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    }

    /* small phones */
    @media (max-width: 500px) {

        .card {
            width: 220px;
        }

        .card-content p {
            font-size: 0.8rem;
        }
    }


    /* SMALL PHONES */
    @media (max-width: 500px) {
        .card {
            width: 220px;
        }

        .card-content p {
            font-size: 0.8rem;
        }
    }
</style>

<body>
    @include('includes.navbar', ['hideLogo' => false, 'navColor' => 'black'])

    <section class="scroll-section">

        <h2>Arrangementen</h2>

        <div class="scroll-container" id="carousel">

            <div class="carousel-track" id="carouselTrack">

                <div class="card">
                    <img src="kopje1.png" alt="Watertaxi">
                    <div class="card-overlay">

                        <div class="card-content">
                            <h3>DE BOOT VAN DE TOEKOMST</h3>
                            <p>
                                De nieuwste innovatie heet Futuro, een duurzame boot
                                in ontwikkeling met hulp van studenten van de Duurzaamheidsfabriek, Da
                                Vinci en Lexlab. De Futuro combineert krachtige TIER III dieselmotoren met een
                                elektrische
                                voorstuwing, zodat er in natuurgebieden en havens volledig elektrisch gevaren kan
                                worden.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <img src="kopje2.png" alt="Vaardebon">
                    <div class="card-overlay">

                        <div class="card-content">
                            <h2>WATERTAXI</h2>
                            <p>
                                Of u nu een ontspannen ritje wilt maken over het water, een bijzondere bestemming wilt
                                bereiken of gewoon filevrij wilt reizen met een prachtig uitzicht: Futuro staat voor u
                                klaar. Onze comfortabele en moderne watertaxi is ideaal voor zowel zakelijke reizen als
                                privé-uitjes.</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <img src="kopje3.png" alt="Wijn op het water">
                    <div class="card-overlay">

                        <div class="card-content">
                            <h2>VAARDEBON</h2>
                            <p>
                                Geef een origineel cadeau met een Vaardebon voor een rondvaart door historisch
                                Dordrecht,
                                een arrangement of watertaxidienst. Een
                                persoonlijke boodschap toevoegen is mogelijk. Let op: doorverkoop maakt de bon ongeldig.
                                Te koop via mail of telefoon - neem gerust contact met ons op voor meer informatie!</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <img src="kopje4.png" alt="Groepsvaart">
                    <div class="card-overlay">
                        <div class="card-content">
                            <h2>WIJN OP HET WATER</h2>
                            <p>
                                Wijn op het Water - Twee Smaakvolle Arrangementen
                                Prosecco o Vino a Bordo Geniet van een ontspannen rondvaart door de historische
                                binnenstad
                                van Dordrecht met een fles prosecco of wijn aan boord, geserveerd met plat en bruisend
                                water.
                                Prijs: 1 fles €25, 2 flessen €45 (excl. vaartijd)</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <img src="kopje5.png" alt="Privé Rondvaart">
                    <div class="card-overlay">
                        <div class="card-content">
                            <h2>OVER ONS</h2>
                            <p>
                                Imbarcazione Barone - Gastvrijheid op het water sinds 2008
                                Het begon allemaal met de liefde voor een klassieke speedboot: de Nereide. Na een flinke
                                opknapbeurt besloten Elio en Sirio Barone haar in te zetten voor rondvaarten - en zo was
                                Imbarcazione Barone geboren. Al snel bleek hun passie verder te reiken dan
                                alleen varen.
                                -</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>



    <section class="info-section">

        <div class="info-block">
            <div class="info-text">
                <h3>BEDRIJFSUITJES</h3>
                <p>
                    Een uniek bedrijfsuitje op het water? Laat de dagelijkse werkvloer even achter u
                    en geniet samen met collega’s van een originele en duurzame vaartocht.
                </p>
                <p>
                    Wij stellen met plezier een programma samen dat perfect aansluit bij uw wensen.
                </p>
                <button class="info-button">Vraag uw offerte aan</button>
            </div>

            <div class="info-image">
                <img src="barca.png" alt="Bedrijfsuitje">
            </div>
        </div>

        <div class="info-block reverse">
            <div class="info-text">
                <h3>GROEPSGELEGENHEDEN</h3>
                <p>
                    Bent u op zoek naar een unieke groepsactiviteit over het water?
                    Perfect voor families, vrienden of zakelijke gelegenheden.
                </p>
                <button class="info-button">Vraag uw offerte aan</button>
            </div>

            <div class="info-image">
                <img src="bistro.png" alt="Groepsvaart">
            </div>
        </div>

        <div class="info-block">
            <div class="info-text">
                <h3>VAARDEBON</h3>
                <p>
                    Geef een origineel cadeau met een Vaardebon.
                    Ideaal voor rondvaarten, arrangementen of watertaxidiensten.
                </p>
                <button class="info-button">Bestel de Vaardebon</button>
            </div>

            <div class="info-image">
                <img src="/images/vaardebon/3uur.png" alt="Vaardebon">
            </div>
        </div>

    </section>



    @include('includes.footer')
    <script>
        window.addEventListener('load', () => {
            const container = document.querySelector('.scroll-container');
            if (container) {
                container.scrollLeft = (container.scrollWidth - container.clientWidth) / 2;
            }
        });
    </script>
    <script>
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            card.addEventListener('click', () => {
                const overlay = card.querySelector('.card-overlay');

                // Close all other overlays first
                cards.forEach(c => {
                    if (c !== card) {
                        c.querySelector('.card-overlay').classList.remove('show');
                    }
                });

                // Toggle this overlay
                overlay.classList.toggle('show');
            });
        });
    </script>

</body>

</html>
