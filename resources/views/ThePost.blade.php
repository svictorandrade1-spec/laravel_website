@extends('layout')
@section('title', 'Post Page')
@section('content')
<div style="height: 10vh;">
</div>

    <div style="border: 1px solid #ccc; padding: 20px; display: flex; justify-content: end; flex-direction: row; align-items: flex-start;" id="teste">
        
        <div style="width: 55vw; height: 70vh; border: 1px solid black; margin: 10px; padding: 10px; display: flex; flex-direction: column; align-items: stretch; gap: 1rem;overflow-y: auto;">
            <h2>Comments</h2>
            <form action="/commenting" method="POST">
                @csrf
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <textarea style="resize: vertical;" name="comment" placeholder="Write your comment here..." required></textarea>
                    <button type="submit">Post Comment</button>
                </div>
            </form>
            @if(isset($comments) && $comments->count())
                <div style="display: flex; flex-direction: column; gap: 1rem;" id="">
                @if(session('error'))
                    <p style="color: red; margin-top: 10px;">{{ session('error') }}</p>
                @endif
                        
                    @foreach($comments as $comment)
                        <div style="border:1px solid black; padding: 1rem; width: 95%; display: flex; gap: 1rem;">
                            <div style="width: 7vh; height: 7vh; border-radius: 50%; overflow: hidden; background-color: lightgray; flex-shrink: 0; display:flex; align-items:center; justify-content:center;">
                                @if(!empty($comment->profile_picture) && Storage::disk('public')->exists($comment->profile_picture))
                                    <img src="{{ Storage::url($comment->profile_picture) }}" alt="Commenter Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <span style="font-size: 0.7rem;">No Pic</span>
                                @endif
                            </div>
                            <div style="flex:1;">
                                <p><strong>{{ $comment->name }}</strong> <span style="font-size: 0.85rem; color:#555;">{{ $comment->created_at }}</span></p>
                                <p>{{ $comment->comment }}</p>
                                @if($comment->name == session('name'))
                                    <form action="/deleteComment" method="POST" style="margin-top: 0.5rem;">
                                        @csrf
                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                        <button type="submit" style="background-color: red; color: white; border: none; padding: 5px; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this comment?');">Delete Comment</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No comments yet.</p>
            @endif
        </div>
        
        <div style="border: 1px solid #ccc; margin: 10px; padding: 10px; width: 30vw; min-height: 70vh; display: flex; flex-direction: column; align-items: center; gap: 2vh;">
            <div style="width:95%; display:flex; align-items:center; justify-content:space-between; border:1px solid black; padding: 0.5rem;">
                <div><p><strong>{{ $post->user_name }}</strong></p></div>
                @if(!empty($post->UserProfilePicture) && Storage::disk('public')->exists($post->UserProfilePicture))
                    <div style="width: 7vh; height: 7vh; border-radius: 50%; overflow: hidden;"><img src="{{ Storage::url($post->UserProfilePicture) }}" alt="Profile Picture" style="width: 100%; height: 100%; object-fit: cover;"></div>
                @else
                    <div style="width: 7vh; height: 7vh; border-radius: 50%; background-color: lightgray; display:flex; align-items:center; justify-content:center;">No Pic</div>
                @endif
            </div>
            <div style="border:1px solid black; height:20vh;width:95%;overflow: auto;"><p>{{ $post->text }}</p></div>
            @if($post->image_path)
               <div><img src="{{ Storage::url($post->image_path) }}" alt="Post Image" style="max-width: 100%; height: 40vh;"></div>
            @endif
        </div>

    </div>


@endsection

