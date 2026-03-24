<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Create Account</h2>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required /><br><br>
        <input type="text" name="subdomain" placeholder="Choose username (e.g. sharath)" required /><br><br>
        <small>Your site will be: <b>[username].nulinz.co.in</b></small><br><br>
        <input type="email" name="email" placeholder="Email" required /><br><br>
        <input type="password" name="password" placeholder="Password" required /><br><br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required /><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>