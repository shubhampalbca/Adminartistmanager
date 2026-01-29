<?php

namespace App\Http\Controllers;

use App\Models\Event;

class BlogController extends Controller
{
    /**
     * Display all blog posts (events) with pagination.
     */
    public function index()
    {
        $posts = Event::with('postable')->latest()->paginate(9);
        return view('blog.index', compact('posts'));
    }

    /**
     * Display single blog post.
     */
    public function show($id)
    {
        $post = Event::with('postable')->findOrFail($id);
        $related = Event::with('postable')->where('id', '!=', $id)->latest()->take(3)->get();
        return view('blog.show', compact('post', 'related'));
    }
}
