<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
    use HasUuids;

    // to use uuid as the id we need to change the default values extended from the Model class 
    protected $primaryKey = "id"; // default (id)
    protected $keyType = 'string'; // default (int)
    public $incrementing = false; // default (true)


    protected $table = 'post';

    protected $fillable = ['title', 'body', 'published', "user_id"]; // modifiable fields in the DB that can be updated

    protected $guarded = ['id']; // fields that shouldn't be updated/assigned (read only)

    // relationship with other tables
    // post has many comments many of the comment::class

    // many to one relation ship (many posts belong to one user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // one to many relationship (one post has many comments)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // many to many relationship (one post has many tags and one tag has many posts)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
