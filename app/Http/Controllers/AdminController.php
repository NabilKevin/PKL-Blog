<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('administrator.home.index', [
            'title' => 'Home'
        ]);
    }
    public function posts()
    {
        return view('administrator.posts.index', [
            'title' => 'Blog',
            'posts' => Post::all()
        ]);
    }

}
