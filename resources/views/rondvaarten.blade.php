<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diensten - Rondvaarten & Watertaxi</title>
    {{-- <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file here --> --}}
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

        .section {
            padding: 50px 20px;
            text-align: center;
        }

        .section img {
            max-width: 300px;
            height: auto;
            max-height: 700px;

        }


        .section-content {
            margin: 0 auto;
            text-align: center;
        }

        .images-text {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin: 30px 0;
        }

        .images-text img {
            width: 40%;
            height: auto;
        }

        .images-text .text-block {
            flex: 1;
            text-align: left;
        }

        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        .reserve-btn {
            display: inline-block;
            padding: 10px 20px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            margin-top: 20px;
            border-radius: 5px;
        }

        .section-content p {
            color: var(--text-dark);
            margin: 30px;
            margin-left: 100px;
            margin-right: 100px;


            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 40px;
            text-align: center;
        }
    </style>
</head>

<body>

    @include('includes.navbar', ['navColor' => 'black'])

    <section class="section" id="rondvaarten" style="background-color: var(--card-bg)">
        <div class="section-content">
            <h2>RONDVAARTEN</h2>

            <div class="images-text">
                <img src="/images/rondvaarten/rondvaart1.png" alt="Rondvaart 1">
                <div class="text-block">
                    <p>Ontdek Dordrecht vanaf het water, op uw manier! Kies voor een rondvaart van een uur door de
                        sfeervolle
                        historische binnenstad, twee uur door het prachtige natuurgebied De Biesbosch of een combinatie
                        van
                        beide. Liever iets op maat? Wij denken graag met u mee voor een persoonlijke tocht.</p>
                    <p>Nast onze standaardvaarten bieden we complete arrangementen aan: van stadswandelingen en
                        wijnproeverijen
                        tot diners aan boord. U kiest zelf wat bij uw moment past.</p>
                    <p>Elke rondvaart wordt in overleg samengesteld. We zorgen ervoor dat alles past bij uw wensen en
                        sfeer. Van
                        lokale lekkernijen tot culturele stops; het kan allemaal!</p>
                    <p>Veiligheid staat voorop: Futuro voldoet aan de hoogste keuringsseisen en uw ervaren schipper
                        deelt graag
                        zijn kennis over Dordrecht en het water. Welkom aan boord!</p>
                </div>
                <img src="/images/rondvaarten/rondvaart2.png" alt="Rondvaart 2">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Vaart</th>
                        <th>Prijzen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Één uur</td>
                        <td>€175,-</td>
                    </tr>
                    <tr>
                        <td>Twee uur</td>
                        <td>€330,-</td>
                    </tr>
                    <tr>
                        <td>Drie uur</td>
                        <td>€470,-</td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="reserve-btn">Reserveer</a>
        </div>
    </section>


    <!-- Watertaxi Section -->
    <section class="section" id="watertaxi">
        <div class="section-content">
            <h2>WATERTAXI</h2>
            <div class="images-text">
                <img src="/images/rondvaarten/watertaxi1.png" alt="Watertaxi 1">
                <div class="text-block">
                    <p>Stap aan boord van uw persoonlijke watertaxi! Vanuit het hart van Dordrecht brengt de Futuro u
                        vlot en
                        geruisloos naar bijzondere bestemmingen in de regio. Of u een dagje uit plant, onderweg bent
                        naar een
                        restaurant aan het water of een unieke vervoersmiddel zoekt voor een speciale gelegenheid. Wij
                        varen u
                        graag waar u moet zijn.</p>
                    <p>Onze stille en duurzame watertaxi maakt van elke verplaatsing een beleving. Geniet van het
                        uitzicht, de
                        rust op het water en het comfort van onze innovatieve boot.</p>
                    <p>Bekijk hieronder een greep uit onze vaste routes. Wilt u ergens anders heen? Wij maken graag een
                        offerte
                        op maat.</p>
                </div>
                <img src="/images/rondvaarten/watertaxi2.png" alt="Watertaxi 2">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Locatie</th>
                        <th>Prijs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Papendrecht</td>
                        <td>€90,-</td>
                    </tr>

                    <tr>
                        <td>Zwijndrecht</td>
                        <td>€90,-</td>
                    </tr>

                    <tr>
                        <td>Hendrik Ido Ambacht</td>
                        <td>€110,-</td>
                    </tr>

                    <tr>
                        <td>Restaurant Kita in Hendrik Ido Ambacht</td>
                        <td>€110,-</td>
                    </tr>

                    <tr>
                        <td>Hotel Ara in Zwijndrecht</td>
                        <td>€120,-</td>
                    </tr>


                    <tr>
                        <td>Restaurant Le Barrage in Alblasserdam</td>
                        <td>€130,-</td>
                    </tr>

                    <tr>
                        <td>Alblasserdam</td>
                        <td>€130,-</td>
                    </tr>

                    <tr>
                        <td>Kinderdijk</td>
                        <td>€170,-</td>
                    </tr>
                    <tr>
                        <td>Heeren aan de Haven Streefkerk</td>
                        <td>€200,-</td>
                    </tr>

                    <tr>
                        <td>Rotterdam centrum</td>
                        <td>€240,-</td>
                    </tr>
                    <tr>
                        <td>Gorinchem</td>
                        <td>€240,-</td>
                    </tr>

                    <tr>
                        <td>Slot Loevestijn</td>
                        <td>€250,-</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>

</body>

</html>
