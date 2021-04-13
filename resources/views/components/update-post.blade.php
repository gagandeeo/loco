<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/upload-file.css') }}" />
    <title>Laravel File Upload</title>
</head>

<body>
    <div class="upload__container">
        <form class="form__container" action="/post/user-post/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
          <h3 >Update File</h3>
            @csrf
            @if ($message = Session::get('Success'))
            <div class="alert alert-success">
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
            <div class="custom-file">
                <input style="cursor:pointer" type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select File</label>
            </div>
            <div class="form__inpdiv">
                Title
                <input type="text" name="title" value="{{ $posts->title }}" placeholder="Title" />
                Description
                <input type="text" name="description" value="{{ $posts->description }}" placeholder="Description"/>
            </div>
          
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Update File
            </button>
            <a class="btn btn-danger btn-block mt-4" href="/post/user-post/delete/{{ $posts->id }}">Delete</a>
        </form>
    </div>

</body>
</html>