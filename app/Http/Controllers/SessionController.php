<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }


    public function store(Request $request)
    {
        // dump($request->all());
        $validated = $request->validate(['email' => ['required'], 'password' => ['required']]);

        # code...
        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages(['email' => 'Sorry, invalid credentials']);
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
