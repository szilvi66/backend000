<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Kapcsolat - LuxCar</title>


  @vite([
    'resources/css/navbar.css',
    'resources/css/style4.css',
    'resources/css/contact.css'
  ])
</head>
<body>

<x-navbar />

<section class="contact-hero">
  <div class="contact-inner">
    <h1>Kapcsolat</h1>
    <p>Elérhetőségeink az alábbiakban találhatók.</p>

    <div class="contact-grid">

      <div class="info-box">
        <h3>Email</h3>
        <p>luxcar0000@gmail.com</p>
      </div>

      <div class="info-box">
        <h3>Telefon</h3>
        <p>+36 20 281 25 95</p>
      </div>

      <div class="info-box">
        <h3>Cím</h3>
        <p>Pécs, efwfwe utca 1.</p>
      </div>

      <div class="info-box">
        <h3>Nyitvatartás</h3>
        <p>H–P: 09:00–17:00</p>
        <p>Szo: 10:00–14:00</p>
        <p>V: Zárva</p>
      </div>

    </div>
  </div>
</section>

<section class="map-section">
  <div class="contact-inner">
    <h2>Bemutatótermünk</h2>

    <div class="map-wrapper">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2769.7480434325475!2d18.214716075792985!3d46.03617569509494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4742b3b64547f9ff%3A0x81835de2edb802f1!2sBaranya%20V%C3%A1rmegyei%20SZC%20Simonyi%20K%C3%A1roly%20Technikum%20%C3%A9s%20Szakk%C3%A9pz%C5%91%20Iskola!5e0!3m2!1shu!2shu!4v1772046983852!5m2!1shu!2shu"
        allowfullscreen=""
        loading="lazy">
      </iframe>
    </div>
  </div>
</section>
<style>
    body {
  margin: 0;
  font-family: Arial, sans-serif;
  background: #000;
  color: #fff;
}

.contact-hero {
  padding-top: 40px;
  padding-bottom: 80px;
  background: linear-gradient(180deg, #000 0%, #111 100%);
}

.contact-inner {
  max-width: 1100px;
  margin: 0 auto;
  padding: 0 40px;
}

.contact-inner h1 {
  font-size: 32px;
  margin-bottom: 10px;
}

.contact-inner p {
  color: #ccc;
  margin-bottom: 50px;
}

.contact-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 30px;
}

.info-box {
  background: #111;
  padding: 25px;
  border: 1px solid #222;
  border-radius: 12px;

}

.info-box:hover {
  border-color: rgba(212,175,55,0.6);
}

.info-box h3 {
  color: #d4af37;
  margin-bottom: 10px;
}

.map-section {
  padding-bottom: 100px;
}

.map-section h2 {
  font-size: 30px;
  margin: 0 0 30px;
  border-left: 5px solid #d4af37;
  padding-left: 15px;
}

.map-wrapper {
  width: 100%;
  height: 380px;
  border-radius: 14px;
  overflow: hidden;
  border: 1px solid #222;
  box-shadow: 0 25px 60px rgba(0,0,0,0.6);
}

.map-wrapper iframe {
  width: 100%;
  height: 100%;
  border: 0;
 
}

@media (max-width: 900px) {
  .contact-grid {
    grid-template-columns: 1fr;
  }
}

body{
  margin:0;
  font-family:"Space Grotesk", sans-serif;
  background:#000;
  color:#fff;
}

/* ===== HERO ===== */
.contact-hero{
  padding: 80px 0 60px;
  background: linear-gradient(180deg,#000 0%,#111 100%);
}

.contact-inner{
  max-width:1100px;
  margin:0 auto;
  padding:0 40px;
}

/* CÍM – luxus serif */
.contact-inner h1{
  font-family:"Playfair Display", serif;
  font-size:40px;
  margin-bottom:12px;
}

.contact-inner p{
  color:#bbb;
  margin-bottom:40px;
  font-size:16px;
}

/* ===== GRID ===== */
.contact-grid{
  display:grid;
  grid-template-columns: repeat(2, minmax(240px, 1fr));
  gap:20px;
  max-width:700px; /* 🔥 kisebb blokk összszélesség */
}

/* ===== INFO BOX ===== */
.info-box{
  background:#111;
  padding:18px 20px;      /* 🔥 kisebb padding */
  border:1px solid #1c1c1c;
  border-radius:12px;

}

.info-box:hover{
  border-color: rgba(212,175,55,.6);

}

/* Box cím */
.info-box h3{
  font-family:"Playfair Display", serif;
  font-size:18px;
  color:#d4af37;
  margin-bottom:8px;
}

/* Box szöveg */
.info-box p{
  font-size:14px;
  color:#ccc;
  margin:4px 0;
}

/* ===== MAP ===== */
.map-section{
  padding: 40px 0 100px;
}

.map-section h2{
  font-family:"Playfair Display", serif;
  font-size:32px;
  margin-bottom:30px;
  border-left:5px solid #d4af37;
  padding-left:15px;
}

.map-wrapper{
  width:100%;
  max-width:900px; /* 🔥 ne legyen full width */
  height:320px;    /* 🔥 kisebb */
  border-radius:14px;
  overflow:hidden;
  border:1px solid #1c1c1c;
  box-shadow:0 20px 50px rgba(0,0,0,.6);
}

.map-wrapper iframe{
  width:100%;
  height:100%;
  border:0;
}

/* ===== MOBILE ===== */
@media(max-width:900px){
  .contact-grid{
    grid-template-columns:1fr;
    max-width:100%;
  }

  .map-wrapper{
    height:260px;
  }
}
</style>
</body>
</html>