
<nav class="navbar">
  <div class="navbar-left">
    <div class="yel3">
      <h1>LuxCar</h1>
    </div>

    <a href="{{ route('main') }}" 
       class="nav-link {{ request()->routeIs('main') ? 'is-active' : '' }}">
       Kezdőoldal
    </a>

    <a href="{{ route('autok.index') }}" 
       class="nav-link {{ request()->routeIs('autok.*') ? 'is-active' : '' }}">
       Autók
    </a>

    <a href="{{ route('contact') }}" 
       class="nav-link {{ request()->routeIs('contact') ? 'is-active' : '' }}">
       Kapcsolat
    </a>
  </div>

  <div class="navbar-right">

    <!-- Vendég állapot -->
<div class="auth-buttons" id="guestAuth" style="display:none;">
      <a href="{{ route('login') }}" class="btn-auth btn-login">
        Bejelentkezés
      </a>
      <a href="{{ route('register') }}" class="btn-auth btn-register">
        Regisztráció
      </a>
    </div>

    <!-- Bejelentkezett állapot -->
    <div class="userbox" id="userBox" style="display:none;">
      <a href="/profile" class="profile-link" id="profileName"><b>Profil</b></a>
      <a href="#" class="logout-link" id="logoutBtn">Kijelentkezés</a>
    </div>

  </div>
</nav>
<script>
document.addEventListener("DOMContentLoaded", async () => {
  const token = localStorage.getItem("jwt_token");
  const guestAuth = document.getElementById("guestAuth");
  const userBox = document.getElementById("userBox");
  const profileName = document.getElementById("profileName");
  const logoutBtn = document.getElementById("logoutBtn");

  // ✅ első render: ne villanjon semmi
  guestAuth.style.display = "none";
  userBox.style.display = "none";

  // nincs token → vendég gombok azonnal
  if (!token) {
    guestAuth.style.display = "flex";
    return;
  }

  try {
    const res = await fetch("/api/user", {
      headers: {
        "Authorization": "Bearer " + token,
        "Accept": "application/json"
      }
    });

    if (!res.ok) {
      localStorage.removeItem("jwt_token");
      guestAuth.style.display = "flex";
      return;
    }

    const user = await res.json();

    guestAuth.style.display = "none";
    userBox.style.display = "flex";
    profileName.textContent = `${user.first_name} ${user.last_name}`;

    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      localStorage.removeItem("jwt_token");
      window.location.href = "/login";
    });

  } catch (err) {
    console.error("User fetch error:", err);
    guestAuth.style.display = "flex";
  }
});
</script>
<script>
document.addEventListener("DOMContentLoaded", async () => {
  const token = localStorage.getItem("jwt_token");
  const guestAuth = document.getElementById("guestAuth");
  const userBox = document.getElementById("userBox");
  const profileName = document.getElementById("profileName");
  const logoutBtn = document.getElementById("logoutBtn");

  if (!token) return;

  try {
    const res = await fetch("/api/user", {
      headers: {
        "Authorization": "Bearer " + token,
        "Accept": "application/json"
      }
    });

    if (!res.ok) {
      localStorage.removeItem("jwt_token");
      return;
    }

    const user = await res.json();

    guestAuth.style.display = "none";
    userBox.style.display = "flex";
    profileName.textContent = `${user.first_name} ${user.last_name}`;

    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      localStorage.removeItem("jwt_token");
      window.location.href = "/login";
    });

  } catch (err) {
    console.error("User fetch error:", err);
  }
});
</script>

<style>


/* ===== NAVBAR FONTS ===== */

.navbar{
  font-family: "Space Grotesk", system-ui, sans-serif;
}

.yel3 h1{
  font-family: "Playfair Display", serif;
  font-weight: 700;
  letter-spacing: .5px;
}
:root{
  --gold:#d4af37;
  --gold-light:#ffd230;
  --border:rgba(255,255,255,.15);
}

/* NAV + gombok legyenek modern, “precíz” */
.navbar,
.nav-link,
.btn-auth,
.yellowbutton,
.profile-link,
.logout-link{
  font-family: var(--font-body);
  letter-spacing: .2px;
}

/* NAVBAR */
.navbar{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 70px;
  padding: 0 40px;
  background: #000;
  border-bottom: 1px solid var(--border);
  z-index: 1000;

  display: flex;
  align-items: center;
  justify-content: flex-start;   /* ✅ ne space-between */
}

body{
  padding-top: 70px;
}

/* LEFT */
.navbar-left{
  display: flex;
  align-items: center;
  gap: 40px;
}

.yel3 h1{
  margin: 0;
  font-size: 24px;
  font-weight: 800;
  letter-spacing: .5px;
  color: #fff;
}

/* LINKS */
.nav-link{
  position: relative;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  text-decoration: none !important;
  padding: 8px 0;
  transition: color .2s ease;
  white-space: nowrap;
}

.nav-link:hover{
  color: var(--gold);
}

.nav-link::after{
  content:"";
  position:absolute;
  left:0;
  bottom:-6px;
  width:100%;
  height:2px;
  background: var(--gold);
  transform: scaleX(0);
  transition: transform .2s ease;
}
/* KIJELENTKEZÉS = rendes gomb */
.logout-link{
  display: inline-flex;
  align-items: center;
  justify-content: center;

  height: 44px;
  padding: 0 16px;
  border-radius: 12px;

  border: 1px solid rgba(255,255,255,.22);
  background: rgba(255,255,255,.03);

  font-size: 14px;
  font-weight: 700;
  letter-spacing: .2px;

  color: rgba(255,255,255,.88);
  text-decoration: none !important;

  transition: .2s ease;
}

.logout-link:hover{
  border-color: var(--gold);
  background: rgba(212,175,55,.08);
  color: #fff;

}
.nav-link:hover::after{
  transform: scaleX(1);
}

.nav-link.is-active{
  color: var(--gold-light);
}

.nav-link.is-active::after{
  transform: scaleX(1);
}

/* RIGHT */
.navbar-right{
  margin-left: auto;            /* ✅ EZ tolja teljesen jobbra */
  display: flex;
  align-items: center;
  gap: 14px;
}

/* AUTH BUTTONS */
.auth-buttons{
  display:flex;
  gap:12px;
}

/* Base */
.btn-auth{
  padding: 10px 18px;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 600;
  text-decoration: none !important;
  transition: .2s ease;
  white-space: nowrap;
}

/* Login */
.btn-login{
  border: 1px solid rgba(255,255,255,.3);
  color: #fff;
  background: transparent;
}

.btn-login:hover{
  border-color: var(--gold);
  color: var(--gold);
}

/* Register */
.btn-register{
  background: var(--gold);
  color: #000;
  border: 1px solid var(--gold);
}

.btn-register:hover{
  background: var(--gold-light);
  border-color: var(--gold-light);
}

/* USER */
.userbox{
  display:flex;
  align-items:center;
  gap:14px;
  padding-left:14px;
  border-left:1px solid rgba(255,255,255,.2);
}

.profile-link{
  color:#fff;
  font-weight:700;
  text-decoration:none !important;
  white-space: nowrap;
}

.logout-link{
  color:#ccc;
  font-size:16px;
  text-decoration:none !important;
  white-space: nowrap;
}

.logout-link:hover{
  color: var(--gold);
}

/* MOBILE */
@media (max-width:700px){
  .navbar{
    height: 64px;
    padding: 0 20px;
  }

  body{
    padding-top: 64px;
  }

  .auth-buttons{
    flex-direction: column;
    align-items: stretch;
  }

  .btn-auth{
    width: 100%;
    text-align: center;
  }
}



/* ===== USER (bejelentkezve) ===== */

.userbox{
  display:flex;
  align-items:center;
  gap:18px;
  padding-left:24px;
  border-left:none;                 /* ❌ kiszedjük a csíkot */
}

/* NÉV – prémium arany */
.profile-link{
  color: var(--gold);
  font-weight: 700;
  font-size: 15px;
  letter-spacing: .3px;
  text-decoration: none !important;
  transition: .2s ease;
}

.profile-link:hover{
  color: var(--gold-light);
}

/* KIJELETKEZÉS – diszkrét */
.logout-link{
  color: rgba(255,255,255,.65);
  font-size: 14px;
  font-weight: 500;
  text-decoration: none !important;
  transition: .2s ease;
}

.logout-link:hover{
  color: #fff;
}
</style>