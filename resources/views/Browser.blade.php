@extends('layout')
@section('title', 'Browser Page')
@section('content')
<body>
    <div style="width: 100vw; height: 15vh; "></div>

<h1 style="text-align: center;">welcome to the browser</h1>
<h3>Here you can see what people are doing and post updates</h3>
<div style="border: 2px black solid;">
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="PostText" placeholder="What's on your mind?" style="width: 80%; height: 30px; margin: 10px;">
        <input type="file" name="PostImage">
        <button type="submit" style="height: 30px;">Post</button>
    </form>
</div>

<br><br>
    <div> <h2>Search for Users and content</h2> 
       <form action="/search" method="GET"> 
        <input type="text" name="query" placeholder="Type here to search for users and content" style="width: 80%; height: 30px; margin: 10px;"> 
       <button type="submit">Search</button>
        </form>
    </div>
    @if(session('error'))
        <p style="color: red; text-align: center;">{{ session('error') }}</p>
    @endif
    
    
        <div style="display: flex;width: 100vw; flex-wrap: wrap; justify-content: center; height: auto;">
    @foreach($posts as $post)
        <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;width: 30vw; height: 70vh; display: flex; flex-direction: column; align-items: center; gap: 2vh">
            <div onclick="window.location.href = '/UserInfo/{{ $post->user_name }}';" style="border:1px solid black; height:5vh;width:95%"><p><strong>{{ $post->user_name }}</strong></p>
            @if(!empty($post->UserProfilePicture) && Storage::disk('public')->exists($post->UserProfilePicture))
                <div style="width: 7vh; height: 7vh;position: relative;top: -50%; transform: translateY(-50%); left:90%"><img src="{{ Storage::url($post->UserProfilePicture) }}" alt="Profile Picture" style="max-width: 100%; height: 100%;"></div>
            @else
                <div style="width: 7vh; height: 7vh;position: relative;top: -50%; transform: translateY(-50%); left:90%; background-color: lightgray; border-radius: 50%; display: flex; align-items: center; justify-content: center;">No Picture</div>
            @endif
        </div>
            <div style="border:1px solid black; height:20vh;width:95%;overflow: auto;"><p>{{ $post->text }}</p></div>
            @if($post->image_path)
               <div><img src="{{ Storage::url($post->image_path) }}" alt="Post Image" style="max-width: 100%; height: 40vh;"></div>
                 <div><a href="/ThePost/{{ $post->postUUID }}"><img src="https://cdn-icons-png.flaticon.com/512/1380/1380338.png" alt="Post Image" style="max-width: 20px; height: 20px;"></a></div>

            @endif
        </div>
    @endforeach
    </div>

</body>

@endsection