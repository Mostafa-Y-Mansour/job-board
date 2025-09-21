<?php

// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\TagController;

use App\Http\Controllers\api\v1\PostApiController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

// // REST API (Restful api)
// // Request : GET > POST > PUT > PATCH > DELETE
// // Response : 2XX, 4XX, 5XX
Route::prefix("v1")->Group(function () {
  Route::apiResource("post",PostApiController::class);
});
