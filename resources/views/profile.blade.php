<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>LuxCar - Profil</title>

    @vite([
        'resources/css/profile.css',
        'resources/css/navbar.css',
    ])
</head>
<style>
    <style>
:root{
  --bg:#0b0b0b;
  --panel:#121212;
  --panel2:#171717;
  --text:#f5f5f5;
  --muted:rgba(255,255,255,.72);
  --border:rgba(255,255,255,.12);
  --gold:#d4af37;
  --gold2:#ffd230;
}

body{
  background: radial-gradient(1200px 600px at 20% 0%, rgba(212,175,55,.10), transparent 55%),
              radial-gradient(900px 500px at 80% 10%, rgba(255,210,48,.06), transparent 55%),
              var(--bg);
  margin:0;
  padding-top: 90px;
  font-family: "Space Grotesk", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
  color: var(--text);
}

/* konténer */
.profile-container{
  max-width: 760px;
  margin: 0 auto;
  padding: 18px 18px 40px;
}

/* fejléc */
#username{
  text-align:center;
  font-family: "Playfair Display", serif;
  font-weight: 800;
  letter-spacing: .3px;
  font-size: 34px;
  margin: 10px 0 18px;
}

.profile-image-section{
  text-align:center;
  margin: 14px 0 18px;
  padding: 18px;
  border: 1px solid var(--border);
  border-radius: 16px;
  background: linear-gradient(180deg, rgba(255,255,255,.04), rgba(255,255,255,.02));
  box-shadow: 0 18px 50px rgba(0,0,0,.55);
}

/* profilkép */
.profile-image-section img{
  width: 132px;
  height: 132px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid rgba(212,175,55,.85);
  box-shadow: 0 10px 35px rgba(0,0,0,.55);
  margin-bottom: 12px;
}

/* input + gombok luxusra */
.profile-image-section input{
  display:block;
  margin: 0 auto 12px;
  color: var(--muted);
  max-width: 320px;
}

.profile-image-section button{
  background: linear-gradient(180deg, var(--gold2), var(--gold));
  border: 1px solid rgba(0,0,0,.35);
  padding: 10px 18px;
  border-radius: 12px;
  cursor: pointer;
  font-weight: 800;
  color:#000;
  transition: transform .15s ease, filter .2s ease;
}

.profile-image-section button:hover{
  transform: translateY(-1px);
  filter: brightness(1.03);
}

.upload-msg{
  margin-top: 10px;
  font-size: 14px;
  color: var(--muted);
}

/* adatkártya */
.profile-card{
  margin-top: 14px;
  background: linear-gradient(180deg, rgba(255,255,255,.03), rgba(255,255,255,.02));
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 22px;
  box-shadow: 0 22px 60px rgba(0,0,0,.60);
}

.profile-card p{
  margin: 12px 0;
  font-size: 15px;
  color: rgba(255,255,255,.86);
  display:flex;
  align-items: baseline;
  justify-content: space-between;
  gap: 16px;
  border-bottom: 1px dashed rgba(255,255,255,.10);
  padding-bottom: 10px;
}

.profile-card p:last-child{
  border-bottom: 0;
  padding-bottom: 0;
}

.profile-card strong{
  color: rgba(255,255,255,.90);
  font-weight: 700;
  min-width: 180px;
}

.profile-card span{
  color: rgba(255,255,255,.78);
  text-align: right;
}

/* mobil */
@media (max-width: 640px){
  body{ padding-top: 80px; }

  #username{ font-size: 30px; }

  .profile-card p{
    flex-direction: column;
    align-items: flex-start;
  }

  .profile-card span{
    text-align:left;
  }

  .profile-image-section{
    padding: 16px;
  }
}
</style>
</style>
<body>
<x-navbar />

<div class="profile-container">
    <h2 id="username">Profil</h2>

    <!-- PROFILKÉP RÉSZ -->
    <div class="profile-image-section">
        <img id="profile_image" src="/default-avatar.png" alt="Profilkép">
        <input type="file" id="imageInput" accept="image/*">
        <button id="uploadBtn" type="button">Feltöltés</button>
        <div id="uploadMsg" class="upload-msg"></div>
    </div>

    <div class="profile-card">
        <p><strong>Teljes név:</strong> <span id="full_name"></span></p>
        <p><strong>Email cím:</strong> <span id="email"></span></p>
        <p><strong>Telefonszám:</strong> <span id="phone"></span></p>
        <p><strong>Születési dátum:</strong> <span id="birthdate"></span></p>
        <p><strong>Lakóhely:</strong> <span id="address"></span></p>
        <p><strong>Regisztráció dátuma:</strong> <span id="created_at"></span></p>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", async () => {

    const token = localStorage.getItem("jwt_token");

    if (!token) {
        window.location.href = "/login";
        return;
    }

    const uploadBtn = document.getElementById("uploadBtn");
    const imageInput = document.getElementById("imageInput");
    const uploadMsg = document.getElementById("uploadMsg");
    const profileImg = document.getElementById("profile_image");

    try {
        const res = await fetch("/api/user", {
            headers: {
                "Authorization": "Bearer " + token,
                "Accept": "application/json"
            }
        });

        if (!res.ok) {
            localStorage.removeItem("jwt_token");
            window.location.href = "/login";
            return;
        }

        const user = await res.json();

        document.getElementById("username").textContent = user.username;
        document.getElementById("full_name").textContent = user.first_name + " " + user.last_name;
        document.getElementById("email").textContent = user.email;
        document.getElementById("phone").textContent = user.phone;
        document.getElementById("birthdate").textContent = user.birthdate;
        document.getElementById("address").textContent = user.address;
        document.getElementById("created_at").textContent =
            new Date(user.created_at).toLocaleDateString("hu-HU");

        if (user.profile_image) {
            profileImg.src = "/storage/" + user.profile_image;
        }

    } catch (error) {
        console.error(error);
        window.location.href = "/login";
        return;
    }

    uploadBtn.addEventListener("click", async () => {

        const file = imageInput.files[0];

        if (!file) {
            uploadMsg.textContent = "Válassz ki egy képet!";
            return;
        }

        uploadMsg.textContent = "Feltöltés...";

        const formData = new FormData();
        formData.append("image", file);

        try {
            const res = await fetch("/api/upload-profile-image", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer " + token
                },
                body: formData
            });

            const data = await res.json();

            if (!res.ok) {
                uploadMsg.textContent = data.message ?? "Hiba történt";
                return;
            }

            profileImg.src = "/storage/" + data.path;
            uploadMsg.textContent = "✅ Profilkép frissítve!";
        } catch (err) {
            console.error(err);
            uploadMsg.textContent = "Hálózati hiba!";
        }
    });

});
</script>

<style>
body {
    background: #0f0f0f;
    margin: 0;
    padding-top: 120px;
    font-family: Arial, sans-serif;
    color: #f5f5f5;
}

.profile-container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
}

.profile-image-section {
    text-align: center;
    margin: 10px 0 20px;
}

.profile-image-section img {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #d4af37;
    margin-bottom: 10px;
}

.profile-image-section input {
    display: block;
    margin: 0 auto 10px;
    color: #f5f5f5;
}

.profile-image-section button {
    background: #d4af37;
    border: none;
    padding: 10px 18px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;
}

.upload-msg {
    margin-top: 10px;
    font-size: 14px;
}

.profile-card {
    background: #1a1a1a;
    padding: 25px;
    border-radius: 12px;
    margin-top: 20px;
}

.profile-card p {
    margin: 12px 0;
    font-size: 15px;
}

h2 {
    text-align: center;
}
</style>

</body>
</html>
