<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <span class="logo-text">RPLFLIX</span>
        </div>
        <div class="login-header">
            <h1>Selamat Datang</h1>
            <p>Register Untuk Melanjutkan</p>
        </div>

        @error('register')
            <p style="color: red">{{ $message }}</p>
        @enderror
        <form action="{{ Route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name : </label>
                <input type="name" name="name" id="name" class="form-input" value="{{ old('name') }}">
                @error('name')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
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

            <div class="form-group">
                <label for="gender">Gender : </label>
                <label for="male">
                    <input type="radio" name="gender" id="male" value="male" checked>
                    Male
                </label>
                <label for="female">
                    <input type="radio" name="gender" id="female" value="female">
                    Female
                </label>
            </div>

            <button type="submit" class="btn-login">Register</button>
            <p>Sudah Punya Akun? Ketuk <a href="/login">Login</a></p>
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
