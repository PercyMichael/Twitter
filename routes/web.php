<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TweetController;
use App\Models\Comment;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\ArrowFunction;

Route::get('/', [TweetController::class, 'index']);
Route::post('/create', [TweetController::class, 'create']);
Route::get('/tweets/{tweet}', [TweetController::class, 'show']);
Route::get('/tweets/{tweet}/edit', [TweetController::class, 'edit']);
Route::patch('/tweets/{tweet}', [TweetController::class, 'update']);
Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy']);



Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


// show register page
Route::get('/login', [SessionController::class, 'create']);
//register action
Route::post('/login', [SessionController::class, 'store']);
//logout
Route::post('/logout', [SessionController::class, 'destroy']);


Route::post('/comments/create', function (Request $request) {

    $request->validate(['comment' => ['required']]);
    Comment::create(['tweet_id' => 5, 'text' => request('comment')]);

    return redirect('/tweets/5');
});
