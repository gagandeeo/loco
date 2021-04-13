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
        <form class="form__container" action="{{route('post.uploadFile')}}" method="post" enctype="multipart/form-data">
          <h3 >Upload File</h3>
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
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
            <div class="form__inpdiv">
                <input type="text" name="title" placeholder="Title" />
                <input type="text" name="description" placeholder="Description"/>
            </div>
          
            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>
    </div>

</body>
</html>