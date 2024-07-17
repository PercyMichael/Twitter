<?php

use App\Models\Tweet;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    // dump($tweet);
    return view('welcome', ['tweets' => Tweet::all()]);
});

Route::post('/create', function () {
    // dump(request('tweet'));

    Tweet::create(['content' => request('tweet'), 'user_id' => 1]);

    return redirect('/');
});
