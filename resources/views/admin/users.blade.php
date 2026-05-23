<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>LuxCar Admin – Felhasználók</title>
</head>
<body>

<header>
    <div class="logo">Lux<span>Car</span> Admin</div>
    <a href="{{ route('admin.dashboard') }}" class="back-btn">Vissza</a>
</header>

<div class="content">
    <h2>Felhasználók</h2>

    @if(session('success'))
        <div style="margin-bottom:15px;background:#e9ffe9;padding:10px;border-radius:8px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Felhasználónév</th>
            <th>Email</th>
            <th>Név</th>
            <th>Telefon</th>
            <th>Születési dátum</th>
            <th>Cím</th>
            <th>Regisztrált</th>
            <th>Művelet</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username ?? '-' }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? '')) ?: '-' }}</td>
                <td>{{ $user->phone ?? '-' }}</td>
                <td>{{ $user->birthdate ?? '-' }}</td>
                <td>{{ $user->address ?? '-' }}</td>
                <td>{{ optional($user->created_at)->format('Y-m-d') }}</td>
                <td>
                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                        method="POST"
                        onsubmit="return confirm('Biztosan törlöd ezt a felhasználót?');">
                        @csrf
                        @method('DELETE')
                        <button class="danger-btn">Törlés</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Nincs felhasználó.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div style="margin-top:20px;text-align:center;">
        @for ($i = 1; $i <= $users->lastPage(); $i++)
            <a href="{{ $users->url($i) }}"
               style="
                   display:inline-block;
                   padding:6px 10px;
                   margin:0 4px;
                   border-radius:6px;
                   text-decoration:none;
                   font-weight:bold;
                   border:1px solid #d4af37;
                   color: {{ $users->currentPage() == $i ? '#000' : '#d4af37' }};
                   background: {{ $users->currentPage() == $i ? '#d4af37' : '#000' }};
               ">
                {{ $i }}
            </a>
        @endfor
    </div>
</div>
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
        }

        header {
            background: var(--black);
            color: var(--white);
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
        }

        .logo span { color: var(--gold); }

        .content {
            padding: 40px;
            max-width: 1100px;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 25px;
            border-left: 5px solid var(--gold);
            padding-left: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--gray);
            text-align: left;
            font-size: 14px;
        }

        th {
            background: #111;
            color: var(--gold);
            font-weight: bold;
        }

        tr:hover { background: #f2f2f2; }

        .danger-btn {
            background: #b00020;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .danger-btn:hover { filter: brightness(1.1); }

        .back-btn {
            background: #000;
            color: var(--gold);
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</body>
</html>