<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::withCount('posts')->get();
        return view('forums.index', compact('forums'));
    }

    public function create(Request $request)
    {
        $category_id = $request->query('category_id');
        $categories = Category::all();
        return view('forums.create', compact('categories', 'category_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $forum = Forum::create($request->all());
    
        return redirect()->route('categories.show', $forum->category_id)
                         ->with('success', 'Forum created successfully.');
    }

    public function show(Forum $forum)
    {
        $posts = $forum->posts()->get();
        return view('forums.show', compact('forum', 'posts'));
    }

    public function edit(Forum $forum)
    {
        $categories = Category::all();
        return view('forums.edit', compact('forum', 'categories'));
    }

    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $forum->update($request->all());
    
        return redirect()->route('categories.show', $forum->category_id)
                         ->with('success', 'Forum updated successfully.');
    }

    public function destroy(Forum $forum)
    {
        $category_id = $forum->category_id;
        $forum->delete();
    
        return redirect()->route('categories.show', $category_id)
                         ->with('success', 'Forum deleted successfully.');
    }
}