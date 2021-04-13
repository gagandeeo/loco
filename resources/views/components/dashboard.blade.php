<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard__container">
        <div class="header">
                <img  class="header__logo" src="{{asset('widgets/logor.png')}}" alt="" width="100" height="100">
                <div class="header__right">
                    <div class="dropdown">
                        <span>Profile</span>
                        <div class="dropdown-content">
                            <h4>Username:</h4>
                            <h4>Description:</h4>
                        </div>
                    </div>  
                    <a href="{{ route('components.logout') }}">LogOut</a>
                </div>
        </div>
            <a class="sharelink__ref" href="{{ route('post.uploadFile') }}">Share File</a> 
            <a class="sharelink__ref" href="{{ route('post.getUserPost') }}">My Uploads</a> 
        <div class="list__container">
            @foreach($posts As $key => $values)
            <div class="post__container">
                <h4 class="post__title">
                    {{ $values->title }}      
                </h4>
                <image src="{{ $values->path }}" class="post__image" alt="Data File" width="300px" height="300px"/>
                <div class="info__field">
                    <h4>Description: {{ $values->description }}</h4>
                </div>
                 <a class="link__ref" href="/post/download/{{ $values->id }}">Download</a> 
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>

