<footer class="footer">
  <div class="footer-inner">

    <div class="footer-col">
      <h3 class="footer-logo">LuxCar</h3>
      <p>
        Prémium és exkluzív luxusautók egy helyen.
        Teljesítmény. Elegancia. Presztízs.
      </p>
    </div>

    <div class="footer-col">
      <h4>Gyors linkek</h4>
      <a href="{{ route('home') }}">Kezdőoldal</a>
      <a href="{{ route('autok.index') }}">Autók</a>
      <a href="#gyik">GYIK</a>
      <a href="#">Kapcsolat</a>
    </div>

    <div class="footer-col">
      <h4>Kapcsolat</h4>
      <p>Email: info@luxcar.hu</p>
      <p>Telefon: +36 30 123 4567</p>
      <p>Budapest, Magyarország</p>
    </div>

    <div class="footer-col">
      <h4>Kövess minket</h4>
      <div class="socials">
        <a href="#">Instagram</a>
        <a href="#">Facebook</a>
        <a href="#">YouTube</a>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    © {{ date('Y') }} LuxCar. Minden jog fenntartva.
  </div>
</footer>

<style>
  /* ===== FOOTER ===== */

.footer{
  background: #0a0a0a;
  border-top: 1px solid rgba(212,175,55,.15);
  margin-top: 80px;
  padding-top: 60px;
}

.footer-inner{
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 40px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 40px;
}

.footer-col h3,
.footer-col h4{
  color: #fff;
  margin-bottom: 16px;
  font-family: var(--font-display);
}

.footer-col p,
.footer-col a{
  color: rgba(255,255,255,.65);
  font-size: 14px;
  line-height: 1.7;
  text-decoration: none;
  display: block;
  margin-bottom: 8px;
  transition: .2s ease;
}

.footer-col a:hover{
  color: #d4af37;
}

.footer-logo{
  font-size: 24px;
  letter-spacing: 1px;
}

.footer-bottom{
  border-top: 1px solid rgba(255,255,255,.06);
  margin-top: 50px;
  padding: 20px;
  text-align: center;
  font-size: 13px;
  color: rgba(255,255,255,.5);
}

/* mobil */
@media (max-width: 900px){
  .footer-inner{
    grid-template-columns: 1fr;
    gap: 30px;
  }
}
</style>