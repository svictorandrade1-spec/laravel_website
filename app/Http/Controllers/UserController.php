<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function Checkposts(){
$posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.user_id')
            ->select('posts.*', 'users.profile_picture as UserProfilePicture')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        return $posts;
    }


    public function updateProfilePicture(Request $request)
    {
        $currentProfilePicture = DB::table('users')->where('email', session('email'))->value('profile_picture');
        if ($currentProfilePicture) {
            Storage::disk('public')->delete($currentProfilePicture);
        }
        
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
        ]);

        $path = $request->file('profile_picture')->store('images', 'public');
        DB::table('users')->where('email', session('email'))->update(['profile_picture' => $path]);

        return redirect('/profile')->with('success', 'Profile picture updated successfully!');
    }


    public function signup(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
        ]);

    $path = $request->hasFile('profile_picture') ? $request->file('profile_picture')->store('images', 'public') : null;
    $email = $request->input('email');
    $checkname = DB::table('users')->where('name', $request->input('name'))->first();
    if($checkname){
        return view('SignUp', ['error' => 'Username already taken!']);
    }
    $check = DB::table('users')->where('email', $email)->first();
    if($check){
        return view('SignUp', ['error' => 'Email already has an account!']);
    }
    DB::table('users')->insert([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'profile_picture' => $path
    ]);
    Session::put('name', $request->input('name'));
    Session::put('email', $request->input('email'));
    $posts = $this->Checkposts();
    return view('Browser', ['posts' => $posts]);
    }

    public function signin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('users')->where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            Session::put('name', $user->name);
            Session::put('email', $user->email);
            $posts = $this->Checkposts();
            return view('Browser', ['posts' => $posts]);
        } else {
            return view('SignIn', ['error' => 'Invalid email or password!']);
        }
    }public function browse()
    {
        if (!session('name')) {
            return view('SignIn', ['error' => 'Please sign in to access the browser!']);
        }

        $posts = $this->Checkposts();
        // return $posts;
        return view('Browser', ['posts' => $posts]);
    }
    public function upload(Request $request)
    {
        $request->validate([
            'PostImage' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $path = $request->file('PostImage')->store('images', 'public');
        $postUUID = (string)uniqid();
        DB::table('posts')->insert([
            'user_id' => DB::table('users')->where('email', session('email'))->value('user_id'),
            'text' => $request->input('PostText'),
            'user_name' => session('name'),
            'image_path' => $path,
            'created_at' => now(),
            'postUUID' => $postUUID,
            'UserProfilePicture' => DB::table('users')->where('email', session('email'))->value('profile_picture')
        ]);

        Schema::create("$postUUID"."comments", function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->timestamps();

        });

        return redirect('/Browse')->with('success', 'Post uploaded successfully!');
    }
    public function ThePostComments($postUUID){
        $post = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.user_id')
            ->select('posts.*', 'users.profile_picture as UserProfilePicture', 'users.name as author_name')
            ->where('posts.postUUID', $postUUID)
            ->first();
        if (!$post) {
            return abort(404, 'Post not found');
        }

        $commentsTable = $postUUID . 'comments';
        if (!Schema::hasTable($commentsTable)) {
            $comments = collect();
        } else {
            $comments = DB::table($commentsTable)->orderBy('created_at', 'asc')->get();

            $commenterEmails = $comments->pluck('email')->unique()->filter();
            if ($commenterEmails->count()) {
                $commenterPictures = DB::table('users')
                    ->whereIn('email', $commenterEmails)
                    ->pluck('profile_picture', 'email');

                foreach ($comments as $comment) {
                    $comment->profile_picture = $commenterPictures[$comment->email] ?? null;
                }
            }
        }
        session()->flash('postUUID', $postUUID);
        return view('ThePost', ['post' => $post, 'comments' => $comments]);
    }

    public function removeProfilePicture()
    {
        $user_id = DB::table('users')->where('email', session('email'))->value('user_id');
        DB::table('posts')->where('user_id', $user_id)->update(['UserProfilePicture' => null]);

        $currentProfilePicture = DB::table('users')->where('email', session('email'))->value('profile_picture');
        if ($currentProfilePicture) {
            Storage::disk('public')->delete($currentProfilePicture);
            DB::table('users')->where('email', session('email'))->update(['profile_picture' => null]);
            return redirect('/profile')->with('success', 'Profile picture removed successfully!');
        }

        return redirect('/profile')->with('error', 'No profile picture to remove!');
    }


    
    public function commenting(Request $request){
        $comment = $request->input('comment');
        $postUUID = session('postUUID');

        if (!session('name')) {
            return redirect()->back()->with('error', 'Please sign in to comment!');
        }

        $commentsTable = $postUUID . 'comments';

        DB::table($commentsTable)->insert([
            'name' => session('name'),
            'email' => session('email'),
            'comment' => $comment,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('ThePostComments', ['postUUID' => $postUUID])->with('success', 'Comment added successfully!');
    }


    public function profile()
    {
        if (!session('name')) {
            return view('SignIn', ['error' => 'Please sign in to access your profile!']);
        }

        $user_id = DB::table('users')->where('email', session('email'))->value('user_id');



        $user = DB::table('users')->where('email', session('email'))->first();
        $posts = DB::table('posts')->where('user_id', $user->user_id)->orderBy('created_at', 'desc')->get();
        return view('profile', ['user' => $user, 'posts' => $posts]);
    }

    public function deletePost(Request $request){
        $postUUID = $request->input('postUUID');
        $user_id = DB::table('users')->where('email', session('email'))->value('user_id');
        $post = DB::table('posts')->where('postUUID', $postUUID)->where('user_id', $user_id)->first();

        if (!$post) {
            return redirect('/profile')->with('error', 'Bela tentativa Morais, Hoje não!');
        }

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        DB::table('posts')->where('postUUID', $postUUID)->delete();
        Schema::dropIfExists($postUUID . 'comments');



        return redirect('/profile')->with('success', 'Post deleted successfully!');
    }
    
    public function EditPost(Request $request, $postUUID){
        $user_id = DB::table('users')->where('email', session('email'))->value('user_id');
        $post = DB::table('posts')->where('postUUID', $postUUID)->where('user_id', $user_id)->first();
        $isPostOwner = $post && $post->user_id === $user_id;
        if (!$isPostOwner) {
            return redirect('/profile')->with('error', 'Not today, thank you!');
        }
        
        if (!$post) {
            return redirect('/profile')->with('error', 'Post not found!');
        }

        return view('EditPost', ['post' => $post]);
    }




    public function EditPosted(Request $request){
        $newText = $request->input('PostText');
        $postUUID = $request->input('postUUID');
        $user_id = DB::table('users')->where('email', session('email'))->value('user_id');
        $post = DB::table('posts')->where('postUUID', $postUUID)->where('user_id', $user_id)->first();
        $isPostOwner = $post && $post->user_id === $user_id;
        if (!$isPostOwner) {
            return redirect("/profile")->with('error', 'Ta tentando e num ta conseguindo!');
        }
        if (!$post) {
            return redirect("/profile")->with('error', 'serião Morais?');
        }if($newText ==null){
            return redirect("/EditPost/{$postUUID}")->with('error', 'Text cannot be empty!');
        }


        DB::table('posts')->where('postUUID', $postUUID)->update(['text' => $newText]);

        return redirect('/profile')->with('success', 'Post edited successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return redirect('/Browse')->with('error', 'Please enter a search term.');
        }

        $posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.user_id')
            ->select('posts.*', 'users.profile_picture as UserProfilePicture')
            ->where('posts.text', 'LIKE', '%' . $query . '%')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        $users = DB::table('users')->where('name', 'LIKE', '%' . $query . '%')->get();

        return view('search', ['posts' => $posts, 'users' => $users, 'query' => $query]);
    }

    public function UserInfo($user_name){
        $user = DB::table('users')->where('name', $user_name)->first();
        if (!$user) {
            return abort(404, 'User not found');
        }
        $posts = DB::table('posts')
            ->leftJoin('users', 'posts.user_id', '=', 'users.user_id')
            ->select('posts.*', 'users.profile_picture as UserProfilePicture')
            ->where('posts.user_id', $user->user_id)
            ->orderBy('posts.created_at', 'desc')
            ->get();
        return view('UserInfo', ['user' => $user, 'posts' => $posts]);
    }
    public function deleteComment(Request $request){
        $comment_id = $request->input('comment_id');
        $postUUID = session('postUUID');
        $commentsTable = $postUUID . 'comments';
        $comment = DB::table($commentsTable)->where('id', $comment_id)->first();
        // $check1 = DB::table($commentsTable)->where('name', session('name'))->first();
        // $check2 = DB::table('posts')->where('postUUID', $postUUID)->where('user_name', session('name'))->first();

        if (!$comment) {
            return redirect()->back()->with('error', 'Comment not found!');
        }

        if ($comment->name !== session('name')) {
            return redirect()->back()->with('error', 'You can only delete your own comments!');
        }

        DB::table($commentsTable)->where('id', $comment_id)->delete();

        return redirect()->route('ThePostComments', ['postUUID' => $postUUID])->with('success', 'Comment deleted successfully!');
    }
}
