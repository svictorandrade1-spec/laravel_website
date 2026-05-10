@extends('layout')

@section('title', 'Home Page')

@section('content')
    <body>

<div style="width: 100vw; height: 125vh; ; display: flex; flex-direction: column;justify-content: center;align-items: center;position: relative;top: -10px;">

    <img  src="./images/580bcee3-4597-41e0-a4e9-a2c6485f9550.png" style="position: relative;top: -90px;;width: 300px; height: 300px; " alt="Soup icon" >
        <h1 style="position: relative;top: -130px;font-size: 24px;">Bem vindo à SoupNet</h1>
        <h3 style="position: relative; top: -90px;">Aqui você pode postar e acessar conteúdo de diferentes áreas de seu interesse</h3>
</div>
<div style="display: flex; gap: 0px;flex-direction: row;width: 100vw;height: 58vw;flex-wrap: wrap;">
    <img src="./images/img1.jpeg" style="width: 20vw; height: 29vw;" alt="john">
    <img src="./images/img2.jpeg" style="width: 20vw; height: 29vw;" alt="john">
    <img src="./images/img3.jpeg" style="width: 20vw; height: 29vw;" alt="john">
    <img src="./images/img4.jpeg" style="width: 20vw; height: 29vw;" alt="john">
    <img src="./images/img5.jpeg" style="width: 20vw; height: 29vw;" alt="john">
    <img src="./images/img6.jpeg" style="width: 40vw; height: 29vw;" alt="john">
    <img src="./images/img7.jpeg" style="width: 40vw; height: 29vw;" alt="john">
    <img src="./images/img8.jpeg" style="width: 20vw; height: 29vw;" alt="john">
</div>
<div style="height: 15vw;width: 60vw;background-color: beige;position: relative; top:-37vw;left:20vw">
    <h3>Se junte agora aos nossos <del>milhões</del> de usuários</h3>
</div>
    </body>
@endsection