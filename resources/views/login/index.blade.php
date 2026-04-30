<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <span class="logo-text">RPLFLIX</span>
        </div>
        <div class="login-header">
            <h1>Selamat Datang</h1>
            <p>Masuk Untuk Melanjutkan</p>
        </div>

        @error('login')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <form action="{{ Route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" class="form-input" value="{{ old('email') }}">
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password : </label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" class="form-input">
                    <button type="button" class="toggle-password" onclick="togglePassword()">🌑</button>
                </div>
                @error('password')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn-login">Login</button>
            <p>Belum Punya Akun? Ketuk <a href="/register">Register</a></p>
        </form>
    </div>
</body>
<script>
    function togglePassword(){
        const passInput = document.getElementById('password');
        const toggleBtn = event.target;
        if(passInput.type === 'password'){
            passInput.type = 'text';
            toggleBtn.textContent = '🌕';
        }else{
            passInput.type = 'password';
            toggleBtn.textContent = '🌑';
        }
    }
</script>
</html>
