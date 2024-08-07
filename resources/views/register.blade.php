<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - CV NATUSI</title>
    <link rel="stylesheet" href="{{ asset('CSS/register.css') }}">
</head>
<body>
    <header class="header-bar">
        <div class="logo">
            <img src="{{ asset('IMG/LOGO NATUSI.png') }}" alt="logoatas" class="logo-atas">
        </div>
    </header>
    <div class="header">
        <div class="container-combine">
            <div class="container-imgbanner">
                <img src="{{ asset('IMG/Natusi_Banner.png') }}" alt="Banner">
            </div>
            <div class="container">
                <div class="login-box">
                    <h2>
                        <img src="{{ asset('IMG/LOGO.png') }}" width="250" height="100">
                    </h2>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group">
                            <label for="name">NAMA:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="input-group">
                            <label for="email">EMAIL:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="input-group">
                            <label for="password">PASSWORD:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="input-group">
                            <label for="password_confirmation">KONFIRMASI PASSWORD:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="input-group">
                            <label for="user_type">TIPE USER:</label>
                            <select id="user_type" name="user_type" required>
                                <option value="Karyawan">Karyawan</option>
                                <option value="Magang">Magang</option>
                            </select>
                        </div>
                        <button type="submit" class="btn">DAFTAR</button>
                        <p>Sudah memiliki akun? <a href="{{ route('login') }}">Login disini!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
