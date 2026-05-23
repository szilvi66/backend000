<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxCar Admin</title>

    <style>
        :root {
            --black: #000;
            --white: #fff;
            --gold: #d4af37;
            --gray: #e6e6e6;
        }

        body {
            margin: 0;
            background: #f7f7f7;
            font-family: Arial, sans-serif;
            color: var(--black);
        }

        header {
            background: var(--black);
            color: var(--white);
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
        }

        .logo span {
            color: var(--gold);
        }

        .logout-btn {
            background: var(--white);
            border: 2px solid var(--white);
            padding: 8px 15px;
            border-radius: 6px;
            color: var(--black);
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: var(--black);
            color: var(--gold);
            border-color: var(--gold);
        }

        .content {
            padding: 40px;
            max-width: 500px;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 25px;
            border-left: 5px solid var(--gold);
            padding-left: 12px;
        }

        .stat {
            background: var(--white);
            border: 1px solid var(--gray);
            padding: 12px 15px;
            margin-bottom: 12px;
            border-radius: 8px;
        }

        .stat strong {
            color: var(--gold);
            font-size: 15px;
        }

        .buttons {
            margin-left: 40px;
            margin-top: 30px;
        }

        .btn {
            background: #000;
            color: #fff;
            padding: 12px 22px;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            font-size: 16px;
            transition: 0.3s;
            display: inline-block;
            margin-right: 15px;
        }

        .btn:hover {
            background: var(--gold);
            color: #000;
        }
    </style>
</head>

<body>

<header>
    <div class="logo">Lux<span>Car</span> Admin</div>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button class="logout-btn">Kijelentkezés</button>
    </form>
</header>

<div class="content">

    <h2>Adatok</h2>

    <div class="stat">
        <strong>Regisztrált felhasználók száma:</strong><br>
        {{ $usersCount }}
    </div>

    <div class="stat">
        <strong>Autók száma:</strong><br>
        {{ $carsCount }}
    </div>

    <div class="stat">
        <strong>Raktáron lévő autók:</strong><br>
        {{ $availableCars }}
    </div>

    <div class="stat">
        <strong>Adminok száma:</strong><br>
        {{ $adminsCount }}
    </div>

</div>

<div class="buttons">
    <a class="btn" href="{{ route('admin.carcreate') }}">
        Autó feltöltés
    </a>

    <a class="btn" href="{{ route('admin.cars') }}">
        Autók kezelése
    </a>
</div>

</body>
</html>