<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index() {
        // Eloquent ORM Get all post data from Post model
        $data =  Post::all();
        return view('post.index', ['posts'=> $data,'pageTitle' => "Blog Page"]);
    }

    function show($id) {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    function create() {
        $post = Post::create([
            "title" => "my find Post",
            "body" => "search for something",
            "author" => "mostafa",
            "published" => true
        ]);

        return redirect("/blog");
    }
}
