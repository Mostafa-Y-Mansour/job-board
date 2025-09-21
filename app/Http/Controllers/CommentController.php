<?php

namespace App\Http\Controllers;
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
        $data =  Comment::all();
        return view('comment.index', ['comments'=> $data,'pageTitle' => "comments Page"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view("comment.create",[ 'pageTitle' => 'create comment page' ]);

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
        $comment = Comment::findOrFail($id);
        return view("comment.show",["comment" => $comment, 'pageTitle' => 'show comment page' ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $comment = Comment::findOrFail($id);
        return view("comment.edit",[ 'pageTitle' => 'Edit comment page' ]);

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
