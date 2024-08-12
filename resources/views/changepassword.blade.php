<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - CV NATUSI</title>
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

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="input-group">
                            <label for="email">EMAIL:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn">Kirim Link Reset</button>
                        <p><a href="{{ route('login') }}">Kembali ke Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
