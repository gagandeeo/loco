<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
        <title>Dashboard</title>
    </head>
    <body >
            @if ($message = Session::get('Success'))
            <div class="alert__success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if ($message = Session::get('alert'))
            <div class="alert__danger">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <div style="margin-top:20px">
            <a class="sharelink__ref" href="{{ route('post.uploadFile') }}">Share File</a>
        </div>
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
                    <a class="edit__ref" href="/post/user-post/update/{{ $values->id }}">Edit</a> 
                </div>
                @endforeach
            </div>
    </body>
</html>