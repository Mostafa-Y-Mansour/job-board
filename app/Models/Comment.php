<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use HasUuids;
    // to use uuid as the id we need to change the default values extended from the Model class 
    protected $primaryKey = "id"; // default (id)
    protected $keyType = 'string'; // default (int)
    public $incrementing = false; // default (true)

    protected $table = "comment";
    protected $fillable = ["author", "content", "post_id"];

    protected $guarded = ["id"];

    // many comments of the comment::class belongs to one post
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
