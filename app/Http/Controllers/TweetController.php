<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->get();
        // dump($tweet);
        return view('tweets.index', ['tweets' => $tweets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dump(request('tweet'));

        $request->validate(['tweet' => ['required', 'min:3']]);

        Tweet::create(['content' => request('tweet'), 'user_id' => 1]);
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {

        // Load the comments ordered by 'created_at'
        $tweet->load(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('tweets.show', ['tweet' => $tweet]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {

        if (Auth::guest()) {

            return redirect('/login');
        }


        return view('tweets.edit', ['tweet' => $tweet]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
    {
        $tweet->update(['content' => request('tweet')]);
        $tweet->save();

        return redirect('/tweets/' . $tweet->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {

        if (Auth::guest()) {

            return redirect('/login');
        }

        $tweet->delete();
        return redirect('/');
    }
}
