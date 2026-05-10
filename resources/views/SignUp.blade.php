<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="/sign-up" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <label for="profile_picture">Profile Picture (Optional)</label>
        <input type="file" name="profile_picture">
        <button type="submit">Sign Up</button>
    </form>
    @if(isset($error))
        <p style="color: red;">{{ $error }}</p>
    @endif
</body>
</html>