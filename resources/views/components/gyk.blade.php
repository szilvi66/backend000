<section class="faq faq--lux" id="gyik">
  <div class="faq__inner">
    <div class="faq__head">
      <h2 class="faq__title">GYIK</h2>
      <p class="faq__subtitle">
    
      </p>
    </div>

    <div class="faq__list">
      <details class="faq__item">
        <summary>Hogyan működik az ajánlatkérés?</summary>
        <div class="faq__content">
          Válassza ki a kívánt modellt, kattintson az <strong>Ajánlatkérés</strong> gombra, majd töltse ki a szükséges adatokat.
          Kollégáink rövid időn belül felveszik Önnel a kapcsolatot.
        </div>
      </details>

      <details class="faq__item">
        <summary>Mennyi idő alatt érkezik válasz?</summary>
        <div class="faq__content">
          Általában <strong>1 munkanapon belül</strong> válaszolunk, kiemelt időszakban minimálisan eltérhet.
        </div>
      </details>

      <details class="faq__item">
        <summary>Jár-e vásárlási kötelezettséggel az ajánlatkérés?</summary>
        <div class="faq__content">
          Nem. Az ajánlatkérés nem jár kötelezettséggel – csak információt ad a döntéshez.
        </div>
      </details>

      <details class="faq__item">
        <summary>Van lehetőség tesztvezetésre?</summary>
        <div class="faq__content">
          Igen, előzetes egyeztetés alapján. Írj nekünk és foglalunk időpontot.
        </div>
      </details>

      <details class="faq__item">
        <summary>Milyen fizetési lehetőségek érhetők el?</summary>
        <div class="faq__content">
          Banki átutalás, lízing és egyedi finanszírozás is elérhető.
        </div>
      </details>

      <details class="faq__item">
        <summary>Tartalmazzák az árak az illetékeket és az átírás költségeit?</summary>
        <div class="faq__content">
          Modellenként eltérhet; az ajánlat minden esetben részletezi az ár összetevőit.
        </div>
      </details>

      <details class="faq__item">
        <summary>Megadhatók egyedi igények?</summary>
        <div class="faq__content">
          Igen – szín, felszereltség, évjárat, specifikus opciók alapján személyre szabjuk.
        </div>
      </details>

      <details class="faq__item">
        <summary>Hogyan kezeljük a személyes adatokat?</summary>
        <div class="faq__content">
          Kizárólag az ajánlatkéréshez és kapcsolattartáshoz használjuk, az előírásoknak megfelelően.
        </div>
      </details>
    </div>
  </div>
</section>

<style>
.faq{
  padding: 80px 0;
  display: flex;
  justify-content: center;
}

.faq__inner{
  width: 100%;
  max-width: 900px;
  padding: 0 24px;
  text-align: center;
}

.faq__subtitle{
  margin: 0 auto 28px;
  max-width: 620px;
}

.faq__list{
  text-align: left;
}

@media (max-width:700px){
  .faq{ padding: 60px 0; }
  .faq__inner{ padding: 0 16px; }
}

.faq__inner{
  width: 1200px;
  max-width: calc(100% - 40px);
  margin: 0 auto;
}

.faq__title{
  font-size: 38px;
  margin-bottom: 10px;
  color: #fff;
}

.faq__subtitle{
  color: rgba(255,255,255,.70);
  margin-bottom: 40px;
  line-height: 1.7;
}

.faq__list{
  display: flex;
  flex-direction: column;
  gap: 24px;
  max-width: 850px;
  margin: 0 auto;  
}


.faq__item{
  background: linear-gradient(145deg, #111, #161616);
  border: 1px solid rgba(212,175,55,.15);
  border-radius: 18px;
  padding: 0;
  overflow: hidden;
  box-shadow: 0 10px 35px rgba(0,0,0,.45);
}

.faq__item:hover{
  border-color: rgba(212,175,55,.35);
  box-shadow: 0 15px 45px rgba(212,175,55,.12);

}

.faq__item summary{
  list-style: none;
  cursor: pointer;
  padding: 22px 24px;
  font-weight: 600;
  color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.faq__item summary::-webkit-details-marker{
  display: none;
}

.faq__item summary::after{
  content: "＋";
  color: #d4af37;
  font-size: 20px;
  transition: transform .2s ease;
}

.faq__item[open] summary::after{
  content: "−";
}

.faq__content{
  padding: 0 24px 22px 24px;
  color: rgba(255,255,255,.75);
  line-height: 1.7;
  border-top: 1px solid rgba(255,255,255,.06);
}

.faq__content strong{
  color: #d4af37;
}

@media (max-width: 900px){
  .faq__list{
    grid-template-columns: 1fr;
  }
}
</style>