<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent ORM Get all post data from Post model
        $data =  Tag::all();
        return view('tag.index', ['tags'=> $data,'pageTitle' => "tags Page"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tag.create",[ 'pageTitle' => 'create tags page' ]);
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
        //
        $tag = Tag::findOrFail($id);
        return view("tag.show", ["pageTitle" => " show tag page!"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tag = Tag::findOrFail($id);
        return view("tag.edit", ["pageTitle" => " edit tag page!"]);
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

        function testManyToMany() {
        // $post9 = Post::find(9);
        // $post10 = Post::find(10);

        // $post9->tags()->attach( [1,2]);
        // $post10->tags()->attach( [1]);

        // return response()->json([
        //     "post9" => $post9->tags,
        //     "post10" => $post10->tags,
        // ]);

        try {

            $tag = Tag::find(2);
            $tag->posts()->attach(10);
            
        return response()->json([
            "tag" => $tag->title,
            "posts" => $tag->posts
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "error" => $e->getMessage(),
            "explain" => "cant add the same ids for post and tag twice."
        ]);
    }
}
}
