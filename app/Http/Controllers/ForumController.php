<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category_id = $request->query('category_id');
        $categories = Category::all();
        return view('forums.create', compact('categories', 'category_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        return view('forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        $categories = Category::all();
        return view('forums.edit',compact('forum','categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $forum->update($request->all());
    
        return redirect()->route('categories.show', $forum->category_id)
            ->with('success', 'Forum updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        $category_id = $forum->category_id;
        $forum->delete();
    
        return redirect()->route('categories.show', $category_id)
            ->with('success', 'Forum deleted successfully');
    }
}