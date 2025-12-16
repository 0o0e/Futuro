<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over ons</title>

    <style>
        :root {
            --text-dark: #2E3D39;
            --bg-light: #F5F7F6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, sans-serif;
        }

        body {
            background: var(--bg-light);
            color: var(--text-dark);
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            padding: 25px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        .navbar a {
            text-decoration: none;
            color: var(--text-dark);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        /* PAGE */
        .page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 100px;
            display: flex;
            flex-direction: column;
            gap: 120px;
        }

        .section {
            display: flex;
            align-items: flex-start;
            gap: 80px;
        }

        .section.reverse {
            flex-direction: row-reverse;
        }

        .text {
            flex: 1;
        }

        .text h2 {
            font-size: 0.9rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }

        .text p {
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 1.2rem;
        }

        .image {
            flex: 1;
        }

        .image img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>

<body>
    @include('includes.navbar', ['navColor' => 'black']);


    <main class="page">

        <section class="section">
            <div class="text">
                <h2>Over ons</h2>
                <p>
                    Welkom bij Imbarcazione Barone, waar liefde voor het water, gastvrijheid en
                    duurzaamheid samenkomen.
                </p>
                <p>
                    Wat begon in 2008 met het restaureren van de klassieke speedboot Nereïde,
                    groeide uit tot een bijzondere ervaring op het water voor iedereen.
                </p>
                <p>
                    Sinds 2020 varen Elio en Sirio ieder hun eigen koers, maar samen blijven zij
                    zich inzetten voor gastvrijheid en innovatie op het water.
                </p>
            </div>

            <div class="image">
                <img src="kopje4.png" alt="Boot op het water">
            </div>
        </section>

        <section class="section reverse">
            <div class="text">
                <h2>Duurzaamheid</h2>
                <p>
                    Bij Imbarcazione Barone geloven we dat woorden mooi zijn, maar daden het
                    verschil maken.
                </p>
                <p>
                    Onze Futuro is het levende bewijs van deze ambitie: een moderne,
                    duurzame boot die innovatie en verantwoordelijkheid combineert.
                </p>
                <p>
                    Samen met studenten en partners blijven we leren, verbeteren en investeren
                    in een schonere toekomst.
                </p>
            </div>

            <div class="image">
                <img src="kopje1.png" alt="Duurzame technologie">
            </div>
        </section>

    </main>

    @include('includes.footer')
</body>

</html>
