<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog', [
            "posts" => Post::all()
        ]);
    }

    public function toggle($id)
    {
        $post = Post::findOrFail($id);

        $post->update(['published' => !$post->published]);

        return redirect()->route('blog.index');
    }
}
