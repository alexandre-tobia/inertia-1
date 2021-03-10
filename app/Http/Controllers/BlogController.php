<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog', [
            "posts" => Post::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Blog/BlogCreate');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => ['required'],
            'slug'    => ['required', 'unique:posts'],
            'content' => ['required'],
            'published' => ['required']
        ]);

        Post::create($request->only('name', 'slug', 'content', 'published'));

        return redirect()->route('blog.index');
    }

    public function toggle($id)
    {
        $post = Post::findOrFail($id);

        $post->update(['published' => !$post->published]);

        return redirect()->route('blog.index');
    }
}
