<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Admin – Kommentek</title>
</head>
<body>
<header>
    <div class="logo">Lux<span>Car</span> Admin</div>
    <a href="{{ route('admin.dashboard') }}" class="back-btn">
        Vissza
    </a>
</header>

<div class="content">

    <h2>Kommentek</h2>

    @if(session('success'))
        <div style="margin-bottom:15px;background:#e9ffe9;padding:10px;border-radius:8px;">
            {{ session('success') }}
        </div>
    @endif

    @forelse($comments as $comment)

        @php
            // Autó név intelligens összerakás többféle mezőnév esetére:
            // - brand + model
            // - marka + tipus
            // - name
            $autoName = null;

            if ($comment->auto) {
                $a = $comment->auto;

                if (!empty($a->brand) || !empty($a->model)) {
                    $autoName = trim(($a->brand ?? '') . ' ' . ($a->model ?? ''));
                } elseif (!empty($a->marka) || !empty($a->tipus)) {
                    $autoName = trim(($a->marka ?? '') . ' ' . ($a->tipus ?? ''));
                } elseif (!empty($a->name)) {
                    $autoName = $a->name;
                }
            }
        @endphp

        <div class="comment-row">
            <div>
                <div class="comment-meta">
                    <strong>Írta:</strong>
                    {{ $comment->user->username ?? $comment->user->email ?? 'Ismeretlen' }}
                    <br>

                    <strong>Autó:</strong>
                    @if($comment->auto && $autoName)
                        {{ $autoName }} (ID: {{ $comment->auto->id }})
                    @elseif($comment->auto)
                        Ismeretlen név (ID: {{ $comment->auto->id }})
                    @else
                        Nincs hozzárendelve
                    @endif
                    <br>

                    <strong>Dátum:</strong>
                    {{ optional($comment->created_at)->format('Y-m-d H:i') }}
                </div>

                <div class="comment-text">
                    {{ $comment->content }}
                </div>
            </div>

            <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                  method="POST"
                  onsubmit="return confirm('Biztosan törlöd ezt a kommentet?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="danger-btn">Törlés</button>
            </form>
        </div>
    @empty
        <div>Nincs komment.</div>
    @endforelse

    @if ($comments->lastPage() > 1)
        <div style="margin-top:20px; text-align:center;">
            @for ($i = 1; $i <= $comments->lastPage(); $i++)
                <a href="{{ $comments->url($i) }}"
                   class="page-link"
                   style="
                       color: {{ $comments->currentPage() == $i ? '#000' : '#d4af37' }};
                       background: {{ $comments->currentPage() == $i ? '#d4af37' : '#000' }};
                   ">
                    {{ $i }}
                </a>
            @endfor
        </div>
    @endif

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

        .logo { font-size: 22px; font-weight: bold; }
        .logo span { color: var(--gold); }

        .content {
            padding: 40px;
            max-width: 1000px;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 25px;
            border-left: 5px solid var(--gold);
            padding-left: 12px;
        }

        .comment-row {
            background: var(--white);
            border: 1px solid var(--gray);
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 14px;
            display: flex;
            justify-content: space-between;
            gap: 18px;
        }

        .comment-meta {
            font-size: 13px;
            color: #444;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .comment-meta strong { color: var(--gold); }

        .comment-text {
            font-size: 15px;
            line-height: 1.45;
            white-space: pre-wrap;
        }

        .danger-btn {
            background: #b00020;
            color: #fff;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .danger-btn:hover { filter: brightness(1.1); }

        .back-btn {
            background:#000;
            color:#d4af37;
            text-decoration:none;
            border:1px solid #d4af37;
            padding:10px 16px;
            border-radius:6px;
            font-weight:bold;
            display:inline-block;
        }

        .page-link {
            display:inline-block;
            padding:6px 10px;
            margin:0 4px;
            border-radius:6px;
            text-decoration:none;
            font-weight:bold;
            border:1px solid #d4af37;
        }
    </style>
</body>
</html>