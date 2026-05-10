<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

    <title>@yield('title')</title>
        
</head>
<body style="margin: 0px; padding: 0px; font-family: 'Nunito', sans-serif; width: 100vw ; height: 200vh;overflow-x: hidden;">
    
    <header
        style="height: 8vh;width: 100%;background-color: #FFFDD0;display: flex; justify-content: space-around;position: fixed;z-index: 999;">
        <div
            style="height: 12vw;width: 12vw; background-color: #FFFDD0; border-radius:50%;margin-left: -5.5vw;position:relative;top:-2vw">
            <img src="https://media.istockphoto.com/id/1209262314/pt/vetorial/bowl-of-hot-soup-hand-drawn-doodle-icon-miso-soup-vector-sketch-illustration-cartoon.jpg?s=612x612&w=0&k=20&c=eFeugpUflQIVvES49u2M9C42wE3w1xtVJ-XwOfI0L-w="
                style="width: 80%; height: 80%; border-radius: 50%;position:relative;left:1.5vw ;top:1.5vw"
                alt="Soup icon">
        </div>
        <div class="aboutTitles">
            <a href="/"> Home</a>
        </div>
        <div class="aboutTitles">
            <a href="/about"> About</a>
        </div>
        <div class="aboutTitles">
            <a href="/Browse"> Browse</a>
        </div>

        @if (!session('name'))
            <button
                style="background-color: #4CAF50; color: white; padding: 1vw; border: none; cursor: pointer;width: 4.9vw;height: 6vh;position: relative;top:0.4vw;border-radius: 10%;position: relative;left:8vw;border: double 2px rgba(7, 12, 1, 0.295);"
                onclick="window.location.href='/SignIn';">sign in</button>
            <button
                style="background-color: #4CAF50; color: white; padding: 1vw; border: none; cursor: pointer;width: 5.1vw;height: 6vh;position: relative;top:0.4vw;border-radius: 10%;border:double 2px rgba(7, 12, 1, 0.295)"
                onclick="window.location.href='/signUp';">sign up</button>

        @endif
        @if (session('name'))
            <button style="background-color: #4CAF50; color: white; padding: 1vw; border: none; cursor: pointer;"
                onclick="window.location.href='/profile';">Profile</button>
        @endif
    </header>
    @yield('content')

<footer style="text-align: center;background-color:beige; width:100vw;height:6vw"><p style="font-family:  monospace; font-size: 28px; padding: 1.5vw;">developed by the great Soup ®</p></footer>

</body>