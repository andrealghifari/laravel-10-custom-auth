<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/register.css">
    <title>Register User</title>
</head>

<body>        
    <h1>SimpleApp</h1>
    <form method="POST" action="{{ route('register') }}" >
        @csrf
        <h2 class="header-form">User Registration</h2>
        <div>
            <label for="email">Email</label>  
            <input type="email" id="email" name="email" required> 
        </div>
        <div>
            <label for="name">Name</label> 
            <input type="text" id="name" name="name" required> 
        </div>
        <div>
            <label for="password">Password</label> 
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Password Confirmation </label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit"> Register</button>
    </form>
</body>
</html>