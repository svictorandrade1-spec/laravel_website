@extends('layout')
@section('title', 'User info')
@section('content')
@vite(['resources/css/userinfo.css'])

    <div class="userinfo-header">
        <h1>User Information</h1>
        @if(!empty($user->profile_picture) && Storage::disk('public')->exists($user->profile_picture))
            <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture" class="userinfo-header__avatar">
        @else
            <div class="userinfo-header__avatar--empty">No Picture</div>
        @endif
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>

    <h2 class="userinfo-posts-title">Posts by {{ $user->name }}</h2>

    <div class="userinfo-posts-wrapper">
        <div class="userinfo-feed">
            @foreach($posts as $post)
                <div class="userinfo-post-card">

                    <div class="userinfo-post-card__header" onclick="window.location.href = '/UserInfo/{{ $post->user_name }}';">
                        <p><strong>{{ $post->user_name }}</strong></p>
                        @if(!empty($post->UserProfilePicture) && Storage::disk('public')->exists($post->UserProfilePicture))
                            <div class="userinfo-post-card__avatar">
                                <img src="{{ Storage::url($post->UserProfilePicture) }}" alt="Profile Picture" class="userinfo-post-card__avatar-img">
                            </div>
                        @else
                            <div class="userinfo-post-card__avatar userinfo-post-card__avatar--empty">No Picture</div>
                        @endif
                    </div>

                    <div class="userinfo-post-card__body">
                        <p>{{ $post->text }}</p>
                    </div>

                    @if($post->image_path)
                        <div>
                            <img src="{{ Storage::url($post->image_path) }}" alt="Post Image" class="userinfo-post-card__post-img">
                        </div>
                        <div>
                            <a href="/ThePost/{{ $post->postUUID }}">
                                <img src="https://cdn-icons-png.flaticon.com/512/1380/1380338.png" alt="Post Image" class="userinfo-post-card__link-icon">
                            </a>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>

@endsection