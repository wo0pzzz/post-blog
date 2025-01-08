<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'p_count' => Post::all()->count(),
            'c_count' => Category::all()->count(),
        ]);
    }
}
