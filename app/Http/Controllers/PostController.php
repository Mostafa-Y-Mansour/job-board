<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index() {
        // Eloquent ORM Get all post data from Post model
        $data =  Post::paginate(10);
        return view('post.index', ['posts'=> $data,'pageTitle' => "Blog Page"]);
    }

    function show($id) {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]);
    }

    function create() {
        // $post = Post::create([
        //     "title" => "my second Post",
        //     "body" => "ho ho ho hooo",
        //     "author" => "santa",
        //     "published" => true
        // ]);
        $post = Post::factory(100)->create();
        return redirect("/blog");
    }

    function delete() {
        Post::destroy(1,2);

    }
}
