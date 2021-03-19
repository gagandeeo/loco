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
            <!-- <h4>Login</h4> -->
            <form action=" {{ route('components.check') }} " class="login__form" method='post'>
                    @if(Session::get('success'))
                        {{ Session::get('success') }}
                    @endif
                    @csrf
                    <div class="row">
                        <span class="alert"> @error('email'){{ $message }} @enderror </span>
                    <input type="text" name='email' value="{{ old('email') }}" placeholder='Enter Email'>
                    </div>
                    <div class="row">
                        <span class="alert"> 
                            @if(Session::get('fail'))
                                {{ Session::get('fail') }}
                            @endif
                            @error('password'){{ $message }} @enderror </span>
                        <input type="password" name='password' placeholder='Enter password'>
                    </div>
                        <button class="login__button" type="submit">Login</button>
                <a  href="{{ route('components.register') }}">Signup?</a>
            </form>                
    </div>
</body>
</html>