<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentPostRequest;
use App\Models\Comment;
use COM;
use Illuminate\Http\Request;

use function Pest\version;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent ORM Get all post data from Post model
        return redirect("/blog");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect("/blog");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentPostRequest $request)
    {
        // @TODO this will be Completed in the form section
        $comment = new comment();
        $comment->post_id = $request->input("post_id");
        $comment->author = $request->input("author");
        $comment->content = $request->input("content");
        $comment->save();

        return redirect("/blog" . "/" . $request->input("post_id"))->with("success", "comment Created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view("comment.show", ["comment" => $comment, 'pageTitle' => 'show comment page']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $comment = Comment::findOrFail($id);
        return view("comment.edit", ['pageTitle' => 'Edit comment page']);
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
