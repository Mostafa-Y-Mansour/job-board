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

    protected $fillable = ['title', 'body', 'published', 'author']; // modifiable fields in the DB that can be updated

    protected $guarded = ['id']; // fields that shouldn't be updated/assigned (read only)

    // post has many comments many of the comment::class
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
