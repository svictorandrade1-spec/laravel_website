@extends('layout')
@section('title', 'About Page')
@section('content')
<body>
    
<div style="width: 100vw; height: 125vh; ; display: flex; flex-direction: column;justify-content: center;align-items: center;position: relative;top: -10px;">
<h1 style="position: relative; top:-2vw; font-family: 'Nunito', sans-serif; font-size: 42px; color: #333; font-weight: 700;font-style: italic;">About Us</h1>
</div>



       

       <div style="width: 30vw;height:35vw; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.75); background-color: #f0f0f0; border-radius: 10px;position: relative;top: 1vw; left:60vw" >
        <img src="./images/eu.png" style="width: 100%; height: 100%; " alt="Soup icon" >
        <p style="font-family: 'Nunito', sans-serif; font-size: 32px; color: #333;">Fred is a dedicated software engineer with a passion for web development.</p>
       </div>

        <div style="width: 30vw;height:35vw; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.75); background-color: #f0f0f0; border-radius: 10px;position: relative;top: -33.7vw;right:-7vw" >
        <img src="./images/vitor.png" style="width: 100%; height: 100%; " alt="Soup icon" >
        <p style="font-family: 'Nunito', sans-serif; font-size: 32px; color: #333;">Vitor is a passionate developer who loves creating innovative solutions.</p>
       </div>
 <h2 style="font-size: 63px;position:relative;top:-20vw;text-align: center;">A small team seeking great height.</h2>
    

    
</body>
@endsection