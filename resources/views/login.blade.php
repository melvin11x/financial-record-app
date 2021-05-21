<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financial Record | Login</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>

<section>
    <div class="row">
        <div class="col-4 welcome-section">
            <div class="absolute-center">
                <h1>Welcome Back!</h1>
                <p>Create account if you don't have account yet.</p>
                <a href="{{ route('page.register') }}" class="btn btn-primary-reverse">Register</a>
            </div>
        </div>
        <div class="col-8 form-section">
            <form action="{{ route('system.login') }}" method="POST" class="form absolute-center" autocomplete="off">
                @csrf

                <h1>Log In</h1>

                <div>
                    <label for="email">Email</label>
                    <div class="input-container">
                        <i class="fas fa-envelope"></i>
                        <input type="text" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <div class="text-error mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="password">Password</label>
                    <div class="input-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password">
                    </div>
                    @error('password')
                    <div class="text-error mt-1">{{ $message }}</div>
                    @enderror
                </div>

                @if(session('message'))
                    <div class="text-error mt-2">{{ session('message')  }}</div>
                @endif

                <button class="btn btn-primary">Log In</button>
            </form>
        </div>
    </div>
</section>

</body>
</html>
