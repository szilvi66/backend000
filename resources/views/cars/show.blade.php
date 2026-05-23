<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>{{ $auto->marka }} - {{ $auto->modell }}</title>

    @vite([
        'resources/css/auto.css',
        'resources/css/style3.css',
        'resources/css/navbar.css',
    ])
</head>
<style>
    :root{
  --font-body: "Space Grotesk", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  --font-display: "Playfair Display", Georgia, serif;
}
.auto3 button{
  font-family: var(--font-body);
  font-weight: 700;
  letter-spacing: .2px;
}
/* ALAP */
body{
  font-family: var(--font-body);
}

/* FŐ CÍMEK / HEADLINE */
.ar1,
.jellemzok-cim,
.reviews-section h2{
  font-family: var(--font-display);
  font-weight: 700;
  letter-spacing: .3px;
}

/* ÁR */
.ar2 p{
  font-family: var(--font-body);
  font-weight: 700;
  letter-spacing: .2px;
}

/* táblázatok */
.jellemzok td{
  font-family: var(--font-body);
}

/* KÉRJ ÁRAJÁNLATOT gomb */
.offer-btn{
  font-family: var(--font-body);
  letter-spacing: .3px;
}

/* Vélemények – név legyen “luxus” */
.review-item strong{
  font-family: var(--font-display);
  font-weight: 700;
}

/* Vélemény szöveg */
.review-item p,
.reviews-form textarea{
  font-family: var(--font-body);
}

/* Küldés gomb */
.reviews-form button{
  font-family: var(--font-body);
  font-weight: 700;
  letter-spacing: .3px;
}
</style>
<body>

<x-navbar />

<div class="egesz">

    <div class="kepauto">

        <!-- Nagy kép -->
        <div class="auto1">
            @if(!empty($auto->kep))
                <img src="{{ asset($auto->kep) }}" alt="{{ $auto->marka }} {{ $auto->modell }}">
            @else
                <p>Nincs kép</p>
            @endif
        </div>

        <!-- Oldalsó blokk -->
        <div class="auto3">

            @if(!empty($auto->kep2))
                <img class="autocska" src="{{ asset($auto->kep2) }}" alt="{{ $auto->marka }} {{ $auto->modell }}">
            @endif

            <button type="button">06 20 281 35 95</button>

            <a href="{{ route('offer.create', $auto) }}" class="offer-btn">Kérj árajánlatot</a>

            <p>
                Raktáron:
                @if($auto->raktaron > 0)
                    {{ $auto->raktaron }} db
                @else
                    Nincs raktáron
                @endif
            </p>

        </div>
    </div>

    <!-- Ár -->
    <div class="ar">
        <h3 class="ar1">{{ $auto->marka }} {{ $auto->modell }}</h3>
        <div class="ar2">
            <p>{{ number_format($auto->ar, 0, ',', ' ') }} Ft</p>
        </div>
    </div>

    <!-- Fő adatok -->
    <div class="autoadatok">
        <div>
            <p>Évjárat</p>
            <p>{{ $auto->evjarat }}</p>
        </div>
        <div>
            <p>Hengerűrtartalom</p>
            <p>{{ $auto->hengerurtartalom }} ccm</p>
        </div>
        <div>
            <p>Teljesítmény</p>
            <p>{{ $auto->teljesitmeny }} LE</p>
        </div>
    </div>

    <!-- Jellemzők -->
    <h3 class="jellemzok-cim">Jellemzők</h3>

    <div class="jellemzok-container">

        <table class="jellemzok">
            <tr><td>Modell</td><td>{{ $auto->modell }}</td></tr>
            <tr><td>Évjárat</td><td>{{ $auto->evjarat }}</td></tr>
            <tr><td>Kilométeróra</td><td>{{ number_format($auto->kilometerora, 0, ',', ' ') }} km</td></tr>
            <tr><td>Ajtók száma</td><td>{{ $auto->ajtok_szama }}</td></tr>
            <tr><td>Üzemanyag</td><td>{{ $auto->uzemanyag }}</td></tr>
            <tr><td>Teljesítmény</td><td>{{ $auto->teljesitmeny }} LE</td></tr>
        </table>

        <table class="jellemzok">
            <tr><td>Márka</td><td>{{ $auto->marka }}</td></tr>
            <tr><td>Kivitel</td><td>{{ $auto->kivitel }}</td></tr>
            <tr><td>Állapot</td><td>{{ $auto->allapot }}</td></tr>
            <tr><td>Személyek száma</td><td>{{ $auto->szemelyek_szama }}</td></tr>
            <tr><td>Szín</td><td>{{ $auto->szin }}</td></tr>
            <tr><td>Sebességváltó</td><td>{{ $auto->sebessegvalto }}</td></tr>
            <tr><td>Hengerűrtartalom</td><td>{{ $auto->hengerurtartalom }} ccm</td></tr>
        </table>

    </div>

</div>

<style>
.offer-btn{
    display:block;
    width:95%;
    padding:12px;
    background:#d4af37;
    color:#000;
    font-weight:900;
    text-align:center;
    text-decoration:none;
    margin-top:10px;
}
.offer-btn:hover{ background:#e6c35c; }
</style>

<hr style="margin:60px 0;">

<section class="reviews-section">
    <h2>Vélemények</h2>

    <div class="reviews-grid">

        <!-- BAL OLDAL – LISTA -->
        <div class="reviews-list" id="reviews-list">
            <p>Betöltés...</p>
        </div>

        <!-- JOBB OLDAL – KOMMENT ÍRÁS -->
        <form class="reviews-form" id="commentForm">
            <textarea id="comment-content" placeholder="Írd le a véleményed..."></textarea>
            <button type="submit" id="sendBtn">Küldés</button>
            <p id="comment-message"></p>
        </form>

    </div>
</section>

<style>
.reviews-section{
    max-width: 1300px;
    margin: 80px auto;
    padding: 0 20px;
}
.reviews-grid{ display:flex; gap:30px; }
.reviews-list{
    flex:1;
    background:#111;
    padding:20px;
    border-radius:10px;
    max-height:400px;
    overflow-y:auto;
}
.review-item{ border-bottom:1px solid #333; padding:10px 0; }
.review-item strong{ color:#d4af37; }

.reviews-form{
    flex:1;
    display:flex;
    flex-direction:column;
    gap:10px;
}
.reviews-form textarea{
    height:120px;
    padding:10px;
    border-radius:8px;
    border:1px solid #333;
    background:#111;
    color:#fff;
    resize:none;
}
.reviews-form button{
    padding:10px;
    background:#d4af37;
    border:0;
    font-weight:700;
    cursor:pointer;
    border-radius:8px;

    
}
.reviews-form button:hover{ background:#e6c35c; }

#comment-message{ font-weight:700; margin:0; }
#comment-message.ok{ color:#66ff99; }
#comment-message.err{ color:#ff5c5c; }

@media(max-width: 900px){
    .reviews-grid{ flex-direction:column; }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const autoId = {{ $auto->id }};
  const apiBase = "/api";

  const listEl = document.getElementById("reviews-list");
  const contentEl = document.getElementById("comment-content");
  const msgEl = document.getElementById("comment-message");
  const formEl = document.getElementById("commentForm");
  const sendBtn = document.getElementById("sendBtn");

  function getToken(){
    return localStorage.getItem("jwt_token") || localStorage.getItem("token") || "";
  }

  function setMsg(text, ok=false){
    msgEl.textContent = text || "";
    msgEl.className = text ? (ok ? "ok" : "err") : "";
  }

  function escapeHtml(str){
    return String(str ?? "")
      .replaceAll("&","&amp;")
      .replaceAll("<","&lt;")
      .replaceAll(">","&gt;")
      .replaceAll('"',"&quot;")
      .replaceAll("'","&#039;");
  }

  async function safeJson(res){
    const ct = res.headers.get("content-type") || "";
    if(ct.includes("application/json")) return await res.json();
    return {};
  }

  async function loadComments(){
    listEl.innerHTML = "<p>Betöltés...</p>";

    try{
      const res = await fetch(`${apiBase}/autok/${autoId}/comments`, {
        headers: { "Accept": "application/json" }
      });

      const data = await safeJson(res);

      if(!res.ok){
        console.error("Komment API hiba:", res.status, data);
        listEl.innerHTML = "<p>Nem sikerült betölteni a véleményeket.</p>";
        return;
      }

      if(!Array.isArray(data) || data.length === 0){
        listEl.innerHTML = "<p>Még nincs vélemény.</p>";
        return;
      }

      listEl.innerHTML = data.map(c => {
        const u = c.user || {};
        const name =
          (u.first_name && u.last_name) ? `${u.first_name} ${u.last_name}` :
          (u.username || "Felhasználó");

        return `
          <div class="review-item">
            <strong>${escapeHtml(name)}</strong>
            <p>${escapeHtml(c.content)}</p>
          </div>
        `;
      }).join("");

    }catch(err){
      console.error(err);
      listEl.innerHTML = "<p>Nem sikerült betölteni a véleményeket.</p>";
    }
  }

  async function sendComment(){
    setMsg("");

    const token = getToken();
    const content = (contentEl.value || "").trim();

    if(!token){
      setMsg("Kommenteléshez be kell jelentkezned! 🔒");
      return;
    }

    if(content.length < 2){
      setMsg("Írj legalább 2 karaktert.");
      return;
    }

    sendBtn.disabled = true;

    try{
      const res = await fetch(`${apiBase}/autok/${autoId}/comments`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "Authorization": "Bearer " + token
        },
        body: JSON.stringify({ content })
      });

      const data = await safeJson(res);

      if(res.status === 401 || res.status === 403){
        localStorage.removeItem("jwt_token");
        localStorage.removeItem("token");
        setMsg("Lejárt / hibás token. Jelentkezz be újra! 🔒");
        return;
      }

      if(!res.ok){
        const errMsg =
          (data?.errors && Object.values(data.errors)?.[0]?.[0]) ||
          data?.message ||
          data?.error ||
          "Hiba a küldésnél.";
        setMsg(errMsg);
        return;
      }

      setMsg(data?.message || "Komment elküldve ✅", true);
      contentEl.value = "";
      await loadComments();

    }catch(err){
      console.error(err);
      setMsg("Hálózati hiba történt.");
    }finally{
      sendBtn.disabled = false;
    }
  }

  formEl.addEventListener("submit", (e) => {
    e.preventDefault();
    sendComment();
  });

  loadComments();
});
</script>

</body>
</html>