<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Forum;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Forum $forum)
    {
        $posts = $forum->posts()->with('user')->get();
        return view('posts.index', compact('forum', 'posts'));
    }
    

    public function create(Forum $forum)
    {
        return view('posts.create', compact('forum'));
    }

    // __construct() metodunu kaldırıyoruz
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function store(Request $request, Forum $forum)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->forum_id = $forum->id;
        $post->save();

        return redirect()->route('forums.posts.index', $forum)->with('success', 'Post created successfully.');
    }

    public function show(Forum $forum, Post $post)
    {
        return view('posts.show', compact('forum', 'post'));
    }

    public function edit(Forum $forum, Post $post)
    {
        return view('posts.edit', compact('forum', 'post'));
    }

    public function update(Request $request, Forum $forum, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('forums.posts.index', $forum)
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Forum $forum, Post $post)
    {
        $post->delete();

        return redirect()->route('forums.posts.index', $forum)
            ->with('success', 'Post deleted successfully');
    }
}
