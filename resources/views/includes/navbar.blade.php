<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    nav {
        contain: paint;

        top: 0;
        left: 0;
        background-color: var(--primary);
        padding: 20px 0;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;

    }


    nav a {
        text-decoration: none;
        color: var(--white);
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
    </style>
</head>

<body>


    <nav>
      <img src="logo.png" alt="Futuro Logo" class="logo">
      <a href="#" class="active">HOME</a>
      <a href="#">RONDVAARTEN</a>
      <a href="#">ARRANGEMENTEN</a>
      <a href="#">OVER FUTURO</a>
      <a href="#">RESERVEREN</a>
      <a href="#">CONTACT</a>
    </nav>

</body>
</html>
