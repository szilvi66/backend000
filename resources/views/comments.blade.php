<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vélemények</title>

@vite([
  'resources/css/navbar.css',
  'resources/css/style4.css'
])
</head>
<body>
  <x-navbar />

  <div class="wrap">
  <h1>Vélemények</h1>

  <div id="status" class="status"></div>

  <!-- 🔽 KOMMENT LISTA FELÜL -->
  <div id="commentsList" class="list"></div>

  <div class="divider"></div>

  <!-- 🔽 KOMMENT ÍRÁS ALUL -->
  <form id="commentForm" class="card">
    <label for="content">Írj egy kommentet</label>
    <textarea id="content" rows="4" placeholder="Pl. nagyon korrekt szolgáltatás..." required></textarea>
    <button id="sendBtn" type="submit">Küldés</button>
    <div id="msg" class="msg"></div>
  </form>
</div>


<script>
document.addEventListener("DOMContentLoaded", () => {
  const token = localStorage.getItem("jwt_token");

  const statusEl = document.getElementById("status");
  const listEl = document.getElementById("commentsList");
  const form = document.getElementById("commentForm");
  const sendBtn = document.getElementById("sendBtn");
  const msgEl = document.getElementById("msg");
  const contentEl = document.getElementById("content");

  // 1) Kommentek mindig betöltődnek
  loadComments();

  // 2) Komment írás csak tokennel
  if (!token) {
    statusEl.textContent = "Kommenteléshez jelentkezz be 👤";
    statusEl.className = "status error";
    sendBtn.disabled = true;
    contentEl.disabled = true;
  } else {
    statusEl.textContent = "Be vagy jelentkezve ✅";
    statusEl.className = "status success";
    sendBtn.disabled = false;
    contentEl.disabled = false;
  }

  // 3) Küldés
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    msgEl.textContent = "";
    msgEl.className = "msg";

    const content = contentEl.value.trim();
    if (!content) return;

    if (!token) {
      msgEl.textContent = "Előbb jelentkezz be 😏";
      msgEl.className = "msg error";
      return;
    }

    try {
      const res = await fetch("/api/comments", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "Authorization": "Bearer " + token
        },
        body: JSON.stringify({ content })
      });

      const data = await safeJson(res);

      if (!res.ok) {
        // 401/403 -> token rossz / lejárt
        if (res.status === 401 || res.status === 403) {
          localStorage.removeItem("jwt_token");
          statusEl.textContent = "A bejelentkezés lejárt. Jelentkezz be újra 👤";
          statusEl.className = "status error";
          sendBtn.disabled = true;
          contentEl.disabled = true;
        }

        msgEl.textContent =
          firstValidationError(data) ||
          data.error ||
          data.message ||
          "Hiba történt a komment mentésénél.";
        msgEl.className = "msg error";
        return;
      }

      msgEl.textContent = data.message || "Komment elküldve ✅";
      msgEl.className = "msg success";
      contentEl.value = "";
      await loadComments();

    } catch (err) {
      console.error(err);
      msgEl.textContent = "Hálózati hiba történt.";
      msgEl.className = "msg error";
    }
  });

  async function loadComments() {
    listEl.innerHTML = `<div class="hint">Betöltés...</div>`;
    try {
      const res = await fetch("/api/comments", {
        headers: { "Accept": "application/json" }
      });
      const comments = await safeJson(res);

      if (!Array.isArray(comments) || comments.length === 0) {
        listEl.innerHTML = `<div class="hint">Még nincs komment.</div>`;
        return;
      }

      listEl.innerHTML = comments.map(c => {
        const u = c.user || {};
        const name = (u.first_name && u.last_name)
          ? `${u.first_name} ${u.last_name}`
          : (u.username || "Ismeretlen");

        const when = c.created_at
          ? new Date(c.created_at).toLocaleString("hu-HU")
          : "";

        return `
          <div class="comment">
            <div class="meta">
              <strong>${escapeHtml(name)}</strong>
              <small>${escapeHtml(when)}</small>
            </div>
            <p>${escapeHtml(c.content)}</p>
          </div>
        `;
      }).join("");

    } catch (err) {
      console.error(err);
      listEl.innerHTML = `<div class="hint error">Nem sikerült betölteni a kommenteket.</div>`;
    }
  }

  function escapeHtml(str) {
    return String(str ?? "")
      .replaceAll("&","&amp;")
      .replaceAll("<","&lt;")
      .replaceAll(">","&gt;")
      .replaceAll('"',"&quot;")
      .replaceAll("'","&#039;");
  }

  async function safeJson(res) {
    const ct = res.headers.get("content-type") || "";
    if (ct.includes("application/json")) return await res.json();
    return {};
  }

  function firstValidationError(data) {
    if (!data || !data.errors) return "";
    const key = Object.keys(data.errors)[0];
    return key ? data.errors[key][0] : "";
  }
});
</script>

<style>
  * { box-sizing: border-box; }

  body{
    background:#0f0f0f;
    margin:0;
    padding-top:120px;
    font-family: Arial, sans-serif;
    color:#f5f5f5;
  }

  .wrap{
    width: 720px;
    max-width: calc(100% - 32px);
    margin: 0 auto;
  }

  h1{
    margin: 0 0 12px;
    font-size: 28px;
    color:#fff;
    text-align:center;
  }

  .status{
    margin: 10px 0 16px;
    padding: 10px 12px;
    border-radius: 10px;
    background:#1a1a1a;
    border:1px solid #333;
    text-align:center;
    font-weight: 700;
  }
  .status.success{ color:#66ff99; }
  .status.error{ color:#ff5c5c; }

.card{
  background:#1a1a1a;
  border:1px solid #333;
  padding:16px;
  border-radius:14px;
  margin-top:20px;   /* 👈 EZT ADD HOZZÁ */
}


  label{
    display:block;
    margin-bottom:8px;
    font-weight:700;
  }

  textarea{
    width:100%;
    border-radius: 12px;
    padding: 12px;
    background:#2b2b2b;
    border:1px solid #444;
    color:#fff;
    resize: vertical;
    min-height: 110px;
  }

  button{
    width:100%;
    margin-top:10px;
    height:46px;
    border:none;
    border-radius: 12px;
    cursor:pointer;
    font-weight:800;
    background:#d4af37;
    color:#000;
    transition:.2s;
  }
  button:hover{ background:#e6c35c; }
  button:disabled{
    opacity:.45;
    cursor:not-allowed;
  }

  .msg{
    margin-top: 10px;
    font-weight: 700;
    text-align:center;
  }
  .msg.success{ color:#66ff99; }
  .msg.error{ color:#ff5c5c; }

  .divider{
    margin: 18px 0;
    border-top: 1px solid #333;
  }

  .list{ display:flex; flex-direction: column; gap: 10px; }

  .comment{
    background:#1a1a1a;
    border:1px solid #333;
    padding: 14px;
    border-radius: 14px;
  }

  .meta{
    display:flex;
    justify-content: space-between;
    gap: 10px;
    color:#ddd;
  }

  .meta small{ color:#aaa; }

  .comment p{
    margin: 10px 0 0;
    color:#f5f5f5;
    line-height: 1.35;
  }

  .hint{
    background:#1a1a1a;
    border:1px solid #333;
    padding: 14px;
    border-radius: 14px;
    text-align:center;
    color:#aaa;
  }
  .hint.error{ color:#ff5c5c; }
</style>

</body>
</html>
