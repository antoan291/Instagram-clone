<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\Post;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Post $post)
    {
        $post_id = $post->id;
        $comments = Comments::where('post_id', $post_id)->get();

        $likers_ids = $post->likers()->pluck('users.id'); 
        $liker_users = User::WhereIn('id', $likers_ids)->get();

        $likes = (auth()->user()) ? auth()->user()->likes->contains($post->id) : false;

        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->latest()->get();//da izvejda posledniq post
        return view('posts.index',compact('posts', 'comments','likes','liker_users'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store() 
    {
        $user = $request->user();
        $data = request()->validate([
             'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath=request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
        'image'=> $imagePath,
        ]);//ot user funkciqta

       return redirect('/profile/'.auth()->user()->id);
    }

    public function show(Post $post)
    {
        $post_id = $post->id;
        $comments = Comments::where('post_id', $post_id)->get();

        $likers_ids = $post->likers()->pluck('users.id'); 
        $liker_users = User::WhereIn('id', $likers_ids)->get();

        $likes = (auth()->user()) ? auth()->user()->likes->contains($post->id) : false;


        return view('posts.show', compact('post', 'comments','likes','liker_users'));
   
    }
}
