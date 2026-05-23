<!DOCTYPE html>
<html lang="en">
<head>    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>LuxCar - Kezdőoldal</title>
    <meta charset="UTF-8">
    @vite([
      'resources/css/main_page.css',
      'resources/css/navbar.css',
    ])
    

    <style>
      :root{
  --font-body: "Space Grotesk", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  --font-display: "Playfair Display", Georgia, "Times New Roman", serif;
}

/* alap */
body{
  font-family: var(--font-body);
  background-color:#000;
  color:#fff;
}

/* CÍMEK – luxus serif */
h1, h2, h3,
.hero-overlay h1,
.cim1,
.about-section h2,
.faq__title{
  font-family: var(--font-display);
  font-weight: 700;
  letter-spacing: .2px;
}

/* Szövegek maradnak modern sans */
.hero-overlay p,
.about-section p,
.faq__subtitle,
.faq__content,
.card-content p{
  font-family: var(--font-body);
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


      .webaruhaz_cim{ font-size:40px; margin-bottom:5px; }

      /* SLIDER */
      .slider{
        position:relative;
        width:100%;
        height:380px;
        overflow:hidden;
      }

      .slider img{
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;

        opacity: 0;
        transition: opacity .8s ease, transform 3.5s ease;
        transform: scale(1.03);

        will-change: opacity, transform;
        backface-visibility: hidden;
      }

      .slider img.active{
        opacity: 1;
        transform: scale(1.00);
      }

      /* HERO OVERLAY (hogy ne legyen üres) */
      .hero-overlay{
        position:absolute;
        inset:0;
        display:flex;
        flex-direction:column;
        justify-content:center;
        gap:14px;
        padding: 0 90px;
        background: linear-gradient(90deg, rgba(0,0,0,.70), rgba(0,0,0,.10));
        color:#fff;
      }

      .hero-overlay h1{
        margin:0;
        font-size:56px;
        letter-spacing:0.5px;
      }

      .hero-overlay p{
        margin:0;
        max-width:650px;
        color:#ddd;
        font-size:18px;
        line-height:1.5;
      }

      .hero-actions{
        display:flex;
        gap:12px;
        margin-top:8px;
        flex-wrap:wrap;
      }

      .hero-actions a{
        text-decoration:none;
        padding:12px 16px;
        border-radius:12px;
        font-weight:900;
        display:inline-flex;
        align-items:center;
        justify-content:center;
      }

      .hero-actions .cta{
        background:#d4af37;
        color:#000;
      }

      .hero-actions .ghost{
        border:1px solid #444;
        color:#fff;
        background: rgba(0,0,0,.25);
      }

      .hero-actions .ghost:hover{
        border-color:#777;
      }

      /* BRAND LOGO SOR (ha van már styled, ez nem zavar) */
      .markak{ margin-top:18px; }

      /* TRUST STRIP (3 kártya) */
      .trust{
        max-width:1200px;
        margin:24px auto 0;
        padding:0 24px;
        display:grid;
        grid-template-columns: repeat(3, 1fr);
        gap:16px;
      }

      .trust-card{
        background:#141414;
        border:1px solid #2b2b2b;
        border-radius:16px;
        padding:16px;
        min-height:90px;
      }

      .trust-card b{
        display:block;
        margin-bottom:8px;
        color:#fff;
      }

      .trust-card span{
        color:#bbb;
      }

      /* mobil */
      @media (max-width: 900px){
        .slider{ height:420px; }
        .hero-overlay{ padding: 0 24px; }
        .hero-overlay h1{ font-size:36px; }
        .trust{ grid-template-columns:1fr; }
      }


      .hero-overlay h1 {
  font-size: 54px;
  font-weight: 700;
  letter-spacing: -0.5px;
}

.hero-overlay p {
  font-size: 18px;
  line-height: 1.6;
  color: #ddd;
}
    </style>
</head>

<body>
  <x-navbar />

  <!-- HERO / SLIDER -->
  <div class="slider">
    <img src="{{ asset('images/porsche-4795517.jpg') }}" alt="porsche">
    <img src="{{ asset('images/13.jpg') }}" alt="car">
    <img src="{{ asset('images/11.jpg') }}" alt="car">
    <img src="{{ asset('images/14.jpg') }}" alt="car">
    <img src="{{ asset('images/16.jpg') }}" alt="car">
    <img src="{{ asset('images/17 (2).jpg') }}" alt="car">
    <img src="{{ asset('images/19.jpg') }}" alt="car">
    <img src="{{ asset('images/21.jpg') }}" alt="car">
    <img src="{{ asset('images/22.jpg') }}" alt="car">

    <!-- ✅ overlay, ettől nem üres -->
    <div class="hero-overlay">
      <h1>Luxusautók egy helyen</h1>
      <p>Válogass prémium modellek közül, nézd meg a részleteket, és kérj ajánlatot gyorsan, egyszerűen.</p>
      <div class="hero-actions">
        <a class="cta" href="{{ route('autok.index') }}">Autók megtekintése</a>
      </div>
    </div>
  </div>

  <!-- LOGÓK -->
  <br><br>

  <div class="markak">
    <div class="wallpaper">
      <img src="{{ asset('images/aston-martin-white-logo.webp') }}" alt="aston martin">
    </div>
    <div class="wallpaper">
      <img src="{{ asset('images/bentley-white-logo.webp') }}" alt="bentley">
    </div>
    <div class="wallpaper">
      <img src="{{ asset('images/bugatti-logo-new-1.webp') }}" alt="bugatti">
    </div>
    <div class="wallpaper">
      <img src="{{ asset('images/ferrari-logo.webp') }}" alt="ferrari">
    </div>
    <div class="wallpaper">
      <img src="{{ asset('images/Lamborghini_Shield-Logo_RGB_Gold-resized-home.webp') }}" alt="lamborghini">
    </div>
    <div class="wallpaper">
      <img src="{{ asset('images/maserati-white-logo.webp') }}" alt="maserati">
    </div>
    <div class="wallpaper">
      <img src="{{ asset('images/rimac-white-logo.webp') }}" alt="rimac">
    </div>


  </div>


  <!-- KIEMELT -->
  <h2 id="kiemelt" class="cim1">Kiemelt autók:</h2>

  <div class="carbox">
    @foreach($autok as $auto)
      <div class="carbox1">
        @if(!empty($auto->kep))
          <img src="{{ asset($auto->kep) }}" class="carsbox" alt="{{ $auto->marka }} {{ $auto->modell }}">
        @else
          <img src="{{ asset('images/no-image.png') }}" class="carsbox" alt="Nincs kép">
        @endif

        <div class="card-content">
          <p>{{ $auto->marka }} {{ $auto->modell }}</p>
          <p>{{ $auto->teljesitmeny }} LE • {{ $auto->uzemanyag }}</p>
          <p><b>{{ number_format($auto->ar, 0, ',', ' ') }} Ft</b></p>

          <a class="yellowbutton" href="{{ route('autok.show', $auto->id) }}">Érdekel</a>
        </div>
      </div>
    @endforeach
  </div>

  <!-- RÓLUNK -->
  <div class="about-section">
    <h2>Rólunk</h2>
    <p>
      Üdvözlünk a <span class="highlight">LuxCar</span>-nél, ahol a négy kerék nem csupán közlekedési eszköz,
      hanem életstílus. Webshopunkban a világ legismertebb és legexkluzívabb márkáinak luxusautóit találod –
      <span class="highlight">Ferrari</span>, <span class="highlight">Lamborghini</span>,
      <span class="highlight">Aston Martin</span>, <span class="highlight">Bugatti</span> és még sok más ikonikus név.
    </p>
    <p>
      Célunk, hogy ügyfeleink számára elérhetővé tegyük az autózás legfelsőbb szintjét: a teljesítményt,
      a kifinomultságot és a páratlan dizájnt.
    </p>
    <p>
      Legyen szó vadonatúj sportautóról vagy gondosan válogatott használt prémium modellről,
      kínálatunk minden darabja a minőség és a luxus garanciája.
    </p>

  </div>



<section class="faq" id="gyik">
  <div class="faq__inner">
    <h2 class="faq__title">GYIK</h2>
    <p class="faq__subtitle">
      Röviden: te kérsz ajánlatot, mi meg hozunk egy korrekt választ. Gyorsan. 
    </p>

    <div class="faq__list">

<details class="faq__item">
  <summary>Hogyan működik az ajánlatkérés?</summary>
  <div class="faq__content">
    Válassza ki a kívánt modellt, kattintson az <strong>Ajánlatkérés</strong> gombra, majd töltse ki a szükséges adatokat. 
    Kollégáink rövid időn belül felveszik Önnel a kapcsolatot a részletek egyeztetése érdekében.
  </div>
</details>

<details class="faq__item">
  <summary>Mennyi idő alatt érkezik válasz?</summary>
  <div class="faq__content">
    Az ajánlatkérésekre általában <strong>1 munkanapon belül</strong> válaszolunk. 
    Kiemelt időszakokban a válaszidő minimálisan eltérhet.
  </div>
</details>

<details class="faq__item">
  <summary>Jár-e vásárlási kötelezettséggel az ajánlatkérés?</summary>
  <div class="faq__content">
    Nem. Az ajánlatkérés nem jár vásárlási kötelezettséggel. 
    Célunk, hogy minden szükséges információt biztosítsunk a megalapozott döntéshez.
  </div>
</details>

<details class="faq__item">
  <summary>Van lehetőség tesztvezetésre?</summary>
  <div class="faq__content">
    Igen, előzetes időpont-egyeztetés alapján lehetőség van tesztvezetésre. 
    Kérjük, vegye fel velünk a kapcsolatot a részletek egyeztetéséhez.
  </div>
</details>

<details class="faq__item">
  <summary>Milyen fizetési lehetőségek érhetők el?</summary>
  <div class="faq__content">
    Elérhető banki átutalás, lízing és egyedi finanszírozási konstrukció is. 
    A pontos feltételek a kiválasztott modell és az egyedi megállapodás alapján kerülnek meghatározásra.
  </div>
</details>

<details class="faq__item">
  <summary>Tartalmazzák az árak az illetékeket és az átírás költségeit?</summary>
  <div class="faq__content">
    Az árak tartalma modellenként és konstrukciónként eltérhet. 
    Az ajánlat minden esetben részletesen tartalmazza az ár összetevőit.
  </div>
</details>

<details class="faq__item">
  <summary>Megadhatók egyedi igények?</summary>
  <div class="faq__content">
    Igen. Szín, felszereltség, évjárat vagy egyéb specifikus igény esetén kollégáink személyre szabott ajánlatot készítenek.
  </div>
</details>

<details class="faq__item">
  <summary>Hogyan kezeljük a személyes adatokat?</summary>
  <div class="faq__content">
    A megadott adatokat kizárólag az ajánlatkérés feldolgozásához és kapcsolattartáshoz használjuk fel, 
    az adatvédelmi előírásoknak megfelelően.
  </div>
</details>

    </div>
  </div>
</section>

<style>/* ===== GYIK ===== */
.faq{
  background: linear-gradient(180deg, #0b0b0b 0%, #141414 100%);
  padding: 80px 0 90px;
}

.faq__inner{
  width: 1200px;
  max-width: calc(100% - 40px);
  margin: 0 auto;
}

.faq__title{
  color: #fff;
  font-size: 34px;
  margin: 0 0 10px;
  letter-spacing: .6px;
}

.faq__subtitle{
  color: rgba(255,255,255,.72);
  margin: 0 0 26px;
  line-height: 1.6;
  max-width: 820px;
}

.faq__list{
  display: grid;
  gap: 14px;
  max-width: 980px;
}

.faq__item{
  border: 1px solid rgba(255,255,255,.08);
  background: rgba(255,255,255,.03);
  border-radius: 14px;
  overflow: hidden;
  backdrop-filter: blur(6px);
}

.faq__item summary{
  cursor: pointer;
  list-style: none;
  padding: 16px 18px;
  color: #fff;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 14px;
}

.faq__item summary::-webkit-details-marker{
  display: none;
}

.faq__item summary::after{
  content: "▾";
  color: #d4af37; /* arany */
  font-size: 18px;
  transform: translateY(-1px);
  transition: transform .2s ease;
}

.faq__item[open] summary::after{
  transform: rotate(180deg);
}

.faq__content{
  padding: 0 18px 16px;
  color: rgba(255,255,255,.78);
  line-height: 1.65;
}

.faq__content strong{
  color: #d4af37;
}

.faq__item:hover{
  border-color: rgba(212,175,55,.25);
  box-shadow: 0 10px 28px rgba(0,0,0,.35);
}

@media (max-width: 700px){
  .faq{ padding: 60px 0 70px; }
  .faq__title{ font-size: 28px; }
  .faq__item summary{ padding: 14px 14px; }
  .faq__content{ padding: 0 14px 14px; }
}</style>

  <script>
    const slides = document.querySelectorAll(".slider img");
    let current = 0;

    function showSlide(i) {
      slides.forEach(s => s.classList.remove("active"));
      slides[i].classList.add("active");
    }

    showSlide(0);

    setInterval(() => {
      current = (current + 1) % slides.length;
      showSlide(current);
    }, 5000);
  </script>


</body>
</html>