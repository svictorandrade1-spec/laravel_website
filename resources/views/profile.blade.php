@extends('layout')
@section('title', 'Browser Page')
@section('content')
<body>
<div style="width: 100vw; height: 15vh; "></div>

@if(session('error'))
    <p style="color: red; text-align: center;">{{ session('error') }}</p>
@endif

<div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
    <h1 style="text-align: center;">welcome to your profile, {{ session('name') }}</h1>
    @if($user->profile_picture)
        <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
        <h4>would you like to update a profile picture?</h4>
        <form action="/updateProfilePicture" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_picture" accept="image/*">
            <button type="submit">Update Picture</button>
        </form>
        <h4>Remove Picture</h4>
        <form action="/removeProfilePicture" method="POST">
            @csrf
            <button type="submit">Remove Picture</button>
        </form>
    @else
        <div style="width: 150px; height: 150px; border-radius: 50%; background-color: lightgray; display: flex; align-items: center; justify-content: center;">No Picture</div> <h4>Upload one?</h4>
           <form action="/updateProfilePicture" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="profile_picture" accept="image/*">
                <button type="submit">Upload Picture</button>
            </form>
    @endif
    <h3 style="text-align: center;">Here you can see your posts and delete them if you want</h3>
</div>

<button style="text-decoration: none; color: black; width: 10vw; height: 100px; background-color: lightgray; border: 1px solid black;" onclick="window.location.href = '/logout';">logout</button>
  
<div style="display: flex;width: 100vw; flex-wrap: wrap; justify-content: center; height: auto;">
    
    @if($posts->count() == 0)
        <p style="text-align: center;">You haven't posted anything yet!</p>
        <button><a href="/Browse" style="text-decoration: none; color: black;background-color: lightgray; padding: 10px; border: 1px solid #ccc;">Create a Post here!</a></button>
    @endif

        @foreach($posts as $post)
            <div style="border: 1px solid #ccc; margin: 10px; padding: 10px;width: 25vw; height: 70vh; display: flex; flex-direction: column; align-items: center; gap: 2vh">
                <div style="border:1px solid black; height:5vh;width:95%"><p><strong>{{ $post->user_name }}</strong></p></div>
                <div style="border:1px solid black; height:20vh;width:95%;overflow: auto;"><p   >{{ $post->text }}</p></div>
                @if($post->image_path)
                    <div><img src="{{ Storage::url($post->image_path) }}" alt="Post Image" style="max-width: 100%; height: 40vh;"></div>
                        <div><a href="/ThePost/{{ $post->postUUID }}"><img src="https://cdn-icons-png.flaticon.com/512/1380/1380338.png" alt="Post Image" style="max-width: 20px; height: 20px;"></a></div>   
                @endif
                


                <div style="display: flex;">
                <form action="/deletePost" method="POST">
                        @csrf
                        <input type="hidden" name="postUUID" value="{{ $post->postUUID }}">
                        <button type="submit" style="background-color: red; color: white; border: none; padding: 10px; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this post?');" >Delete Post</button>
                    </form> 
                    <form action="/EditPost/{{ $post->postUUID }}" method="GET">
                        <button type="submit" style="background-color: blue; color: white; border: none; padding: 10px; cursor: pointer;">Edit Post</button>
                    </form>
                </div>
            </div>
         @endforeach
    
    
    </div>  






</body>
@endsection
