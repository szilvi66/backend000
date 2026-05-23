
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

    <div class="hero-overlay">
      <h1>Luxusautók egy helyen</h1>
      <p>Válogass prémium modellek közül, nézd meg a részleteket, és kérj ajánlatot gyorsan, egyszerűen.</p>
      <div class="hero-actions">
        <a class="cta" href="{{ route('autok.index') }}">Autók megtekintése</a>
      </div>
    </div>
  </div>

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
