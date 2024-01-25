<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Login</title>
</head>
<body>
    <h1>SimpleApp</h1>
    <form method="POST" action="{{route('login')}}">
        <h2>Please Log In</h2>
        @csrf
        @if ($errors->has('error'))
            <div class="alert alert-danger">{{ $errors->first('error') }}</div>
        @endif
        <input id="email" type="email" name="email" required placeholder="Email" autofocus>
        <input id="password" type="password" name="password" required placeholder="Password">    
        <button type="submit">Login</button>
    </form>
</body>
</html>