<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Regisztráció</title>

  @vite([
    'resources/css/navbar.css'
  ])

  <style>

.form{
    margin-top:60px;
    margin-bottom:60px;
    *{ box-sizing:border-box; }
    
}


body{
  font-family: Arial, sans-serif;
  background:#0f0f0f;
  margin:0;
  text-align:center;
  color:#f5f5f5;
}

/* ✅ csak ezen az oldalon finom override, nem borítja a layoutot */
body.register-page .navbar{
  height: 64px;
  padding: 0 40px;
}

body.register-page{
  padding-top: 64px;
}

    h2{ font-size:30px; color:#fff; margin: 0 0 18px; }

    form{
      width: 420px;
      max-width: calc(100% - 32px);
      margin: 0 auto;
      background:#1a1a1a;
      padding:28px;
      border-radius:14px;
      text-align:left;
      box-shadow: 0 10px 30px rgba(0,0,0,0.35);
    }

    .field{
      margin-bottom: 14px;
      display:flex;
      flex-direction:column;
      gap:6px;
          
    }

    label{
      font-weight:700;
      font-size:14px;
      color:#e0e0e0;
    }

    input{
      width:100%;
      height:44px;
      padding:10px 12px;
      border-radius:8px;
      font-size:15px;
      background:#2b2b2b;
      border:1px solid #444;
      color:#fff;
      transition:.2s;
      outline:none;
    }

    input:focus{
      border-color:#d4af37;
      background:#333;
      box-shadow: 0 0 0 3px rgba(212,175,55,.15);
    }

    button{
      width:100%;
      height:46px;
      margin-top: 6px;
      background:#d4af37;
      color:#000;
      border:none;
      border-radius:8px;
      cursor:pointer;
      font-size:16px;
      font-weight:800;
      transition:.2s;
    }

    button:hover{ background:#e6c35c; }

    #msg{
      width: 420px;
      max-width: calc(100% - 32px);
      margin: 14px auto 0;
      text-align:center;
      font-weight:700;
    }

    #msg.error{ color:#ff5c5c; }
    #msg.success{ color:#66ff99; }
  </style>
</head>

<body>
  <x-navbar />
<div class="form">
  <h2>Regisztráció</h2>

  <form id="registerForm" novalidate>
    <div class="field">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />
    </div>

    <div class="field">
      <label for="username">Felhasználónév</label>
      <input type="text" id="username" name="username" required />
    </div>

    <div class="field">
      <label for="last_name">Vezetéknév</label>
      <input type="text" id="last_name" name="last_name" required />
    </div>

    <div class="field">
      <label for="first_name">Keresztnév</label>
      <input type="text" id="first_name" name="first_name" required />
    </div>

    <div class="field">
      <label for="password">Jelszó</label>
      <input type="password" id="password" name="password" required />
    </div>

    <div class="field">
      <label for="phone">Telefonszám</label>
      <input type="tel" id="phone" name="phone" required />
    </div>

    <div class="field">
      <label for="birthdate">Születési dátum</label>
      <input type="date" id="birthdate" name="birthdate" required />
    </div>

    <div class="field">
      <label for="address">Lakóhely</label>
      <input type="text" id="address" name="address" required />
    </div>

    <button type="submit">Regisztráció</button>
  </form>
</div>
  <p id="msg"></p>

  <script>
    document.getElementById("registerForm").addEventListener("submit", async (e) => {
      e.preventDefault();

      const msg = document.getElementById("msg");
      msg.textContent = "";
      msg.className = "";

      const payload = {
        email: document.getElementById("email").value.trim(),
        username: document.getElementById("username").value.trim(),
        last_name: document.getElementById("last_name").value.trim(),
        first_name: document.getElementById("first_name").value.trim(),
        password: document.getElementById("password").value,
        phone: document.getElementById("phone").value.trim(),
        birthdate: document.getElementById("birthdate").value,
        address: document.getElementById("address").value.trim(),
      };

      try {
        const res = await fetch("/api/register", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
          },
          body: JSON.stringify(payload),
        });

        const contentType = res.headers.get("content-type") || "";
        let data = {};

        if (contentType.includes("application/json")) {
          data = await res.json();
        } else {
          const text = await res.text();
          console.log("Nem JSON válasz:", text);
          msg.textContent = "Szerver hiba történt.";
          msg.className = "error";
          return;
        }

        if (!res.ok) {
          if (data.errors) {
            const firstKey = Object.keys(data.errors)[0];
            msg.textContent = data.errors[firstKey][0];
          } else {
            msg.textContent = data.message || "Hiba történt a regisztrációnál!";
          }
          msg.className = "error";
          return;
        }

        msg.textContent = data.message || "Sikeres regisztráció! ✅";
        msg.className = "success";

        document.getElementById("registerForm").reset();

        setTimeout(() => {
          window.location.href = "/login";
        }, 1200);

      } catch (err) {
        console.error(err);
        msg.textContent = "Hálózati hiba történt.";
        msg.className = "error";
      }
    });
  </script>
</body>
</html>
