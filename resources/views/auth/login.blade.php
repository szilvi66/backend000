<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Bejelentkezés</title>

  @vite([
    'resources/css/navbar.css',
    'resources/css/loggin.css',
    'resources/js/login.js'
  ])

 
</head>
<style>
    .form{
        margin-top:60px;
         * { box-sizing: border-box; }
    }
</style>
<body>

  <x-navbar />
<div class="form">
  <h2>Bejelentkezés</h2>

  <form id="loginForm">
    <label>Felhasználónév:</label>
    <input type="text" id="username" name="username" required>

    <label>Jelszó:</label>
    <input type="password" id="password" name="password" required>

    <div class="register-wrapper">
      <a class="reg-link" href="{{ route('register') }}">Új fiók létrehozása</a>
    </div>

    <button type="submit">Bejelentkezés</button>
  </form>
</div>
  <p id="msg"></p>
</body>

<style>
    
</style>
</html>