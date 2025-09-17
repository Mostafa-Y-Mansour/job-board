<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use HasUuids;
      // to use uuid as the id we need to change the default values extended from the Model class 
    protected $primaryKey = "id"; // default (id)
    protected $keyType = 'string'; // default (int)
    public $incrementing = false; // default (true)

    protected $table = "tag";
    protected $fillable = ["title"];

    protected $guarded = ["id"];

    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
