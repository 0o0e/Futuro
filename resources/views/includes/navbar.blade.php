<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('78ceae54-bcfd-4305-b90d-38ba3f8a553e.png') no-repeat center center/cover;
            font-family: Arial, sans-serif;
        }

        /*
        nav {
            width: 100%;
            padding: 20px 20px;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 10;
        } */

        nav {
            width: 100%;
            padding: 20px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* 🔑 BELANGRIJK */
            position: relative;
            z-index: 10;
        }


        /* Links styling - centered on desktop */
        .nav-links {
            display: flex;
            gap: 30px;
            justify-content: center;
            align-items: center;
            position: absolute;
            /* center independently of logo */
            left: 50%;
            margin-top: 60px;
            transform: translateX(-50%);
        }

        nav a {
            text-decoration: none;
            /* color: white; */
            color: var(--nav-link-color, white);
            color: var(--nav-link-color, black);

            font-size: 17px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        nav a:hover {
            border-bottom: 2px solid white;

            padding-bottom: 4px;
        }

        .logo {
            width: 250px;
            height: auto;
            object-fit: contain;
        }


        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
        }

        .hamburger span {
            width: 28px;
            height: 3px;
            background: #4C807F;
            display: block;
            background: black;
            /* default for all pages */
            transition: 0.3s ease;
        }

        nav a {
            color: var(--nav-link-color, white);
            transition: all 0.3s ease;
        }

        @media (max-width: 900px) {


            .hamburger {
                display: flex;
            }


            .nav-links {
                display: none;
                flex-direction: column;
                gap: 20px;
                position: absolute;
                top: 70px;
                left: 0;
                background: rgba(0, 0, 0, 0.85);
                padding: 25px 35px;
                border-radius: 0 0 12px 12px;
                align-items: flex-start;
                /* left-aligned links in dropdown */
                animation: fadeIn 0.3s ease;
                z-index: 1000;
                transform: none;
                /* reset transform for mobile */
                margin-top: 0px;
            }

            .nav-links.show {
                display: flex;
            }

            nav a {
                font-size: 16px;
            }

            .logo {
                width: 170px;
            }

            @media (max-width: 900px) {

                .hamburger {
                    display: flex;
                    order: 1;
                    /* 🔑 hamburger links */
                    margin-left: 10px;
                }

                .logo {
                    width: 140px;
                    order: 2;
                    margin-left: auto;
                }

                nav {
                    padding: 16px 10px;
                    /* 🔑 minder ruimte links & rechts */
                }



                nav {
                    padding: 16px 10px;
                    /* 🔑 minder ruimte links & rechts */
                }


                nav {
                    --nav-link-color: black;
                    /* <-- override variable on mobile */
                }

                .nav-links {
                    background: rgba(255, 255, 255, 0.95);
                    /* optional, to make dropdown readable */
                }

                .nav-links {
                    position: absolute;
                    left: 0;
                    transform: none;
                    /* 🔑 reset desktop centering */
                }

                .nav-links a {
                    color: black !important;
                    /* always black on mobile */
                }

                .hamburger span {
                    background: black !important;
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
    </style>
</head>

<body>
    <nav style="--nav-link-color: {{ $isHome ?? false ? 'white' : 'black' }}">


        @if (!isset($hideLogo) || !$hideLogo)
            <img src="logo_og.png" alt="Futuro Logo" class="logo">
        @endif

        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav-links">
            <a href="/" class="active">HOME</a>
            <a href="/rondvaart">RONDVAARTEN</a>
            <a href="/arrangements">ARRANGEMENTEN</a>
            <a href="/over-ons">OVER FUTURO</a>
            <a href="#">RESERVEREN</a>
            <a href="#">CONTACT</a>
        </div>
    </nav>

    <script>
        function toggleMenu() {
            document.querySelector('.nav-links').classList.toggle('show');
        }
    </script>
</body>

</html>
