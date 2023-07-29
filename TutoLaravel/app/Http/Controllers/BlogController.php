<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    //create
    public function create(){
        $post = new Post();
        //$post->title = 'Bonjour';
        return view('blog.create', [
            'post' => $post
        ]);
    }
    public function store(FormPostRequest $request){
        $post = Post::create($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a bien ete sauvegarde");
    }
    //edit
    public function edit(Post $post){
        return view('blog.edit', [
            'post'=> $post
        ]);
    }
    public function update(Post $post, FormPostRequest $request){
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a bien ete modifie");
    }
    public function index (): View
    {
        //dd($request->validated());
        return view("blog.index", [
            'posts' => \App\Models\Post::paginate(1)
    ]);

    }
    public function show (string $slug, Post $post ): RedirectResponse | View
    {
        //dd($post);
        //$post = Post::findOrFail($post);
        if($post->slug !== $slug){

            return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        }
        return view('blog.show', [
            'post' => $post
            ]);
    }
}
