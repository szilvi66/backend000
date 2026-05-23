document.getElementById("loginForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const res = await fetch("/api/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify({
            username: document.getElementById("username").value,
            password: document.getElementById("password").value,
        })
    });

    const msg = document.getElementById("msg");
    msg.textContent = "";
    msg.className = "";

    const data = await res.json();

    if (data.token) {

        // 🔐 Token mentése
        localStorage.setItem("jwt_token", data.token);

        msg.textContent = "Sikeres bejelentkezés! Üdv, " + document.getElementById("username").value + "!";
        msg.className = "success";

        // 🚀 Átirányítás a főoldalra
        setTimeout(() => {
            window.location.href = "/main";
        }, 1000);

    } else {
        msg.textContent = data.error || "Hibás adatok!";
        msg.className = "error";
    }
});
