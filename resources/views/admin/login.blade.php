<div class="box">
<h2>Admin Belépés</h2>

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('admin.login.post') }}">
    @csrf
    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Jelszó:</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Belépés</button>
</form>
</div>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: black;
            color: white;
            margin-top: 15px;
            border: none;
            cursor: pointer;
            border-radius:5px;
        }
    </style>