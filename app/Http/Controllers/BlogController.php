<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::paginate(2);

        return view('posts', [
            'posts' => $posts,
        ]);
    }

    public function show($id): View
    {
        $post = Post::find($id);
        $prevPost = Post::find($id-1);
        $nextPost = Post::find($id+1);
        if ($post) {

        } else {
            // error
        }

        return view('post_show', [
            'post' => $post,
            'prevPost' => $prevPost,
            'nextPost' => $nextPost,
        ]);
    }
}
