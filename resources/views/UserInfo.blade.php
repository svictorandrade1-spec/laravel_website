@extends('layout')
@section('title', 'User info')
@section('content')
    <div style="display: flex; flex-direction: column; align-items: center; gap: 20px; margin-top: 50px;">
        <h1>User Information</h1>
        @if(!empty($user->profile_picture) && Storage::disk('public')->exists($user->profile_picture))
            <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
        @else
            <div style="width: 150px; height: 150px; border-radius: 50%; background-color: lightgray; display: flex; align-items: center; justify-content: center;">No Picture</div>
        @endif
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>
            <h2 style="text-align: center;">Posts by {{ $user->name }}</h2>
    <div style="display: flex;width: 100vw; flex-wrap: wrap; justify-content: center; height: auto; flex-direction: row; align-items: center; gap: 5vw;">

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


@endsection