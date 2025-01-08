<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('admin.categories', [
            'categories' => $categories,
        ]);
    }

    public function create(): View
    {
        return view('admin.category_add');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Category::create([
            'title' => $request->input(['title'])
        ]);

        return redirect()->route('categories')->with('success','Category Added Successfully');
    }

    public function edit($id): View
    {
        $category = Category::find($id);
        return view('admin.category_edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {

        $request->validate([
            'id' => 'required',
            'title' => 'required|max:255',
        ]);

        $category = Category::find($request->input('id'));
        if ($category) {
            $category->title = $request->input('title');
            $category->save();
        }

        return redirect()->route('categories')->with('success','Category updated successfully');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $cat = Category::find($request->input('id'));
        if ($cat) $cat->delete();

        return redirect()->route('categories')->with('success','Category deleted successfully');
    }
}
