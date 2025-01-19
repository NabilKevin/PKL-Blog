<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('layouts.posts.index', [
            'title' => "Blog",
            'posts' => Post::all()
        ]);
    }

    public function show($slug)
    {
        return view('layouts.post.index', [
            'title' => "Blog",
            'post' => Post::firstWhere('slug', $slug)
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'author' => 'required',
            'body' => 'required'
        ]);
        if($validator->fails()) {
            return redirect('/admin/create')->with('error', collect(['errors' => $validator->errors(), 'messages' => 'Invalid field']));
        }

        $data = $request->except('_token');
        $data['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $post = Post::create($data);
        return redirect('/posts')->with('success', ['messages' => 'Post added successfully!']);
    }
    public function create()
    {
        return view('administrator.create.index', [
            'title' => 'Blog'
        ]);
    }
    public function checkSlug(Request $request)
    {
        return response()->json([
            'slug' => isset($request->title) ? SlugService::createSlug(Post::class, 'slug', $request->title) : ''
        ]);
    }

    public function destroy($slug)
    {
        $post = Post::firstWhere('slug', $slug);

        if(!$post) {
            return redirect('/posts')->with('error', ['messages' => 'Post not found!']);
        }

        $post->delete();

        return redirect('/posts')->with('success', ['messages' => 'Post deleted successfully!']);
    }

    public function search(Request $request)
    {
        if(!$request->s) {
            return response()->json([
                'posts' => Post::all()
            ], 200);
        }

        return response()->json([
            'posts' => Post::whereLike('title', "%$request->s%")->get()
        ], 200);
    }

    public function edit($slug)
    {
        return view('administrator.edit.index', [
            'title' => 'Blog',
            'post' => Post::firstWhere('slug', $slug)
        ]);
    }

    public function update(Request $request, $slug)
    {
        $rule = [
            'title' => 'required|max:255',
            'slug' => 'required',
            'author' => 'required',
            'body' => 'required'
        ];
        if($slug !== $request->slug) {
            $rule['slug'] .= '|unique:posts';
        }
        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()) {
            return redirect("/admin/edit/$slug")->with('error', collect(['errors' => $validator->errors(), 'messages' => 'Invalid field']));
        }
        $data = $request->except('_token');
        $data['excerpt'] = substr(Str::limit(strip_tags($request->body), 200), 0, 200);
        $post = Post::firstWhere('slug', $data['slug']);
        $post->update($data);
        return redirect('/admin/posts')->with('success', ['messages' => 'Post updated successfully!']);
    }
}
