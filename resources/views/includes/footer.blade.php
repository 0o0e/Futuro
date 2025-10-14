<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>


    /* FOOTER */
    footer {
      background-color: #f9f9f9;
      color: #333;
      padding: 60px 100px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 50px;
    }

    .footer-column {
      flex: 1;
      min-width: 200px;
    }

    .footer-column h3 {
      font-size: 18px;
      margin-bottom: 20px;
      color: #000;
    }

    .footer-column p {
      color: #555;
      line-height: 1.6;
      font-size: 14px;
    }

    .footer-column ul {
      list-style: none;
    }

    .footer-column ul li {
      margin-bottom: 10px;
    }

    .footer-column ul li a {
      text-decoration: none;
      color: #555;
      font-size: 14px;
      transition: color 0.3s;
    }

    .footer-column ul li a:hover {
      color: var(--primary);
    }

    .social-icons {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-icons a {
      color: #333;
      font-size: 20px;
      text-decoration: none;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: var(--primary2);
    }

    .footer-bottom {
      text-align: center;
      width: 100%;
      margin-top: 40px;
      color: #777;
      font-size: 13px;
    }
    </style>
</head>
<body>

  <footer>
    <div class="footer-column">
      <h3>Futuro Rondvaarten</h3>
      <p>Welkom bij Futuro — uw duurzame rondvaart-ervaring door Dordrecht en de Biesbosch. Geniet van comfort, stijl en milieubewust varen.</p>
      <div class="social-icons">
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
      </div>
    </div>

    <div class="footer-column">
      <h3>Bedrijf</h3>
      <ul>
        <li><a href="#">Over ons</a></li>
        <li><a href="#">Onze vloot</a></li>
        <li><a href="#">Vacatures</a></li>
        <li><a href="#">Nieuws & Media</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h3>Diensten</h3>
      <ul>
        <li><a href="#">Rondvaarten</a></li>
        <li><a href="#">Arrangementen</a></li>
        <li><a href="#">Privéboekingen</a></li>
        <li><a href="#">Evenementen</a></li>
      </ul>
    </div>

    <div class="footer-column">
      <h3>Contact</h3>
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Neem contact op</a></li>
        <li><a href="#">Boekingsvoorwaarden</a></li>
        <li><a href="#">Privacybeleid</a></li>
      </ul>
    </div>

    <div class="footer-bottom">
      © 2025 Futuro Rondvaarten. Alle rechten voorbehouden.
    </div>
  </footer>

</body>
</html>
