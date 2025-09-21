<?php

namespace App\Http\Controllers;

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
        $data =  Post::paginate(10);
        return view('post.index', ['posts'=> $data,'pageTitle' => "Blog Page"]);
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
    public function store(Request $request)
    {
        // @TODO this will be Completed in the form section
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
        //
        return view("post.edit", ['pageTitle' => "Edit Post Page"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
