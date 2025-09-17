<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    //
    // $title;
    // $body;
    // $publish
    protected $fillable = ['title', 'body', 'published', 'author']; // modifiable fields in the DB that can be updated

    protected $guarded = ['id']; // fields that shouldn't be updated/assigned (read only)
}
