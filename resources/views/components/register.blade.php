<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>
<body>
    <div class="register__container">
            <form action=" {{ route('components.save') }} " class="register__form" method='post'>

                @if(Session::get('success'))
                    <span class="alert__reg">
                        {{ Session::get('success') }}
                    </span>
                @endif

                @if(Session::get('fail'))
                    <span class="alert__reg">
                        {{ Session::get('fail') }}
                    </span>
                @endif

                @csrf

                <div class="row">
                    <span class="alert"> @error('name'){{ $message }} @enderror </span>
                    <input type="text" name='name' value="{{ old('name') }}" placeholder='Enter username'>
                </div>
                <div class="row">
                    <span class="alert"> @error('email'){{ $message }} @enderror </span>
                    <input type="text" name='email' value="{{ old('email') }}" placeholder='Enter Email Address'>
                </div>
                <div class="row">
                    <span class="alert"> @error('password'){{ $message }} @enderror </span>
                    <input type="password" name='password' placeholder='Enter password'>                   
                </div>
                    <button class="register__button" type="submit">Signup</button>
                <a href="{{ route('components.login') }}">Already have an account? Login</a>
            </form>                
    </div>
</body>
</html>