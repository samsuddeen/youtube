

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">

        <div>
<a href="{{ route('users.create') }}" class="btn btn-primary"> create</a>

</div>
@if(session('success'))
<div class="alert alert-success">
    {{session('success') }}
</div>
@endif
<table class="table">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>

@foreach ($users as  $user)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $user->name ?? '' }}</td>
      <td>{{ $user->email }}</td>
     <td>
        <a href="{{ route('users.show',$user->id) }}" class="btn btn-info btn-sm">Show</a>
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <Button type="submit" class="btn btn-danger btn-sm"   onclick="return confirm('are you sure want to delete')">
                Delete
            </Button>

        </form>
     </td>
    </tr>
    @endforeach

  </tbody>
</table>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>
    @if (session('success'))
    toastr.success("{{ session('success') }}");

    @endif
  </script>
</body>
</html>
