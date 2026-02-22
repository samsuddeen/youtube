

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div>
     <a href="{{ route('users.index') }}" class="btn btn-primary">Users list</a>

</div>

<h3>Single User Data</h3>
<table class="table">
  <thead>

    <tr>
      <th scope="col">name</th>
      <th scope="col">email</th>
      {{-- <th scope="col">Action</th> --}}
    </tr>
  </thead>

  <tbody>


    <tr>
      <td>{{ $user->name ?? '' }}</td>
      <td>{{ $user->email }}</td>

    </tr>

  </tbody>
</table>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
