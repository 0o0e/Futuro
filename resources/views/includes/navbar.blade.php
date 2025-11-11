<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <style>
    nav {
      contain: paint;
      position: relative;
      top: 0;
      left: 0;
      width: 100%;
      padding: 20px 80px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      z-index: 10;
    }

    .nav-links {
      display: flex;
      gap: 30px;
      justify-content: center;
      align-items: center;
      flex: 1;
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
      width: 300px;
      height: auto;
      object-fit: contain;
      margin-right: 45px;
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
    <div class="nav-container">
      <div class="nav-links">
        <a href="#" class="active">HOME</a>
        <a href="#">RONDVAARTEN</a>
        <a href="#">ARRANGEMENTEN</a>
        <a href="#">OVER FUTURO</a>
        <a href="#">RESERVEREN</a>
        <a href="#">CONTACT</a>
      </div>

    </div>
    <img src="logo_og.png" alt="Futuro Logo" class="logo">
  </nav>
</body>
</html>
