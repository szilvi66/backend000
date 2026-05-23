<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxCar - Hirdetésfeladás</title>
</head>
    @vite([
    'resources/css/profile.css',
    'resources/css/navbar.css',
])
<body>
   <x-navbar />
<style>
    <style>
:root {
    --black: #0c0c0c;
    --dark: #1a1a1a;
    --dark2: #242424;
    --dark3: #2e2e2e;
    --white: #f5f5f5;
    --gold: #d4af37;
    --gray: #555;
}

/* ====== ALAP ====== */

* { box-sizing: border-box; }

body {
    font-family: Arial, sans-serif;
    background: var(--black);
    margin: 0;
    padding: 0;
    color: var(--white);
}

/* ====== CONTAINER ====== */

.container {
    width: min(1200px, calc(100% - 32px));
    background: var(--dark);
    margin: 90px auto 20px auto !important;
    padding: 30px 40px 40px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.6);
}

/* ====== CÍMEK ====== */

h2 {
    font-size: 26px;
    margin-top: 40px;
    margin-bottom: 15px;
    border-left: 5px solid var(--gold);
    padding-left: 12px;
    color: var(--white);
}

/* ====== LABEL ====== */

label {
    font-weight: bold;
    margin-top: 15px;
    display: block;
    color: var(--white);
}

/* ====== INPUTOK - ALAP ====== */

input, select, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    border-radius: 6px;
    font-size: 15px;
    border: 1px solid var(--gray);
    background: var(--dark3);
    color: var(--white);
}

textarea {
    height: 130px;
    resize: none;
}

/* ====== GOMBOK ====== */

.btn, .vissza {
    width: 100%;
    background: var(--gold);
    color: var(--black);
    padding: 15px;
    font-size: 17px;
    border: none;
    border-radius: 6px;
    margin-top: 30px;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover, .vissza:hover {
    background: var(--white);
    color: var(--black);
}

.vissza {
    width: fit-content;
    min-width: 90px;
    padding: 10px 14px;
    margin-bottom: 10px;
}

/* ====== TÁBLÁZATOS LAYOUT (DESKTOP) ====== */

.tables-wrapper {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    margin-top: 20px;
    flex-wrap: wrap; /* ✅ ha kevés a hely, törjön */
}

.form-table {
    width: 50%;
    table-layout: fixed;
}

.form-table td {
    padding: 10px 0;
    color: var(--white);
    vertical-align: top;
}

.form-table td:first-child {
    width: 160px;
    padding-right: 12px;
}

.form-table td:last-child {
    width: auto;
}

/* ✅ ne legyen fix 260px mobilon */
.form-table input,
.form-table select {
    width: 100% !important;
    max-width: 100%;
    background: var(--dark3);
    border: 1px solid var(--gray);
    color: var(--white);
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
}

/* Felső mezők */
.top-table input[type="text"],
.top-table input[type="file"] {
    width: 100%;
}

/* ====== TABLET ====== */
@media (max-width: 1024px) {
    .container { padding: 24px; }
    h2 { font-size: 24px; }
    .form-table { width: 100%; } /* ✅ két oszlop helyett egymás alá */
}

/* ====== MOBIL ====== */
@media (max-width: 640px) {
    .container { padding: 18px; }

    /* ✅ táblázat sorok mobilon szépen egymás alá */
    .form-table, .form-table tbody, .form-table tr, .form-table td {
        display: block;
        width: 100%;
    }

    .form-table td:first-child {
        width: 100%;
        padding-right: 0;
        padding-bottom: 6px;
    }

    .form-table td:last-child {
        padding-top: 0;
    }

    .btn {
        font-size: 16px;
        padding: 14px;
    }
}
</style>
</style>
<style>
:root {
    --black: #0c0c0c;
    --dark: #1a1a1a;
    --dark2: #242424;
    --dark3: #2e2e2e;
    --white: #f5f5f5;
    --gold: #d4af37;
    --gray: #555;
}

/* ====== ALAP ====== */

body {
    font-family: Arial, sans-serif;
    background: var(--black);
    margin: 0;
    padding: 0;
    color: var(--white);
}

/* NAVBAR */

header {
    background: var(--dark2);
    padding: 18px 40px;
    color: var(--white);
    font-size: 22px;
    font-weight: bold;
    border-bottom: 2px solid var(--gold);
}
header span {
    color: var(--gold);
}

/* ====== CONTAINER ====== */

.container {
    width: 1200px;
    background: var(--dark);
    margin: 90px auto 20px auto !important;  /* navbar miatt */
    padding: 30px 40px 40px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.6);
}

/* ====== CÍMEK ====== */

h2 {
    font-size: 26px;
    margin-top: 40px;
    margin-bottom: 15px;
    border-left: 5px solid var(--gold);
    padding-left: 12px;
    color: var(--white);
}

/* ====== LABEL ====== */

label {
    font-weight: bold;
    margin-top: 15px;
    display: block;
    color: var(--white);
}

/* ====== INPUTOK - ALAP ====== */

input, select, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    border-radius: 6px;
    font-size: 15px;
    border: 1px solid var(--gray);
    background: var(--dark3);
    color: var(--white);
}

textarea {
    height: 130px;
    resize: none;
}

/* ====== GOMBOK ====== */

.btn, .vissza {
    width: 100%;
    background: var(--gold);
    color: var(--black);
    padding: 15px;
    font-size: 17px;
    border: none;
    border-radius: 6px;
    margin-top: 30px;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover, .vissza:hover {
    background: var(--white);
    color: var(--black);
}

.vissza {
    width: 90px;
    padding: 10px 5px;
}

/* ====== TÁBLÁZATOK ====== */

.tables-wrapper {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    margin-top: 20px;
}

.form-table {
    width: 50%;
    table-layout: fixed;
}

.form-table td {
    padding: 10px 0;
    color: var(--white);
}

/* Beljebb húzott inputok */
.form-table td:first-child {
    width: 160px;
    padding-right: 12px;
}

.form-table td:last-child {
    width: auto;
}

/* Egységes méretű input + select */
.form-table input,
.form-table select {
    width: 260px !important;
    max-width: 260px;
    background: var(--dark3);
    border: 1px solid var(--gray);
    color: var(--white);
    box-sizing: border-box;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
}

/* Felső mezők */

.top-table input[type="text"],
.top-table input[type="file"] {
    width: 50%;
    background: var(--dark3);
    color: var(--white);
}
</style>


<div class="container">
<button class="vissza">Vissza</button>
    <h2>Új autó feltöltése</h2>

    <form method="POST" enctype="multipart/form-data" action="/admin/carcreate">
        @csrf

        <!-- Autó neve + képek + leírás -->
        <table class="form-table top-table">
            <tr>
                <td><label>Autó neve:</label></td>
                <td><input type="text" name="auto_nev" required></td>
            </tr>

            <tr>
                <td><label>Első kép:</label></td>
                <td><input type="file" name="image1" accept="image/*" required></td>
            </tr>

            <tr>
                <td><label>Második kép:</label></td>
                <td><input type="file" name="image2" accept="image/*" required></td>
            </tr>

            <tr>
                <td><label>Leírás:</label></td>
                <td><textarea name="leiras"></textarea></td>
            </tr>
        </table>

        <!-- Műszaki adatok -->
        <h2>Műszaki adatok</h2>

        <div class="tables-wrapper">

            <table class="form-table">

                <tr>
                    <td><label>Márka:</label></td>
                    <td>
                        <select name="marka">
                            <option value="">Válassz márkát</option>
                            <option>Audi</option> <option>BMW</option>
                            <option>Mercedes-Benz</option>
                            <option>Volkswagen</option>
                            <option>Toyota</option> <option>Honda</option>
                            <option>Ford</option> <option>Opel</option>
                            <option>Renault</option> <option>Peugeot</option>
                            <option>Nissan</option> <option>Kia</option>
                            <option>Hyundai</option>
                            <option>Ferrari</option> <option>Lamborghini</option>
                            <option>Porsche</option> <option>Maserati</option>
                            <option>Koenigsegg</option> <option>Bugatti</option>
                            <option>Rolls-Royce</option> <option>Bentley</option>
                            <option>Aston Martin</option> <option>McLaren</option>
                        </select>
                    </td>
                </tr>

                <tr><td><label>Modell:</label></td><td><input name="modell"></td></tr>
                <tr><td><label>Évjárat:</label></td><td><input type="number" name="evjarat"></td></tr>
                <tr><td><label>Kilométeróra:</label></td><td><input type="number" name="km"></td></tr>

                <tr>
                    <td><label>Ajtók száma:</label></td>
                    <td>
                        <select name="ajtok">
                            <option>2</option><option>3</option>
                            <option>4</option><option>5</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Üzemanyag:</label></td>
                    <td>
                        <select name="uzemanyag">
                            <option>Benzin</option><option>Dízel</option>
                            <option>Elektromos</option><option>Hibrid</option>
                            <option>LPG</option>
                        </select>
                    </td>
                </tr>

                <tr><td><label>Teljesítmény (LE):</label></td><td><input type="number" name="teljesitmeny"></td></tr>
            </table>

            <table class="form-table">

                <tr>
                    <td><label>Kivitel:</label></td>
                    <td>
                        <select name="kivitel">
                            <option>Coupe</option><option>Cabrio</option>
                            <option>Sedan</option><option>SUV</option>
                            <option>Hatchback</option><option>Pickup</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Állapot:</label></td>
                    <td>
                        <select name="allapot">
                            <option>Újszerű</option><option>Megkímélt</option>
                            <option>Normál</option><option>Sérült</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Szállítható személyek:</label></td>
                    <td>
                        <select name="szemelyek">
                            <option>2</option><option>4</option>
                            <option>5</option><option>7</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Szín:</label></td>
                    <td>
                        <select name="szin">
                            <option>Fekete</option><option>Fehér</option>
                            <option>Szürke</option><option>Piros</option>
                            <option>Kék</option><option>Zöld</option>
                            <option>Sárga</option><option>Ezüst</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Sebességváltó:</label></td>
                    <td>
                        <select name="sebessegvalto">
                            <option>Manuális</option><option>Automata</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label>Manuális:</label></td>
                    <td>
                        <select name="manualis">
                            <option>Igen</option><option>Nem</option>
                        </select>
                    </td>
                </tr>

                <tr><td><label>Hengerűrtartalom (cm³):</label></td><td><input type="number" name="hengerurtartalom"></td></tr>

            </table>

        </div>

        <button class="btn"type="submit">Autó feltöltése</button>

    </form>

</div>

</body>
</html>
