<footer>
    <div class="footer-column">
        <h3>Futuro Rondvaarten</h3>
        <p>Welkom bij Futuro — Geniet van comfort, stijl
            en milieubewust varen.</p>
        <div class="social-icons">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </div>

    <div class="footer-column">
        <h3>Diensten</h3>
        <ul>
            <li><a href="#">Rondvaarten</a></li>
            <li><a href="#">Arrangementen</a></li>
            <li><a href="#">Evenementen</a></li>
        </ul>
    </div>

    <div class="footer-column">
        <h3>Contact</h3>
        <ul>
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Neem contact op</a></li>
            <li><a href="#">Boekingsvoorwaarden</a></li>
        </ul>
    </div>

    <div class="footer-bottom">
        © 2025 Futuro Rondvaarten. Alle rechten voorbehouden.
    </div>
</footer>

<style>
    :root {
        --primary: #4C807F;
        --primary2: #4C807F;
    }

    footer {
        background-color: #f9f9f9;
        color: #333;
        padding: 40px 20px;
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
        margin-bottom: 15px;
        color: #000;
    }

    .footer-column p {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .footer-column ul {
        list-style: none;
        padding: 0;
    }

    .footer-column ul li {
        margin-bottom: 8px;
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
        gap: 10px;
        margin-top: 10px;
    }

    .social-icons a {
        color: #333;
        font-size: 18px;
        text-decoration: none;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: var(--primary2);
    }

    .footer-bottom {
        width: 100%;
        text-align: center;
        margin-top: 30px;
        font-size: 12px;
        color: #777;
    }

    /* Mobile tweaks */
    @media (max-width: 600px) {
        footer {
            padding: 20px 10px;
            gap: 20px;
        }

        .footer-column {
            min-width: 150px;
        }

        .footer-column h3 {
            font-size: 16px;
        }

        .footer-column p,
        .footer-column ul li a {
            font-size: 13px;
        }

        .social-icons a {
            font-size: 16px;
        }

        .footer-bottom {
            font-size: 11px;
            margin-top: 20px;
        }
    }
</style>
