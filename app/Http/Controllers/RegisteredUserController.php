<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dump($request->all());
        $validated = $request->validate(['name' => ['required'], 'email' => ['required'], 'password' => ['required']]);
        $user = User::create($validated);
        Auth::login($user);

        return redirect('/');
    }
}
