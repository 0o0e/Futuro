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

    nav {
      width: 100%;
      padding: 20px 0;
      display: flex;
      justify-content: center; /* center nav content */
      align-items: center;
      position: relative;
      z-index: 10;
    }
    .nav-links {
        margin-top: 30px;

        display: flex;
        gap: 30px;
        justify-content: center;
        align-items: center;
    }

    nav a {
      text-decoration: none;
      color: white;
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
      margin-right: auto;
      margin-right: -90px;

    }
    .nav-container {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 40px;
      margin-left: 200px;
    }

  </style>
</head>
<body>
  <nav>
      <div class="nav-links">


        <a href="#" class="active">HOME</a>
        <a href="#">RONDVAARTEN</a>
        <a href="#">ARRANGEMENTEN</a>
        <a href="#">OVER FUTURO</a>
        <a href="#">RESERVEREN</a>
        <a href="#">CONTACT</a>
      </div>

                  @if(!isset($hideLogo) || !$hideLogo)
           <img src="logo_og.png" alt="Futuro Logo" class="logo">
    @endif
    {{-- <img src="logo_og.png" alt="Futuro Logo" class="logo"> --}}

  </nav>
</body>
</html>
