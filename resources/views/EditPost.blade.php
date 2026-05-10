@extends('layout')
@section('title', 'Edit Post')
@section('content')

<div style="display: flex; flex-direction: row; justify-content: center; width: 100%; box-sizing: border-box;">
        <div style="min-height: calc(100vh - 8vh - 6vw); padding-top: 10vh; display: flex; justify-content: center; align-items: flex-start; width: 100%; box-sizing: border-box;">
            <div style="border: 1px solid #ccc; margin: 10px; padding: 20px; width: 25vw; max-width: 560px; min-width: 280px; background: white; display: flex; flex-direction: column; align-items: center; gap: 2vh; box-sizing: border-box;">
                <div style="border:1px solid black; height:5vh; width:95%; display:flex; align-items:center; padding: 0 10px;"><p><strong>{{ $post->user_name }}</strong></p></div>
                <div style="border:1px solid black; width:95%; min-height: 20vh; overflow: auto; padding: 10px;"><p>{{ $post->text }}</p></div>
                <div style="width: 95%;"><img src="{{ Storage::url($post->image_path) }}" alt="Post Image" style="width: 100%; height: auto; max-height: 50vh; object-fit: contain;"></div>
            </div>
        </div>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD2YzuHj69tqYuCLnw_AnvX6AnWofdJGGScg&s" alt="Edit Post Image" style="width: 30vw; height: auto; max-width: 400px; object-fit: contain; margin-right: 5vw;">

                <div style="min-height: calc(100vh - 8vh - 6vw); padding-top: 10vh; display: flex; justify-content: center; align-items: flex-start; width: 100%; box-sizing: border-box;">
            <div style="border: 1px solid #ccc; margin: 10px; padding: 20px; width: 25vw; max-width: 560px; min-width: 280px; background: white; display: flex; flex-direction: column; align-items: center; gap: 2vh; box-sizing: border-box;">
                <div style="border:1px solid black; height:5vh; width:95%; display:flex; align-items:center; padding: 0 10px;"><p><strong>{{ $post->user_name }}</strong></p></div>
                
                <form action="/EditPosted" method="POST">
                    @csrf
                    <input type="hidden" name="postUUID" value="{{ $post->postUUID }}">
                    <textarea name="PostText" style="width: 110%; height: 20vh; padding: 10px;" placeholder="Write your updated text here"></textarea>
                    <button type="submit" style="margin-top: 10px; background-color: blue; color: white; border: none; padding: 10px; cursor: pointer;">Save Changes</button>
                    @if(session('error'))
                        <p style="color: red; margin-top: 10px;">{{ session('error') }}</p>
                    @endif
                </form>
                
                
                <div style="width: 95%;"><img src="{{ Storage::url($post->image_path) }}" alt="Post Image" style="width: 100%; height: auto; max-height: 50vh; object-fit: contain;"></div>
            </div>
        </div>

</div>
@endsection
