<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            // cascade will delete only the post and the row on the relation table not in the tag table 
            $table->foreignId("post_id")->constrained("post")->onDelete("cascade"); // left side post_id
            $table->foreignId("tag_id")->constrained("tag")->onDelete("cascade"); // right side tag_id
            $table->unique(["post_id", "tag_id"]); // EX. 1,1 should be unique
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
