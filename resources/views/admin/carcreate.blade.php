<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxCar Admin – Autó feltöltése</title>

<style>
:root {
    --black: #000;
    --white: #fff;
    --gold: #d4af37;
    --gray: #ccc;
}

body {
    font-family: Arial, sans-serif;
    background: #f0f0f0;
    margin: 0;
}

.container {
    width: 1200px;
    background: #fff;
    margin: 40px auto;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    font-size: 26px;
    margin-bottom: 20px;
    border-left: 5px solid var(--gold);
    padding-left: 12px;
}

label {
    font-weight: bold;
}

input, select {
    width: 260px;
    padding: 10px;
    border: 1px solid var(--gray);
    border-radius: 6px;
    margin-top: 6px;
}

.form-table {
    width: 100%;
}

.form-table td {
    padding: 10px 0;
}

.tables-wrapper {
    display: flex;
    justify-content: space-between;
    gap: 40px;
}

.btn {
    width: 100%;
    background: #000;
    color: #fff;
    padding: 15px;
    font-size: 17px;
    border: none;
    border-radius: 6px;
    margin-top: 30px;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background: var(--gold);
    color: #000;
}
</style>
</head>

<body>

<x-adminnavbar />

<div class="container">

<h2>Új autó feltöltése</h2>

@if(session('success'))
    <p style="color:green;font-weight:bold;">{{ session('success') }}</p>
@endif

@if($errors->any())
    <p style="color:red;font-weight:bold;">{{ $errors->first() }}</p>
@endif

<form method="POST" enctype="multipart/form-data" action="{{ route('admin.carcreate.store') }}">
@csrf

<!-- KÉPEK -->
<table class="form-table">
<tr>
    <td><label>Első kép:</label></td>
    <td><input type="file" name="image1" accept="image/*" required></td>
</tr>

<tr>
    <td><label>Második kép:</label></td>
    <td><input type="file" name="image2" accept="image/*" required></td>
</tr>
</table>

<h2>Műszaki adatok</h2>

<div class="tables-wrapper">

<table class="form-table">
<tr>
    <td><label>Márka:</label></td>
    <td>
        <select name="marka" required>
            <option value="">Válassz</option>
            <option>Alfa Romeo</option>
            <option>Aston Martin</option>
            <option>Audi</option>
            <option>Bentley</option>
            <option>BMW</option>
            <option>Bugatti</option>
            <option>Cadillac</option>
            <option>Ferrari</option>
            <option>Genesis</option>
            <option>Infiniti</option>
            <option>Jaguar</option>
            <option>Koenigsegg</option>
            <option>Lamborghini</option>
            <option>Land Rover</option>
            <option>Lexus</option>
            <option>Lotus</option>
            <option>Maserati</option>
            <option>Maybach</option>
            <option>McLaren</option>
            <option>Mercedes-Benz</option>
            <option>Pagani</option>
            <option>Porsche</option>
            <option>Range Rover</option>
            <option>Rimac</option>
            <option>Rolls-Royce</option>

        </select>
    </td>
</tr>

<tr>
    <td><label>Modell:</label></td>
    <td><input name="modell" required></td>
</tr>

<tr>
    <td><label>Évjárat:</label></td>
    <td><input type="number" name="evjarat" required></td>
</tr>

<tr>
    <td><label>Kilométeróra:</label></td>
    <td><input type="number" name="kilometerora" value="0" required></td>
</tr>

<tr>
    <td><label>Ajtók száma:</label></td>
    <td>
        <select name="ajtok_szama" required>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </td>
</tr>

<tr>
    <td><label>Üzemanyag:</label></td>
    <td>
        <select name="uzemanyag" required>
            <option>Benzin</option>
            <option>Dízel</option>
            <option>Elektromos</option>
            <option>Hibrid</option>
        </select>
    </td>
</tr>

<tr>
    <td><label>Teljesítmény (LE):</label></td>
    <td><input type="number" name="teljesitmeny" value="0" required></td>
</tr>

<tr>
    <td><label>Ár (Ft):</label></td>
    <td><input type="number" name="ar" required></td>
</tr>
</table>

<table class="form-table">

<tr>
    <td><label>Kivitel:</label></td>
    <td>
        <select name="kivitel" required>
            <option>Kupé</option>
            <option>Szabadidő-autó </option>
            <option>Limuzin</option>
            <option>Terepjáró </option>
            <option>Kabrió</option>                       
        </select>
    </td>
</tr>

<tr>
    <td><label>Állapot:</label></td>
    <td>
        <select name="allapot" required>
            <option>Új</option>
            <option>Újszerű</option>
            <option>Megkímélt</option>
            <option>Normál</option>

        </select>
    </td>
</tr>

<tr>
    <td><label>Személyek száma:</label></td>
    <td>
        <select name="szemelyek_szama" required>
            <option value="2">2</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </td>
</tr>

<tr>
    <td><label>Szín:</label></td>
    <td>
        <select name="szin" required>
<optgroup label="Klasszikus elegáns">
    <option>Fehér</option>
    <option>Gyöngyház fehér</option>
    <option>Fekete</option>
    <option>Matt fekete</option>
</optgroup>

<optgroup label="Fémes / Metál">
    <option>Ezüst</option>
    <option>Szürke</option>
    <option>Grafitszürke</option>
    <option>Arany</option>
    <option>Bronz</option>
</optgroup>

<optgroup label="Prémium mély árnyalatok">
    <option>Kék</option>
    <option>Zöld</option>
    <option>Bordó</option>
    <option>Barna</option>
    <option>Bézs</option>
</optgroup>

<optgroup label="Sportos karakter">
    <option>Piros</option>
    <option>Sárga</option>
    <option>Narancssárga</option>
    <option>Lila</option>
</optgroup>

<optgroup label="Exkluzív különlegesség">
    <option>Türkiz</option>
    <option>Tükörkróm</option>
</optgroup>

        </select>
    </td>
</tr>

<tr>
    <td><label>Sebességváltó:</label></td>
    <td>
        <select name="sebessegvalto" required>
            <option>Manuális</option>
            <option>Automata</option>
        </select>
    </td>
</tr>

<tr>
    <td><label>Hengerűrtartalom (cm³):</label></td>
    <td><input type="number" name="hengerurtartalom" value="0" required></td>
</tr>

<tr>
    <td><label>Raktáron (db):</label></td>
    <td><input type="number" name="raktaron" value="1" required></td>
</tr>

<tr>
    <td><label>Kiemelt:</label></td>
    <td>
        <select name="kiemelt">
            <option value="0">Nem</option>
            <option value="1">Igen</option>
        </select>
    </td>
</tr>

</table>
</div>

<button class="btn" type="submit">Autó feltöltése</button>

</form>
</div>

</body>
</html>