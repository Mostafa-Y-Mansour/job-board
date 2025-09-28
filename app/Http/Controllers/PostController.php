<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent ORM Get all post data from Post model
        $data =  Post::latest()->paginate(10);
        return view('post.index', ['posts' => $data, 'pageTitle' => "Blog Page"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view("post.create", ['pageTitle' => "Create Post Page"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input("title");
        $post->author = $request->input("author");
        $post->body = $request->input("body");
        $post->published = $request->has("published");

        $post->save();

        return redirect("/blog")->with("success", "Post Created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view("post.edit", ['post' => $post, 'pageTitle' => "Edit Post Page"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->title = $request->input("title");
        $post->author = $request->input("author");
        $post->body = $request->input("body");
        $post->published = $request->has("published");

        $post->save();

        // print_r($request->all());
        return redirect("/blog" . "/" . $id)->with("success", "Post is Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // print_r($id);
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect("/blog")->with("success", "Post is Deleted Successfully!");
    }
}
