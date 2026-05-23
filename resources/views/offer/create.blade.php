<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajánlatkérés - {{ $auto->marka }} {{ $auto->modell }}</title>

  @vite(['resources/css/navbar.css'])
</head>
<body>
<x-navbar />

<div class="wrap">
  <h1>Ajánlatkérés</h1>
  <p class="sub">Autó: <strong>{{ $auto->marka }} {{ $auto->modell }}</strong> ({{ $auto->evjarat }})</p>

  @if(session('success'))
    <div class="status success">{{ session('success') }}</div>
  @endif

  @if($errors->any())
    <div class="status error">{{ $errors->first() }}</div>
  @endif

  <form class="card" method="POST" action="{{ route('offer.store', $auto->id) }}">
    @csrf

    <label>Név *</label>
    <input id="name" name="name" value="{{ old('name') }}" required>

    <label>Email *</label>
    <input id="email" name="email" type="email" value="{{ old('email') }}" required>

    <label>Telefon</label>
    <input id="phone" name="phone" value="{{ old('phone') }}" placeholder="+36 20 123 4567">

    <label>Üzenet</label>
    <textarea name="message" rows="5" placeholder="Írd le, mire szeretnél ajánlatot...">{{ old('message') }}</textarea>

    <button type="submit">Ajánlat kérése</button>
    <a class="back" href="javascript:history.back()">← Vissza</a>
  </form>
</div>

<style>
  *{ box-sizing:border-box; }
  body{ background:#0f0f0f; margin:0; padding-top:120px; font-family:Arial,sans-serif; color:#f5f5f5; }
  .wrap{ width:720px; max-width:calc(100% - 32px); margin:0 auto; }
  h1{ text-align:center; margin:0 0 10px; }
  .sub{ text-align:center; color:#bbb; margin:0 0 18px; }
  .status{ margin:10px 0 16px; padding:12px; border-radius:12px; background:#1a1a1a; border:1px solid #333; text-align:center; font-weight:800; }
  .status.success{ color:#66ff99; }
  .status.error{ color:#ff5c5c; }
  .card{ background:#1a1a1a; border:1px solid #333; padding:18px; border-radius:14px; }
  label{ display:block; margin:12px 0 6px; font-weight:800; }
  input, textarea{ width:100%; border-radius:12px; padding:12px; background:#2b2b2b; border:1px solid #444; color:#fff; outline:none; }
  button{ width:100%; margin-top:14px; height:46px; border:none; border-radius:12px; cursor:pointer; font-weight:900; background:#d4af37; color:#000; transition:.2s; }
  button:hover{ background:#e6c35c; }
  .back{ display:block; text-align:center; margin-top:12px; color:#bbb; text-decoration:none; }
  .back:hover{ color:#fff; }
</style>

<script>
document.addEventListener("DOMContentLoaded", async () => {

  const token = localStorage.getItem("jwt_token");
  if (!token) return; // ha nincs login, marad kézi kitöltés

  try {
    const res = await fetch("/api/user", {
      headers: {
        "Authorization": "Bearer " + token,
        "Accept": "application/json"
      }
    });

    if (!res.ok) return;

    const user = await res.json();

    const nameEl = document.getElementById("name");
    const emailEl = document.getElementById("email");
    const phoneEl = document.getElementById("phone");

    const fullName = ((user.first_name || "") + " " + (user.last_name || "")).trim();

    if (nameEl && !nameEl.value) nameEl.value = fullName || user.username || "";
    if (emailEl && !emailEl.value) emailEl.value = user.email || "";
    if (phoneEl && !phoneEl.value) phoneEl.value = user.phone || "";

  } catch (error) {
    console.error("Nem sikerült lekérni a user adatokat:", error);
  }

});
</script>

</body>
</html>
