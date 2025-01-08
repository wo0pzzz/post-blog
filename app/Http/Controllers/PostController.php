<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\Post;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();

        return view('admin.posts', [
            'posts' => $posts,
        ]);
    }

    public function create(): View
    {
        $categories = Category::all()->pluck('title', 'id');

        return view('admin.post_add', [
            'categories'=> $categories
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:50',
            'content' => 'required',
            'image' => 'required|mimes:jpg,jpeg,bmp,png',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $file = $request->file('image');
        $ext = $file->extension();
        $name = $file->getClientOriginalName();
        $filename = $file->storeAs('/post_images', $name.'_'.time().'.' . $ext, ['disk' => 'public_uploads']);

        $data = [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'tags' => $request->input('tags'),
            'image' => $filename,
        ];

        Post::create($data);

        return redirect()->route('posts')->with('success','Post added successfully');
    }

    public function edit($id): View
    {
        $post = Post::find($id);
        $categories = Category::all()->pluck('title', 'id');

        return view('admin.post_edit', [
            'post' => $post,
            'categories'=> $categories
        ]);
    }

    public function update(Request $request): RedirectResponse
    {

        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:50',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $post = Post::find($request->input('id'));

        $filename = $post->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $name = $file->getClientOriginalName();
            $filename = $file->storeAs('/post_images', $name.'_'.time().'.' . $ext, ['disk' => 'public_uploads']);
        }

        if ($post) {
            $post->title = $request->input('title');
            $post->author = $request->input('author');
            $post->content = $request->input('content');
            $post->category_id = $request->input('category_id');
            $post->tags = $request->input('tags');
            $post->image = $filename;
            $post->save();
        }

        return redirect()->route('posts')->with('success','Post updated successfully');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $post = Post::find($request->input('id'));
        if ($post) $post->delete();

        return redirect()->route('posts')->with('success','Post deleted successfully');
    }
}
