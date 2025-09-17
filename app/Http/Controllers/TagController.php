<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index() {
        // Eloquent ORM Get all post data from Post model
        $data =  Tag::all();
        return view('tag.index', ['tags'=> $data,'pageTitle' => "tags Page"]);
    }

    function create() {
        $post = Tag::create([
            "title" => "Software Engineering",
        ]);

        return redirect("/tags");
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