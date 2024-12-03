<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>

    {{-- message --}}
    @if (session('success'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
    @endif


    {{-- create new account form --}}
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Create</button>
    </form>

    {{-- logout --}}
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>


</body>
</html>