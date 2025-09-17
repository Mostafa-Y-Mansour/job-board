<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index() {
        // Eloquent ORM Get all post data from Post model
        $data =  Comment::all();
        return view('comment.index', ['comments'=> $data,'pageTitle' => "comments Page"]);
    }

    function create() {
        //  Comment::create([
        //      "author" => "good boy",
        //      "content" => "oh hello mr. santa for gimme a new toy please post 3",
        //      "post_id" => 3,
        // ]);
        Comment::factory(5)->create();

        return redirect("/comments");
    }
}
