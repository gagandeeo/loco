<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="">
        <h3>Dashboard</h3>
        @if($LoggedUser)
        <h4>{{ $LoggedUser['name'] }}</h4>
        <h4>{{ $LoggedUser['email'] }}</h4>
        @endif
        <a href="{{ route('components.logout') }}">LogOut</a>
    </div>
</body>
</html>