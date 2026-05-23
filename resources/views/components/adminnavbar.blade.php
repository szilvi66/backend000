<header>
    <div class="logo">Lux<span>Car</span> Admin</div>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button class="logout-btn">Kijelentkezés</button>
    </form>
</header>

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

        /* NAVBAR – fekete háttér */
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

        /* FEHÉR kijelentkezés gomb */
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
            max-width: 450px;
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
</style>