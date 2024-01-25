<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard Page</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
        <header>
            <h1>Welcome to Dashboard, {{Auth::user()->name}}! </h1>
            <p>The current project is on progress, <strong>stay tune!</strong></p>
        </header>  
        <main>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </main>
</body>
</html>