@extends('layout')
@section('title', 'Search Results')
@section('content')
@vite(['resources/css/search.css'])

<body>

    <div class="search-spacer"></div>

    <h1 class="search-title">Search Results for "{{ $query }}"</h1>

    <h2>Posts</h2>
    @if($posts->count() > 0)
    <div class="search-feed">
        @foreach($posts as $post)
        <div class="search-post-card">

            <div class="search-post-card__header" onclick="window.location.href = '/UserInfo/{{ $post->user_name }}';">
                <p><strong>{{ $post->user_name }}</strong></p>
                @if(!empty($post->UserProfilePicture) && Storage::disk('public')->exists($post->UserProfilePicture))
                <div class="search-post-card__avatar">
                    <img src="{{ Storage::url($post->UserProfilePicture) }}" alt="Profile Picture" class="search-post-card__avatar-img">
                </div>
                @else
                <div class="search-post-card__avatar search-post-card__avatar--empty">No Picture</div>
                @endif
            </div>

            <div class="search-post-card__body">
                <p>{{ $post->text }}</p>
            </div>

            @if($post->image_path)
            <div>
                <img src="{{ Storage::url($post->image_path) }}" alt="Post Image" class="search-post-card__post-img">
            </div>
            <div>
                <a href="/ThePost/{{ $post->postUUID }}">
                    <img src="https://cdn-icons-png.flaticon.com/512/1380/1380338.png" alt="Post Image" class="search-post-card__link-icon">
                </a>
            </div>
            @endif

        </div>
        @endforeach
    </div>
    @else
    <p>No posts found matching your search.</p>
    @endif

    <h2>Users</h2>
    @if($users->count() > 0)
    <div class="search-users-grid">
        @foreach($users as $user)
        <div class="search-user-card" onclick="window.location.href = '/UserInfo/{{ $user->name }}';">
            <p><strong>{{ $user->name }}</strong></p>
            <p>{{ $user->email }}</p>
        </div>
        @endforeach
    </div>
    @else
    <p>No users found matching your search.</p>
    @endif

    <a href="/Browse">Back to Browser</a>

</body>
@endsection