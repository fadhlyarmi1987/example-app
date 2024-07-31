<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CV NATUSI</title>
    <link rel="stylesheet" href="{{ asset('CSS/login.css') }}">
</head>

<body>
    <header class="header-bar">
        <div class="logo">
            <img src="{{ asset('IMG/LOGO NATUSI.png') }}" alt="logoatas" class="logo-atas">
        </div>
    </header>
    <div class="container">
        <div class="header">
            <div class="container-combine">
                <div class="container-imgbanner">
                    <img src="{{ asset('IMG/Natusi_Banner.png') }}" alt="Banner">
                </div>

                <div class="login-box">
                    <h2 class="container-img">
                        <img src="{{ asset('IMG/LOGO.png') }}" alt="Logo">
                    </h2>
                    <form action="{{ route('login.submit') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <label for="email">EMAIL:</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <label for="password">PASSWORD:</label>
                            <input type="password" id="password" name="password" required>
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn">LOGIN</button>
                        <p>Belum memiliki akun? <a href="{{ route('register') }}">Daftar disini!</a></p>
                        @error('login-error')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
