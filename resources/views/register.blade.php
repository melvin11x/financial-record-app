<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financial Record | Register</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>

<section>
    <div class="row">
        <div class="col-8 form-section">
            <form action="{{ route('system.register') }}" method="POST" class="form absolute-center" autocomplete="off">
                @csrf

                <h1>Register</h1>

                <div>
                    <label for="name">Name</label>
                    <div class="input-container">
                        <i class="fas fa-user"></i>
                        <input type="text" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <div class="text-error mt-1">{{ $message }}</div>
                    @enderror
                </div>

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

                <div>
                    <label for="password_confirmation">Password Confirmation</label>
                    <div class="input-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                    </div>
                    @error('password_confirmation')
                    <div class="text-error mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Register</button>
            </form>
        </div>
        <div class="col-4 welcome-section">
            <div class="absolute-center">
                <h1>Welcome to Financial Record!</h1>
                <p>Log in to your account if you already have an account.</p>
                <a href="{{ route('page.login') }}" class="btn btn-primary-reverse">Log In</a>
            </div>
        </div>
    </div>
</section>

</body>
</html>
