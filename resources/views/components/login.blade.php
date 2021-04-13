<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>Login</title>
</head>
<body>
    <div class="login__container">
            <form action=" {{ route('components.check') }} " class="login__form" method='post'>
                    @csrf
                    @if(Session::get('success'))
                        {{ Session::get('success') }}
                    @endif
                    @if(Session::get('fail'))
                        {{ Session::get('fail') }}
                    @endif
                    <div class="row">
                        <span class="alert"> @error('email'){{ $message }} @enderror </span>
                        <input type="text" name='email' value="{{ old('email') }}" placeholder='Enter Email Address'>
                    </div>
                    <div class="row">
                        <span class="alert">         
                            @error('password'){{ $message }} @enderror </span>
                        <input type="password" name='password' placeholder='Enter password'>
                    </div>
                        <button class="login__button" type="submit">Login</button>
                <a  href="{{ route('components.register') }}">Signup?</a>
            </form>                
    </div>
</body>
</html>